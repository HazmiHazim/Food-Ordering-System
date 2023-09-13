<?php

namespace App\Enums;

enum ReservationStatusEnum : string
{
    case Pending = 'Pending';
    case Completed = 'Completed';
    case Cancelled = 'Cancelled';
}
