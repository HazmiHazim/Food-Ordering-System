<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index() : View
    {
        $staff = User::where('role', 2)->get();

        $sales = CustomerOrder::where('order_status', OrderStatusEnum::Completed)->sum('order_total_price');

        return view('company.admin.dashboard', ['staff' => $staff, 'sales' => $sales]);
    }
}
