<?php

namespace Database\Seeders;

use App\Models\Partnership;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath = 'images/partnership/';

        Partnership::create([
            'company_name' => 'Kentucky Fried Chciken (KFC)',
            'owner_name' => 'Junaida Binti Kamal',
            'date_join' => Carbon::parse('2020-12-03'),
            'location' => 'Damansara, Kuala Lumpur',
            'image' => $imagePath . '1.png',
        ]);

        Partnership::create([
            'company_name' => 'Pak Mat Western',
            'owner_name' => 'Nor Qaiyum Muhamad',
            'date_join' => Carbon::parse('2022-07-22'),
            'location' => 'Bukit Mertajam, Pulau Pinang',
            'image' => $imagePath . '2.png',
        ]);

        Partnership::create([
            'company_name' => 'Starbucks',
            'owner_name' => 'Celin Chua Meng',
            'date_join' => Carbon::parse('2023-02-19'),
            'location' => 'Shah Alam, Selangor',
            'image' => $imagePath . '3.png',
        ]);
    }
}
