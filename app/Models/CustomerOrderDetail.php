<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerOrderDetail extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'order_id',
        'food_id',
        'quantity',
        'total_price',
    ];

    public function customerOrder() : BelongsTo
    {
        return $this->belongsTo(CustomerOrder::class, 'order_id');
    }

    public function foodMenu() : BelongsTo
    {
        return $this->belongsTo(FoodMenu::class, 'food_id');
    }

    public function uniqueIds(): array
    {
        return ['order_id'];
    }
}
