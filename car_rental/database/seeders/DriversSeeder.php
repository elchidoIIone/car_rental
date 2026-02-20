<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\DriverModel;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            [
                'user_id' => 1,
                'license_number' => Hash::make('DL12345678'),
                'license_img' => 'path/to/license1.jpg',
            ],
            [
                'user_id' => 2,
                'license_number' => Hash::make('DL23456789'),
                'license_img' => 'path/to/license2.jpg',
            ],
        ]);
        $data= new DriverModel();
        $data->user_id=3;
        $data->license_number=Hash::make('DL34567890');
        $data->license_img='path/to/license3.jpg';
        $data->save();
    }
}
