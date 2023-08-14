<?php

namespace App\Http\Controllers\Admin\StaffAccount;

use App\Http\Controllers\Controller;
use App\Models\StaffAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StaffAccountController extends Controller
{
    public function index() : View
    {
        $staffid = StaffAccount::all();
        $staff = User::all();

        if (Auth::check()) {
            return view('company.admin.staff-account.index', ['staffid' => $staffid, 'staff' => $staff]);
        }
        else {
            return view('login');
        }
    }
}
