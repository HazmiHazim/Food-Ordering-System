<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index() : View
    {
        return view('company.auth.register');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'staff_id' => 'required|unique:users,staff_id',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|max:15',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required',
        ]);

        // Retrieving input of staff_id
        $staffid = $request->only(['staff_id']);
        dd($staffid);

        // Check if staff_id exists in the staff_account table
        $dataExists = Staff::where('staff_account_id', $staffid)->exists();

        // Check if staff_id exists then procedd
        if ($dataExists == true) {
            $isRegistered = User::where('staff_id', $staffid)->exists();
            if ($isRegistered == false) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'staff_id' => $staffid,
                    'password' => Hash::make($request->password),
                ]);

                return back()->with('success-message', 'Register Successful');
            }
            else {
                return back()->withErrors([
                    'error-message' => 'User with the provided staff ID has already registered.'
                ]);
            }
        }
        else {
            return back()->withErrors([
                'error-message' => 'Invalid ID. Please provide a valid staff ID.'
            ]);
        }
    }
}
