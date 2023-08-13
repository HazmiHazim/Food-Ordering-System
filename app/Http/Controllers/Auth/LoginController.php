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
            return view('company.admin.dashboard');
        }
        else {
            return view('company.auth.login');
        }
    }
    
    /**
     * Handle an authentication attemp
     */
    public function authenticate(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'staff_id' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
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
        return redirect('/login');
    }
}
