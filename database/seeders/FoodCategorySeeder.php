<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodCategory::create([
            'name' => 'Malay Cuisine',
        ]);

        FoodCategory::create([
            'name' => 'Western',
        ]);

        FoodCategory::create([
            'name' => 'Dessert',
        ]);

        FoodCategory::create([
            'name' => 'Beverages',
        ]);
    }
}
