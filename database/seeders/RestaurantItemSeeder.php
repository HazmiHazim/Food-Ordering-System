<?php

namespace Database\Seeders;

use App\Models\RestaurantItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RestaurantItem::create([
            'item_name' => 'Knife',
            'quantity' => 50,
            'price' => 3.90,
            'item_category_id' => 1,
        ]);

        RestaurantItem::create([
            'item_name' => 'Spoon',
            'quantity' => 50,
            'price' => 1.50,
            'item_category_id' => 1,
        ]);

        RestaurantItem::create([
            'item_name' => 'Fork',
            'quantity' => 50,
            'price' => 1.50,
            'item_category_id' => 1,
        ]);

        RestaurantItem::create([
            'item_name' => 'Computer',
            'quantity' => 2,
            'price' => 6500.00,
            'item_category_id' => 2,
        ]);

        RestaurantItem::create([
            'item_name' => 'Dining Table',
            'quantity' => 30,
            'price' => 52.00,
            'item_category_id' => 3,
        ]);

        RestaurantItem::create([
            'item_name' => 'Dining Chair',
            'quantity' => 30,
            'price' => 42.00,
            'item_category_id' => 3,
        ]);
    }
}
