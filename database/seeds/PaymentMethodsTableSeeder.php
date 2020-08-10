<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('payment_method')->truncate();
        DB::table('payment_method')->insert([
            ['name'=>'VISA'],
            ['name'=>'AMEX'],
            ['name'=>'MASTER'],
        ]);

    }
}
