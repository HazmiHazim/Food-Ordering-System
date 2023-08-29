<?php

namespace App\Http\Controllers\Admin\Partnership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnershipController extends Controller
{
    public function index() : View
    {
        return view('company.admin.partnership.index');
    }
}
