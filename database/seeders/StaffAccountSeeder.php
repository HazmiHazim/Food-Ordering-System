<?php

namespace Database\Seeders;

use App\Models\StaffAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make 20 Data

        // Initialize id for ceo
        $ceoid = 'hashceo001';

        // Initialize first part for staff id
        $staffid = 'hashstaff';

        StaffAccount::create([
            'staff_account_id' => $ceoid,
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '123',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '922',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '921',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '259',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '209',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '251',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '502',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '109',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '163',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '294',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '058',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '507',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '611',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '010',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '002',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '511',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '222',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '111',
        ]);

        StaffAccount::create([
            'staff_account_id' => $staffid . '333',
        ]);
    }
}
