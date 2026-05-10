<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('histories')->insert([
            ['user_id'=>1,'practice_id'=>22],
            ['user_id'=>2,'practice_id'=>20],
            ['user_id'=>3,'practice_id'=>2],
            ['user_id'=>4,'practice_id'=>1],
            ['user_id'=>5,'practice_id'=>22],
        ]);
    }
}
