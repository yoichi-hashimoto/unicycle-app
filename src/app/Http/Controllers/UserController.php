<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use App\Models\MemberAvatar;
use App\Models\Practice;
use App\Models\History;
use App\Models\Like;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile(){
        $user = auth()->user();
        $userData = User::with('avatar','histories.practice')
        ->where('id',$user->id)
        ->firstOrFail();
        $recievedLikes = Like::whereHas('history', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();
        return view ('profile',compact('userData','recievedLikes'));
    }

    // 編集画面を表示するためのリンク、アバター一覧を表示したい
    public function showEdit(){
        $user=auth()->user();
        $userData = User::with('avatar','histories.practice','likes')
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

    public function showHistory(){
        $user = auth()->user();

        $histories = History::with('user.avatar','practice')
        ->withCount('likes')
        ->latest()
        ->paginate(5);

        return view('history',['histories'=>$histories,'user']);
    }

    public function storeLike(Request $request){
        $user = auth()->user();

        if($user === null){
            return redirect('/login');
        }
        Like::firstOrCreate([
            'user_id' => auth()->id(),
            'history_id' => $request->history_id,
        ]);

        return redirect()->back();
    }

}