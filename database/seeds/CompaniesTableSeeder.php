<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('company')->truncate();
        DB::table('company')->insert([
            ['name'=>'dummy1'],
            ['name'=>'dummy2'],
            ['name'=>'dummy3'],
        ]);
    }
}
