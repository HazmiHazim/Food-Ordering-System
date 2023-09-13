<?php

namespace Database\Seeders;

use App\Models\FoodMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath = 'images/food-menu/';

        FoodMenu::create([
            'name' => 'Nasi Lemak Ayam',
            'description' => Str::random(100),
            'price' => 7.00,
            'category_id' => 1,
            'image' => $imagePath . '1.png',
        ]);

        FoodMenu::create([
            'name' => 'N.G U.S.A',
            'description' => Str::random(100),
            'price' => 9.00,
            'category_id' => 1,
            'image' => $imagePath . '2.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Nasi Kerabu Special',
            'description' => Str::random(100),
            'price' => 12.90,
            'category_id' => 1,
            'image' => $imagePath . '3.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Nasi Ayam Special',
            'description' => Str::random(100),
            'price' => 10.90,
            'category_id' => 1,
            'image' => $imagePath . '4.jpg',
        ]);

        FoodMenu::create([
            'name' => 'N.G Lamb Shanks',
            'description' => Str::random(100),
            'price' => 29.90,
            'category_id' => 1,
            'image' => $imagePath . '5.jpg',
        ]);

        FoodMenu::create([
            'name' => 'N.G Lobster ',
            'description' => Str::random(100),
            'price' => 34.90,
            'category_id' => 1,
            'image' => $imagePath . '6.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Nasi Ayam Geprek',
            'description' => Str::random(100),
            'price' => 10.90,
            'category_id' => 1,
            'image' => $imagePath . '7.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Nasi Ayam Berempah',
            'description' => Str::random(100),
            'price' => 13.90,
            'category_id' => 1,
            'image' => $imagePath . '8.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Lamb Chop',
            'description' => Str::random(100),
            'price' => 23.90,
            'category_id' => 2,
            'image' => $imagePath . '9.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Chicken Chop',
            'description' => Str::random(100),
            'price' => 18.90,
            'category_id' => 2,
            'image' => $imagePath . '10.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Salamander Burger',
            'description' => Str::random(100),
            'price' => 16.90,
            'category_id' => 2,
            'image' => $imagePath . '11.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Crispy Salmon Fish Fillet',
            'description' => Str::random(100),
            'price' => 16.90,
            'category_id' => 2,
            'image' => $imagePath . '12.png',
        ]);

        FoodMenu::create([
            'name' => 'Bolognese Spaghetti',
            'description' => Str::random(100),
            'price' => 18.90,
            'category_id' => 2,
            'image' => $imagePath . '13.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Special Oglio Olio',
            'description' => Str::random(100),
            'price' => 26.90,
            'category_id' => 2,
            'image' => $imagePath . '14.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Zabez De West Shawarma',
            'description' => Str::random(100),
            'price' => 14.90,
            'category_id' => 2,
            'image' => $imagePath . '15.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Next Itallian Pizza',
            'description' => Str::random(100),
            'price' => 25.90,
            'category_id' => 2,
            'image' => $imagePath . '16.png',
        ]);

        FoodMenu::create([
            'name' => 'Fruty Tutty Cheesecake',
            'description' => Str::random(100),
            'price' => 14.90,
            'category_id' => 3,
            'image' => $imagePath . '17.png',
        ]);

        FoodMenu::create([
            'name' => 'Choco Lava',
            'description' => Str::random(100),
            'price' => 18.90,
            'category_id' => 3,
            'image' => $imagePath . '18.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Mix Sunday Cake',
            'description' => Str::random(100),
            'price' => 15.90,
            'category_id' => 3,
            'image' => $imagePath . '19.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Caramel Pudding',
            'description' => Str::random(100),
            'price' => 14.90,
            'category_id' => 3,
            'image' => $imagePath . '20.jpeg',
        ]);

        FoodMenu::create([
            'name' => 'King Oreo Ice Cream',
            'description' => Str::random(100),
            'price' => 14.90,
            'category_id' => 3,
            'image' => $imagePath . '21.jpg',
        ]);

        FoodMenu::create([
            'name' => 'ABC Special',
            'description' => Str::random(100),
            'price' => 7.90,
            'category_id' => 3,
            'image' => $imagePath . '22.png',
        ]);

        FoodMenu::create([
            'name' => 'Red Velvet',
            'description' => Str::random(100),
            'price' => 14.90,
            'category_id' => 3,
            'image' => $imagePath . '23.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Red Hock Choco Ice',
            'description' => Str::random(100),
            'price' => 8.90,
            'category_id' => 4,
            'image' => $imagePath . '24.png',
        ]);

        FoodMenu::create([
            'name' => 'Choco Coffee Ice',
            'description' => Str::random(100),
            'price' => 7.90,
            'category_id' => 4,
            'image' => $imagePath . '25.png',
        ]);

        FoodMenu::create([
            'name' => 'Strawberry Milk Ice',
            'description' => Str::random(100),
            'price' => 7.90,
            'category_id' => 4,
            'image' => $imagePath . '26.png',
        ]);

        FoodMenu::create([
            'name' => 'Milk Boba Tea Ice',
            'description' => Str::random(100),
            'price' => 8.90,
            'category_id' => 4,
            'image' => $imagePath . '27.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Orange Juice',
            'description' => Str::random(100),
            'price' => 10.90,
            'category_id' => 4,
            'image' => $imagePath . '28.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Hot Latte',
            'description' => Str::random(100),
            'price' => 6.90,
            'category_id' => 4,
            'image' => $imagePath . '29.jpg',
        ]);

        FoodMenu::create([
            'name' => 'Matcha Latte Ice',
            'description' => Str::random(100),
            'price' => 10.90,
            'category_id' => 4,
            'image' => $imagePath . '30.jpg',
        ]);
        
    }
}
