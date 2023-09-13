<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Initialize admin passowrd
        $adminPass = 'adminceouser';

        // Initialize staff password and staff role
        $staffPassword = 'staffuser';
        $staffRole = 2;

        User::create([
            'staff_id' => 'hashceo001',
            'name' => 'Leonardo Di Caprio Bin Pablo Escobar',
            'role' => 1,
            'email' => 'hashceo@gmail.com',
            'phone' => '0157894563',
            'address' => 'Jalan Raja Muda, Bukit Badwin, 35000 Tapah, Perak',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'C.E.O',
            'password' => Hash::make($adminPass),
        ]);

        User::create([
            'staff_id' => 'hashstaff123',
            'name' => 'Nur Aisyatul Kamalia Binti Badrul Hisyam',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0154786934',
            'address' => 'Lot 155, Jalan Segamat, 26600 Bentong, Kedah',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'C.O.O',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff922',
            'name' => 'Malasingam A/L Aramugam',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0165789521',
            'address' => 'Jalan Kampung 3, Taman Tasik Titiwangsa, Kota Bharu, Selangor',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Cashier',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff921',
            'name' => 'Hari Harun Kalai Mutu A/L Karam Sign Walia',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0123456789',
            'address' => 'Jalan Kampung Pisang, Kuching, Sabah',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Crew',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff259',
            'name' => 'Zul Arifin Bin Mat Tamjiz',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0195786248',
            'address' => 'Lot 99, Taman Bunga Raya, Kuala Besut, Johor',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Cleaner',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff209',
            'name' => 'Nurul Ain Huzaima Binti Kamarulzaman',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0123456789',
            'address' => 'Lot 111, Jalan Muhibbah Jaya, 32000 Bidor, Melaka',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'Crew',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff251',
            'name' => 'Siti Nor Balkqis Binti Nor Hisyam',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0183942456',
            'address' => 'Jalan Raja Muda, 26600 Georgetown, Pahang',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'Crew',
            'password' => Hash::make($staffPassword),
        ]);


        User::create([
            'staff_id' => 'hashstaff502',
            'name' => 'Muhammad Aiman Bin Muhammad Jamil',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0125796214',
            'address' => 'Lot 62, Kampung Pasir Mas, 13000 Tanah Merah, Melaka',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Crew',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff109',
            'name' => 'William Han Ming Khor Yan',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0135698786',
            'address' => 'Kampung Hitam, 15000 Bertam, Sarawak',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Cashier',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff163',
            'name' => 'Hannah Yeoh Chin Ng Pai',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0123456789',
            'address' => 'Lot 55, Jalan Duta, 51200 Seremban, Negeri Sembilan',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'Cashier',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff294',
            'name' => 'Joegriyo A/L Jamin',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0187562156',
            'address' => 'Lot 55, Jalan Duta, 51200 Seremban, Negeri Sembilan',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Crew',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff058',
            'name' => 'Nur Badzlin Binti Mohammad Kamal',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0139876246',
            'address' => 'Kampung Petai Lama, 62000 Kuala Pilah, Terengganu',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'Head Chef',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff507',
            'name' => 'Nur Aina Safiya Binti Muhammad Arif',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0165789210',
            'address' => 'Lot 26, Jalan Ferrero, 11000 Maran, Melaka',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'Chef Assistant',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff611',
            'name' => 'Muhammad Irfan Bin Furqan',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0123456789',
            'address' => 'Lot 100, Jalan Panglima, 12345 Kampar, Kuala Lumpur',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Chef',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff010',
            'name' => 'Ali Bin Ahmad',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0123456789',
            'address' => 'Lot 3, Kampung Hujan Besi, 81120 Kuala Krai, Selangor',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Chef',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff002',
            'name' => 'Chong Mo Fan',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0187562156',
            'address' => 'Bandar Hilir Kuantan, 42100 Pendang, Penang',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Chef',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff511',
            'name' => 'Henry Gurney Jose Mourinho',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0195786248',
            'address' => 'Jalan Bandar Raya, 63000 Shah Alam, Johor',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Chef',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff222',
            'name' => 'Harry Maguire Malon Sanchez',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0123456789',
            'address' => 'Kampung Gundam Garam, 71200 Pasir Salak, Perak',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Male',
            'position' => 'Cleaner',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff111',
            'name' => 'Nur Hanis Syafiqah Binti Mohd Noor',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0136214501',
            'address' => 'Lot 15, Jalan Raja Nazrin, 12000 Ipoh, Selangor',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'Cleaner',
            'password' => Hash::make($staffPassword),
        ]);

        User::create([
            'staff_id' => 'hashstaff333',
            'name' => 'Milim Nava Mario Rose Gloria',
            'role' => $staffRole,
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '0123456789',
            'address' => 'Kampung Janda dua, 52100 Alor Setar, Kelantan',
            'photo' => 'images/profile/unknown.png',
            'gender' => 'Female',
            'position' => 'Cleaner',
            'password' => Hash::make($staffPassword),
        ]);
    }
}
