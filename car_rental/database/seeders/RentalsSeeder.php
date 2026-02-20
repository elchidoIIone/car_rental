<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RentalModel;

class RentalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rentals')->insert([
            [
                'user_id' => 1,
                'car_id' => 1,
                'driver_id' => 1,
                'pickup_date' => '2024-03-01',
                'return_date' => '2024-03-05',
                'total_amount' => 500.00,
                'status' => 'confirmed',
            ],
            [
                'user_id' => 2,
                'car_id' => 2,
                'driver_id' => 2,
                'pickup_date' => '2024-03-10',
                'return_date' => '2024-03-15',
                'total_amount' => 750.00,
                'status' => 'pending',
            ],
        ]);
        $data = new RentalModel();
        $data->user_id = 1;
        $data->car_id = 3;
        $data->driver_id = 3;
        $data->pickup_date = '2024-04-01';
        $data->return_date = '2024-04-05';
        $data->total_amount = 600.00;
        $data->status = 'confirmed';
        $data->save();
    }
}
