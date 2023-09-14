<?php

namespace App\Http\Controllers\Staff\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StaffProfileController extends Controller
{
    public function show($id) : View
    {
        $user = User::where('id', $id)->first();

        return view('company.staff.profile.show', ['user' => $user]);
    }





    /*
    *  Function to view edit file
    */
    public function edit($id) : View
    {
        $user = User::where('id', $id)->first();

        return view('company.staff.profile.edit', ['user' => $user]);
    }




    

    /*
    *  Function to update user profile resource
    */
    public function update(Request $request, $id) : RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($request->anyFilled(['profile_name', 'profile_email', 'profile_phone', 'profile_address', 'profile_position', 'profile_gender', 'profile_image'])) {
            
            $updateData = [];

            if ($request->filled('profile_name')) {
                $updateData['profile_name'] = $request->input('profile_name');
            }

            if ($request->filled('profile_email')) {
                $updateData['profile_email'] = $request->input('profile_email');
            }

            if ($request->filled('profile_phone')) {
                $updateData['profile_phone'] = $request->input('profile_phone');
            }

            if ($request->filled('profile_address')) {
                $updateData['profile_address'] = $request->input('profile_address');
            }

            if ($request->filled('profile_position')) {
                $updateData['profile_position'] = $request->input('profile_position');
            }

            if ($request->filled('profile_gender')) {
                $updateData['profile_gender'] = $request->input('profile_gender');
            }

            if ($request->hasFile('profile_image')) {

                // check if image path exists then delete the path inside storage
                $image = $user->photo;

                if ($image) {
                    Storage::delete($image);
                }

                // Get the original file name
                $file = $request->file('profile_image');

                // Generate a unique name for the uploaded file
                $fileName = $file->hashName();

                // Store the file with the new name
                $imagePath = $file->storeAs('images/profile', $fileName);

                $updateData['profile_image'] = $imagePath;
            }

            $updated = $user->update($updateData);

            Log::info($updateData, $updated);

            return redirect()->route('staff-profile-edit', $user->id)->with('success-message', 'Your changes are saved successfully.');
        }
        else {
            return back()->withErrors([
                'error-message' => 'Please insert data to update your profile.',
            ]);
        }
    }
}
