<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practices')->insert([
            ['name'=>'アリーナ壁から壁まで','level'=>1,'description'=>'アリーナの壁から壁までを普通走行する。途中で落車しなければ合格！'],
            ['name'=>'アリーナ1周','level'=>2,'description'=>'アリーナを1周する。コーナーで方向転換するときに注意！'],
            ['name'=>'アリーナ2周','level'=>3,'description'=>'アリーナを2周する。少し長いけど落ち次いで頑張ろう！'],
            ['name'=>'アリーナ3周','level'=>4,'description'=>'アリーナを3周する。ゆっくりでもいいので、体力を温存して進もう！'],
            ['name'=>'1周から逆回り1周','level'=>5,'description'=>'1周から逆回り1周する。ターンするときのバランスに注意！'],
            ['name'=>'ジグザグコース','level'=>6,'description'=>'ジグザグのコースを走行する。手でバランスを取りながら進もう！'],
            ['name'=>'右回り3周','level'=>7,'description'=>'コーンを中心に右回り3周する。はじめは大きな円で大丈夫！'],
            ['name'=>'左回り3周','level'=>8,'description'=>'コーンを中心に左回り3周する。右回りと感覚が違うので注意！'],
            ['name'=>'8の字ひこうき（大）','level'=>9,'description'=>'8の字ひこうき（大）を実行する。'],
            ['name'=>'8の字ひこうき（小）','level'=>10,'description'=>'8の字ひこうき（小）を実行する。'],
            ['name'=>'空中乗り','level'=>11,'description'=>'空中乗りを実行する。'],
            ['name'=>'アイドリング3回','level'=>12,'description'=>'アイドリング3回行う。'],
            ['name'=>'バック走行5m','level'=>13,'description'=>'バック走行5m行う。'],
            ['name'=>'アイドリング10回','level'=>14,'description'=>'アイドリング10回行う。'],
            ['name'=>'バック走行10m','level'=>15,'description'=>'バック走行10m行う。'],
            ['name'=>'アイドリング20回','level'=>16,'description'=>'アイドリング20回行う。'],
            ['name'=>'バック走行20m','level'=>17,'description'=>'バック走行20m行う。'],
            ['name'=>'あめ玉スピン','level'=>18,'description'=>'あめ玉スピンを実行する。'],
            ['name'=>'3分乗り続ける（ラン）','level'=>19,'description'=>'3分乗り続ける（ラン）を実行する。'],
            ['name'=>'ホッピング1回','level'=>20,'description'=>'ホッピング1回行う。'],
            ['name'=>'アイドリング30回','level'=>21,'description'=>'アイドリング30回行う。'],
            ['name'=>'バック走行30m','level'=>22,'description'=>'バック走行30m行う。'],
            ['name'=>'右回り3周→左回り3周→8の字ひこうき','level'=>23,'description'=>'右回り3周→左回り3周→8の字ひこうきを実行する。'],
            ['name'=>'アイドリング50回以上','level'=>24,'description'=>'アイドリング50回以上行う。'],
            ['name'=>'横乗り','level'=>25,'description'=>'横乗りを実行する。'],
        ]);
    }
}
