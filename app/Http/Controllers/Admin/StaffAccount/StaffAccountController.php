<?php

namespace App\Http\Controllers\Admin\StaffAccount;

use App\Http\Controllers\Controller;
use App\Models\StaffAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class StaffAccountController extends Controller
{
    public function index() : View
    {
        $staffid = StaffAccount::all();
        $staff = User::all();

        return view('company.admin.staff-account.index', ['staffid' => $staffid, 'staff' => $staff]);
    }

    /*
    * To view create file
    */
    public function create() : View
    {
        $staffid = StaffAccount::all();

        return view('company.admin.staff-account.create', ['staffid' => $staffid]);
    }

    /*
    * Function to add new staff ID
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->only('new_staff_id'), [
            'new_staff_id' => 'required|min:10|max:12'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Retrieve a submitted input of staff id
        $validated = $validator->safe()->only('new_staff_id');

        // Check if id exists in staff account table
        $staffCheck = StaffAccount::where('staff_account_id', $validated)->exists();

        if ($staffCheck == true) {
            return back()->withErrors([
                'error-message' => 'Provided ID is already registered',
            ]);
        }
        else {
            $id = StaffAccount::create([
                'staff_account_id' => $validated['new_staff_id'],
            ]);

            return back()->with('success-message', 'Successfully added new ID');
        }
    }

    /*
    * Function view show file
    */
    public function show($id) : View
    {
        $user = User::findOrFail($id);

        return view('company.admin.staff-account.show', ['user' => $user]);
    }

    /*
    * Function view edit file
    */
    public function edit() : View
    {
        return view('company.admin.staff-account.edit');
    }
}
