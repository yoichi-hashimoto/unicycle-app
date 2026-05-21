@extends('layouts.app')

@section('content')
<main class="pt-28">

<div class="w-3/4 m-auto">
    <h1 class="text-center text-3xl md:w-full font-bold mb-16">メニユー</h1>
    @auth
        <div class="w-full text-center my-3">
            <a href="/profile" class="hover-message" data-tooltip="自分のプロフィールを表示・編集します">
                <button class="btn-primary rounded-full w-2/3 h-18 md:h-24 text-xl md:text-3xl">プロフィール</button>
            </a>
        </div>
    @endauth
        <div class="flex flex-col h-full">
            <div class="w-full text-center my-3">
                <a href="/history" class="hover-message" data-tooltip="メンバー全員のチャレンジ履歴を表示します">
                    <button class="btn-primary rounded-full w-2/3 h-18 md:h-24 text-xl md:text-3xl">チャレンジ履歴</button>
                </a>
            </div> 
            <div class="w-full text-center my-3">
                <a href="/technical" class="hover-message" data-tooltip="クラブで練習するわざの一覧を表示します">
                    <button class="btn-primary rounded-full w-2/3 h-18 md:h-24 text-xl md:text-3xl">わざ一覧</button>
                </a>
            </div>

            @guest
            <div class="w-full text-center my-3">
                <a href="/login" class="hover-message" data-tooltip="ログインします">
                    <button class="btn-primary rounded-full w-2/3 h-18 md:h-24 text-xl md:text-3xl">ログイン</button>
                </a>
            </div>
            @endguest
        </div>
</div>
</main>
@endsection