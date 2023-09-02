<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function restaurantItems() : HasMany
    {
        return $this->hasMany(RestaurantItems::class, 'item_category_id');
    }
}
