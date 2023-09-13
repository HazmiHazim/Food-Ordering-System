<?php

namespace App\Http\Controllers\Staff\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index() : View
    {
        return view('company.staff.reservation.index');
    }
}
