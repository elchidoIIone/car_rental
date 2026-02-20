<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Ford',
                'email' => 'john@gmail.com',
                'password' => Hash::make('password123'),
                'loyalty_points' => 100,
                'loyalty_level_id' => 1,
            ],
            [
                'name' => 'Jane Morgan',
                'email' => 'jane@gmail.com',
                'password' => Hash::make('password123'),
                'loyalty_points' => 150,
                'loyalty_level_id' => 2,
            ],
        ]);
        $data = new User();
        $data->name = 'Alice Smith';
        $data->email = 'alice@gmail.com';
        $data->password = Hash::make('password123');
        $data->loyalty_points = 200;
        $data->loyalty_level_id = 3;
        $data->save();
    }
}
