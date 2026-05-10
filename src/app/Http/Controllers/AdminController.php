<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use App\Models\MemberAvatar;
use App\Models\Practice;
use App\Models\History;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function adminLogin(LoginRequest $request){
        $validated = $request -> validated();
        if(Auth::attempt(
            [
                'login_id'=>$validated['login_id'],
                'password' =>$validated['password'],
                'is_admin' => true,
            ]
        )){
            $request->session()->regenerate();
            return redirect()->intended('admin.index');
        }
        return back()->withErrors(['login_id'=>'ログイン情報が正しくありません']);
    }

    public function register(){
    $avatars = MemberAvatar::all();

    return view ('admin.register',compact('avatars'));
    }

    public function storeUser(RegisterRequest $request){
    $validated = $request -> validated();

    $userData = User::create([
        'login_id' => $validated['login_id'],
        'name' => $validated['name'],
        'password' => Hash::make($validated['password']),
        'member_avatar_id' => $validated['member_avatar_id']
    ]);
    return redirect()->route('admin.index')->with('message','登録が完了しました。'); 
    }

    public function showDelete(){
        $users = User::with('avatar','histories.practice')->get();
        $users = $users->sortByDesc('current_level');

        return view('/admin.delete',compact('users'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('delete.show');
    }

    public function adminIndex(){
        return view('admin.index');
    }

    // 1.memberのレベルアップチェック（increase）するボタンを押すと+1されてupdateしてhistoriesに保存される。JSで「本当によろしいですか？」のwarningを表示したい。showの部分はJSを使って、ユーザーを選択した時にその人のレベルが表示されるようにしたい。
    public function showTest(){

    $users = User::with('avatar','histories.practice')->get();

    return view ('/admin.practiceJadge',compact('users'));
    }

    public function storeHistory(Request $request){

        $userId = $request->input('members');
        $nextPractice = $request->input('practice_id') + 1;

        History::create([
            'user_id' => $userId,
            'practice_id' => $nextPractice,
        ]);
        return redirect()->route('practiceJadge.show')->with('message','レベルが上がりました！');

    }
    
    // 2.memberのレベルダウン（decrease）を念のため準備ボタンを押すと-1されてupdateしhistoriesに保存される

}
