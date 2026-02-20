<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Loyalty_levelModel;

class Loyalty_levelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loyalty_levels')->insert([
            [
                'name' => 'Bronze',
                'min_points' => 0,
                'discount_percentage' => 5,
                'free_extra_hours' => 5,
            ],
            [
                'name' => 'Silver',
                'min_points' => 100,
                'discount_percentage' => 10,
                'free_extra_hours' => 10,
            ],
            [
                'name' => 'Gold',
                'min_points' => 200,
                'discount_percentage' => 15,
                'free_extra_hours' => 15,
            ],
        ]);
        $data = new Loyalty_levelModel();
        $data->name = 'Platinum';
        $data->min_points = 300;
        $data->discount_percentage = 20;
        $data->free_extra_hours = 20;
        $data->save();
    }
}
