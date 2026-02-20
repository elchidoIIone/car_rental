<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BrandModel;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'name' => 'Toyota',
                'img' => 'path/to/toyota.jpg',
            ],
            [
                'name' => 'Honda',
                'img' => 'path/to/honda.jpg',
            ],
        ]);
        $data= new BrandModel();
        $data->name='Mercedes';
        $data->img='path/to/mercedes.jpg';
        $data->save();
    }
}
