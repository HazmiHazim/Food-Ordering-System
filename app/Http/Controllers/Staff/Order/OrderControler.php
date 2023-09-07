<?php

namespace App\Http\Controllers\Staff\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderControler extends Controller
{
    public function index() : View
    {
        return view('company.staff.order.index');
    }
}
