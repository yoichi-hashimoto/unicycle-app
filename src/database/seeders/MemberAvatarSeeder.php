<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_avatars')->insert([
            [
            'id'=>1,
            'avatar_path'=>'/images/boy_1.png',
            ],[
            'id'=>2,
            'avatar_path'=>'/images/boy_2.png',
            ],
            [
            'id'=>3,
            'avatar_path'=>'/images/boy_3.png',
            ],
            [
            'id'=>4,
            'avatar_path'=>'/images/boy_4.png',  
            ],
            [
            'id'=>5,
            'avatar_path'=>'/images/boy_5.png',  
            ],
            [
            'id'=>6,
            'avatar_path'=>'/images/boy_6.png',  
            ],
            [
            'id'=>7,
            'avatar_path'=>'/images/girl_1.png',  
            ],
            [
            'id'=>8,
            'avatar_path'=>'/images/girl_2.png',  
            ],
            [
            'id'=>9,
            'avatar_path'=>'/images/girl_3.png',  
            ],
            [
            'id'=>10,
            'avatar_path'=>'/images/girl_4.png',  
            ],
            [
            'id'=>11,
            'avatar_path'=>'/images/girl_5.png',  
            ],
            [
            'id'=>12,
            'avatar_path'=>'/images/girl_6.png',
            ],
            [
            'id'=>13,
            'avatar_path'=>'/images/men_1.png',
            ],
            [
            'id'=>14,
            'avatar_path'=>'/images/men_2.png',
            ],
            [
            'id'=>15,
            'avatar_path'=>'/images/men_3.png',
            ],
            [
            'id'=>16,
            'avatar_path'=>'/images/women_1.png',
            ],
            [
            'id'=>17,
            'avatar_path'=>'/images/women_2.png',
            ],
            [
            'id'=>18,
            'avatar_path'=>'/images/women_3.png',
            ],
            [
            'id'=>19,
            'avatar_path'=>'/images/women_4.png',
            ]
            ]);
    }
}
