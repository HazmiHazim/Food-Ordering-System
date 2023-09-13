<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RestaurantItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'price',
        'item_category_id',
    ];

    public function itemCategory() : BelongsTo
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }
}
