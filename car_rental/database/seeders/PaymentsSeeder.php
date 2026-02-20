<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\PaymentsModel;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'rental_id' => 1,
                'amount' => 100.00,
                'payment_method' => 'credit_card',
                'transaction_id' => Hash::make('transaction_1'),
                'status' => 'completed',
                'payment_date' => now(),
            ],
            [
                'rental_id' => 2,
                'amount' => 150.00,
                'payment_method' => 'paypal',
                'transaction_id' => Hash::make('transaction_2'),
                'status' => 'pending',
                'payment_date' => now(),
            ],
        ]);
        $data = new PaymentsModel();
        $data->rental_id = 3;
        $data->amount = 200.00;
        $data->payment_method = 'bank_transfer';
        $data->transaction_id = Hash::make('transaction_3');
        $data->status = 'failed';
        $data->payment_date = now();
        $data->save();
    }
}
