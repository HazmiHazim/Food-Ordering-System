<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index() : View
    {
        // Check if user is already authenticated or not
        if (Auth::check()) {
            return view('company.admin.dashboard');
        }
        else {
            return view('login');
        }
    }
}
