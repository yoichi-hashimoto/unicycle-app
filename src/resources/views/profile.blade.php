@extends('layouts.app')

@section('content')
<main class="pt-28">
<div class="w-80 md:w-2/3 lg:w-1/2 md:h-full my-4 mx-auto text-center">
<h1 class="text-3xl font-bold">プロフィール</h1>
<div class="flex gap-2">
<div class="fade w-full flex items-center justify-around my-12 bg-lime-50 p-2 lg:p-6 rounded-lg">
    <div class="flex flex-col">
        <h2 class="m-2 text-xs lg:text-sm">ニックネーム</h2>
        <h3 class="text-lg font-bold md:text-2xl lg:text-4xl lg:mx-8">
            {{ $userData->name}}
        </h3>
    </div>
    <img src="{{ $userData->avatar->avatar_path }}" alt="member_avatar" class="w-24 h-20 md:w-40 md:h-32 objerct-cover">
</div>

<div class="fade flex flex-col items-center w-1/3 my-12 bg-lime-50 p-2 lg:p-6 rounded-lg">
    <p class="my-2 text-xs md:text-sm">がんばったね！</p>
    <p id="likeButton" class="text-center text-red-500 text-xl lg:text-4xl w-8 lg:w-24">&#9829;</p>
    <p class="lg:text-2xl lg:my-2">{{ $recievedLikes }}</p>
</div>
</div>

        <div class="fade-level flex items-center justify-around  bg-lime-50 rounded-lg w-full p-2 lg:p-6">
            <div>
            <h2 class="text-center">今のレベル</h2>
            <h2 class="lg:text-4xl lg:mx-8">{{ $userData->current_level }}</h2>
            </div>
            <img src="{{ $userData->matchedAnimal->animal_path ?? asset('images/default_animal.png') }}" alt="animal" class="w-20 h-20 md:w-32 md:h-24 object-cover">  
            <h3 class="text-2xl md:text-4xl font-bold m-4">{{ $userData->matchedAnimal->name ?? '未設定' }}</h3>
        </div>
    <div>
    <button class="btn-primary m-12">
        <a href="{{ route('profile.edit')}}">プロフィールを変更する</a>
    </button>
    <button class="btn-outline text-center px-8 lg:m-12">
    <a href="{{ url('/') }}">トップに戻る</a>
</button>
</div>
<!-- @if($userData->is_admin)
        <div class="text-center mx-16">
                <a href="{{asset('/admin.login')}}">
                    <button class="btn-outline">管理者ログイン</button>
                </a>
        </div>
@endif -->
</div>
</main>
@endsection