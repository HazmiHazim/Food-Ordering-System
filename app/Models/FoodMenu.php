<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
    ];

    public function customerOrderDetail() : HasMany
    {
        return $this->hasMany(CustomerOrderDetail::class, 'food_id');
    }

    public function foodCategory() : BelongsTo
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }
}
