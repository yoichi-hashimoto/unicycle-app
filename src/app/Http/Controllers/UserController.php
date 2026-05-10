<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use App\Models\MemberAvatar;

class UserController extends Controller
{
    public function showProfile(){
        $user = auth()->user();
        $userData = User::with('avatar','histories.practice')
        ->where('id',$user->id)
        ->firstOrFail();

        return view ('profile',compact('userData'));
    }

    // 編集画面を表示するためのリンク、アバター一覧を表示したい
    public function showEdit(){
        $user=auth()->user();
        $userData = User::with('avatar','histories.practice')
        ->where('id',$user->id)
        ->firstOrFail();
        $avatars = MemberAvatar::all();
        return view ('edit',compact('user','avatars','userData'));
    }

    // 編集したデータを送信する関数。なまえ（本人確認のため）、ニックネーム、アバター、デフォルトはレベル1からスタート。
    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'member_avatar_id' => 'required|exists:member_avatars,id',
            'new-password' => 'nullable|string|min:8|confirmed',
            'old-password' => 'nullable|string',
        ]);
        $user = auth()->user();

        $data= [
            'name' => $request->name,
            'member_avatar_id' => $request->member_avatar_id,
        ];
        if($request->filled('new-password')) {
            $data['password'] = bcrypt($request->input('new-password'));
        }

        User::where('id', $user->id)->update($data);
        return redirect()->route('profile.show');
    }
}