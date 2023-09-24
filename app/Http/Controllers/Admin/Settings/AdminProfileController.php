<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    public function adminProfile() : View
    {
        return view('company.admin.settings.admin-profile');
    }






    /*
    *  Function to update profile resource
    */
    public function updateProfile(Request $request, $id) : RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($request->anyFilled(['name', 'email', 'phone'])) {

            $updateData = [];

            if ($request->filled('name')) {
                $updateData['name'] = $request->input('name');
            }

            if ($request->filled('email')) {
                $updateData['email'] = $request->input('email');
            }

            if ($request->filled('phone')) {
                $updateData['phone'] = $request->input('phone');
            }

            $updated = $user->update($updateData);

            Log::info([$updateData, $updated]);

            return back()->with('success-message', 'Profile update successfully.');
        }
        else {
            return back()->withErrors([
                'error-message' => 'Please enter data to update profile.'
            ]);
        }
    }






    /*
    *  Function to update authenticate user password
    */
    public function updatePassword(Request $request, $id) : RedirectResponse
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|min:6',
            'new_password' => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check if the current password matches the user's stored password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'password-error' => 'Your Current password is wrong. Please enter the correct password!',
            ])->withInput();
        }

        $updated = $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        Log::info($updated);

        return back()->with('success-message', 'Password updated successfully.');
    }
}
