<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\CarModel;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'brand_id' => 1,
                'model' => 'Model S',
                'year' => 2020,
                'color' => 'Red',
                'license_plate' => Hash::make('ABC123'),
                'miliage' => 15000,
                'lat' => 40.7128,
                'ing' => -74.0060,
                'is_premium' => 1,
                'rental_count' => 5,
                'daily_rate' => 100.00,
                'status' => 'available',
            ],
            [
                'brand_id' => 2,
                'model' => 'Civic',
                'year' => 2019,
                'color' => 'Blue',
                'license_plate' => Hash::make('XYZ789'),
                'miliage' => 30000,
                'lat' => 34.0522,
                'ing' => -118.2437,
                'is_premium' => 0,
                'rental_count' => 10,
                'daily_rate' => 50.00,
                'status' => 'available',
            ],
        ]);
        $data= new CarModel();
        $data->brand_id=1;
        $data->model='Model X';
        $data->year=2021;
        $data->color='Black';
        $data->license_plate=Hash::make('DEF456');
        $data->miliage=10000;
        $data->lat=37.7749;
        $data->ing=-122.4194;
        $data->is_premium=1;
        $data->rental_count=3;
        $data->daily_rate=120.00;
        $data->status='available';
        $data->save();
    }
}
