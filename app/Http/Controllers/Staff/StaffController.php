<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('isStaff');
    }

    public function index() : View
    {
        return view('company.staff.dashboard');
    }
}
