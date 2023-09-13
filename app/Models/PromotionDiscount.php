<?php

namespace App\Models;

use App\Enums\CouponStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromotionDiscount extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'coupon_code',
        'coupon_name',
        'discount',
        'event_id',
        'redeem_status',
        'validity',
        'date_redeemed',
    ];

    protected $casts = [
        'redeem_status' => CouponStatusEnum::class,
    ];

    public function promotionEvent() : BelongsTo
    {
        return $this->belongsTo(PromotionEvent::class, 'event_id');
    }

    public function uniqueIds() : array
    {
        return ['coupon_code'];
    }
}
