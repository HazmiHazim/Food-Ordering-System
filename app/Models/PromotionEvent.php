<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromotionEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date',
        'event_image',
    ];

    public function promotionDiscount() : HasMany
    {
        return $this->hasMany(PromotionDiscount::class, 'event_id');
    }
}
