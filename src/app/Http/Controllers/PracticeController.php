<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practice;
use App\Models\Animal;
use App\Models\User;
use App\Models\History;
use App\Models\MemberAvatar;

class PracticeController extends Controller
{

    // 3.animal.bladeにメンバーの所在位置を表示する、animalの表示とusersをlevel_rangeでつなげて表示する
    public function showAnimal(){
        $animals = Animal::all();

        $users = User::with('avatar','histories.practice')->get();

        $users = $users->sortByDesc('current_level');

        foreach($users as $user){
            $history = $user->histories->sortByDesc('created_at')->first();
            $user->current_level = $history?->practice?->level;
        }   

        foreach($animals as $animal)
            $animal->matchedUsers = $users->filter(function($user)use($animal){
                return !is_null($user->current_level)
                && $user->current_level >= $animal->min_level
                && $user->current_level <=$animal->max_level;
            });
        return view('animal',compact('animals','users'));
    }

    // 4.technicalに全スキルを表示する。個人のクリア済みデータをhistoriesから取り出して表示する。
    public function showSkills(){
        $user = auth()->user();
        $skills = Practice::all();

        $userData = null;
        $matchedAnimal = null;
        $current_level = null;
        
        if(auth()->check()){
            $userData = User::with('avatar','histories.practice')
            ->where('id',$user->id)
            ->first();

        $animals = Animal::all();

        $history = $userData->histories
        ->whereNotNull('practice')
        ->sortByDesc('created_at')
        ->first();

        $current_level = $history && $history->practice ? $history->practice->level : null;

        $matchedAnimal = $animals->first(function($animal)use($userData, $current_level){
        return !is_null($current_level)
        && $current_level >= $animal->min_level
        && $current_level <= $animal->max_level;
        });
        }

        return view('technical',compact('skills','userData','matchedAnimal','current_level'));
    }

    // 5.rankingにuserのデータを表示する
    public function showRanking(){
        $animals = Animal::all();
        $users = User::with('avatar','histories.practice')->get();

        foreach($users as $user){
            $history = $user->histories
            ->filter(function ($history){return !is_null($history->practice);})
            ->sortByDesc('created_at')->first();

            $user->current_level = $history?->practice?->level;

            $user->matchedAnimal = $animals->first(function($animal)use($user){
                return !is_null($user->current_level)
                && $user->current_level >= $animal->min_level
                && $user->current_level <=$animal->max_level;
            });
        }
        return view('ranking',compact('users'));
    }
}
