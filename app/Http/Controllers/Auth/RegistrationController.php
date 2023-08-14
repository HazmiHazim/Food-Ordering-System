<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\StaffAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index() : View
    {
        return view('company.auth.register');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'staff_id' => 'required|unique:users,staff_id|min:10',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Retrieving input of staff_id
        $staffid = $validator->safe()->only(['staff_id']);

        // Check if staff_id exists in the staff_account table
        $dataExists = StaffAccount::where('staff_account_id', $staffid)->exists();

        // Get the id table for staff_account
        $staffid = StaffAccount::where('staff_account_id', $request->staff_id)->first();

        // Check if staff_id exists then procedd
        if ($dataExists == true) {
            $isRegistered = User::where('staff_id', $request->staff_id)->exists();
            
            if ($isRegistered == false) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'staff_id' => $staffid->staff_account_id,
                    'password' => Hash::make($request->password),
                ]);

                return back()->with('success-message', 'Register Successful');
            } else {
                return back()->withErrors([
                    'error-message' => 'User with the provided staff ID has already registered.'
                ]);
            }
        } else {
            return back()->withErrors([
                'error-message' => 'Invalid ID. Please provide a valid staff ID.'
            ]);
        }
    }
}
