<?php

namespace Database\Seeders;

use App\Models\DiningTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $occupied = false;

        DiningTable::create([
            'table_name' => '1',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '2',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '3',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '4',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '5',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '6',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '7',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '8',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '9',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '10',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '11',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '12',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '13',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '14',
            'isOccupied' => $occupied,
        ]);

        DiningTable::create([
            'table_name' => '15',
            'isOccupied' => $occupied,
        ]);
    }
}
