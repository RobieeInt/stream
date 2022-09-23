<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'user_id' => 1,
                'package_id' => 1,
                'amount' => 30000,
                'transaction_code' => 'TRX-1',
                'status' => 'success',
                'payment_method' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'package_id' => 2,
                'amount' => 42000,
                'transaction_code' => 'TRX-2',
                'status' => 'success',
                'payment_method' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'package_id' => 3,
                'amount' => 59000,
                'transaction_code' => 'TRX-3',
                'status' => 'success',
                'payment_method' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'package_id' => 4,
                'amount' => 119000,
                'transaction_code' => 'TRX-4',
                'status' => 'pending',
                'payment_method' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'package_id' => 1,
                'amount' => 30000,
                'transaction_code' => 'TRX-5',
                'status' => 'success',
                'payment_method' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'package_id' => 2,
                'amount' => 42000,
                'transaction_code' => 'TRX-6',
                'status' => 'success',
                'payment_method' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'package_id' => 3,
                'amount' => 59000,
                'transaction_code' => 'TRX-7',
                'status' => 'success',
                'payment_method' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ],
        );
    }
}
