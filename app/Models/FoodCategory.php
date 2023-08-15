<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function foodMenu() : HasMany
    {
        return $this->hasMany(FoodMenu::class, 'category_id');
    }
}
