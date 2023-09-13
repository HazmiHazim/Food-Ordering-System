<?php

namespace App\Http\Controllers\Staff\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index() : View
    {
        $reservation = Reservation::paginate(10);

        return view('company.staff.reservation.index', ['reservation' => $reservation]);
    }
}
