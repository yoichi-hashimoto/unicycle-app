<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'ちー','login_id'=>'U-0001','member_avatar_id'=>'12','password'=>Hash::make('test'),'is_admin'=>'0'],
            ['name'=>'なお','login_id'=>'U-0002','member_avatar_id'=>'7','password'=>Hash::make('test'),'is_admin'=>'0'],
            ['name'=>'ゆうき','login_id'=>'U-0003','member_avatar_id'=>'8','password'=>Hash::make('test'),'is_admin'=>'0'],
            ['name'=>'ハッシー','login_id'=>'U-0004','member_avatar_id'=>'13','password'=>Hash::make('test'),'is_admin'=>'1'],
            ['name'=>'はるき','login_id'=>'U-0005','member_avatar_id'=>'3','password'=>Hash::make('test'),'is_admin'=>'0'],
        ]);
    }
}
