<?php

namespace App\Enums;

enum CouponStatusEnum : string
{
    case NotRedeemed = 'Not Redeemed';
    case Redeemed = 'Redeemed';
    case Expired = 'Expired';
    case Cancel = 'Cancel';
}
