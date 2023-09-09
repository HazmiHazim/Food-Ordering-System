<?php

namespace App\Enums;

enum OrderStatusEnum : string
{
    case Preparing = 'Preparing';
    case Completed = 'Completed';
}
