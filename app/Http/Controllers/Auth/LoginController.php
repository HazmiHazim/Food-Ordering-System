<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index() : View
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return view('company.admin.dashboard');
            }

            if (Auth::user()->role == 2) {
                return view('company.staff.dashboard');
            }
        }
        else {
            return view('company.auth.login');
        }
    }
    
    /**
     * Handle an authentication attempt
     */
    public function authenticate(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'staff_id' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 1) {
                $request->session()->regenerate();
                return redirect()->route('admin-dashboard')->with('success-message', 'Login Successful.');
            }
            
            if (Auth::user()->role == 2) {
                $request->session()->regenerate();
                return redirect()->route('staff-dashboard')->with('success-message', 'Login Successful.');
            }
        }

        return back()->withErrors([
            'error-message' => 'The provided credentials do not match our records.'
        ])->onlyInput('staff_id');
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
