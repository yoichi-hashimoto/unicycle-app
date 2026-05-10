<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert(
            [
                ['name'=>'ひよこ',
                'animal_path'=>'/images/a_chick.png',
                'min_level'=>1,'max_level'=>5,
                'description'=>'レベル1~5',],
                ['name'=>'リス',
                'animal_path'=>'/images/a_squirrel.png',
                'min_level'=>6,'max_level'=>10,
                'description'=>'レベル6~10',],
                ['name'=>'ウサギ',
                'animal_path'=>'/images/a_rabbit.png',
                'min_level'=>11,'max_level'=>15,
                'description'=>'レベル11~15',],
                ['name'=>'キツネ',
                'animal_path'=>'/images/a_fox.png',
                'min_level'=>16,'max_level'=>20,
                'description'=>'レベル16~20',],
                ['name'=>'トラ',
                'animal_path'=>'/images/a_tiger.png',
                'min_level'=>21,'max_level'=>25,
                'description'=>'レベル21~25',
                ],
                ['name'=>'クマ',
                'animal_path'=>'/images/a_bear.png',
                'min_level'=>26,'max_level'=>30,
                'description'=>'レベル26~30',],
                [
                    'name'=>'ライオン',
                    'animal_path'=>'/images/a_lion.png',
                    'min_level'=>31,'max_level'=>35,
                    'description'=>'レベル31~35',
                ],
                [
                    'name'=>'コンドル',
                    'animal_path'=>'/images/a_eagle.png',
                    'min_level'=>36,'max_level'=>40,
                    'description'=>'レベル36~40',
                ],
                [
                    'name'=>'ウマ',
                    'animal_path'=>'/images/a_horse.png',
                    'min_level'=>41,'max_level'=>45,
                    'description'=>'レベル41~45',
                ],
            ]
        );
    }
}
