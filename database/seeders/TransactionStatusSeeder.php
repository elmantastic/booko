<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions_status')->insert([
        	'name' => 'Waiting For Confirmation',
        ]);
        DB::table('transactions_status')->insert([
        	'name' => 'In Process',
        ]);
        DB::table('transactions_status')->insert([
        	'name' => 'Being Sent',
        ]);
        DB::table('transactions_status')->insert([
        	'name' => 'Delivered',
        ]);
        DB::table('transactions_status')->insert([
        	'name' => 'Finished',
        ]);
    }
}
