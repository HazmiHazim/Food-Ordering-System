<?php

namespace Database\Seeders;

use App\Models\PromotionEvent;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PromotionEvent::create([
            'event_name' => 'Merdeka 2023',
            'event_date' => Carbon::parse('2023-08-31'),
            'event_image' => 'images/promotion-event/merdeka.png',
        ]);
    }
}
