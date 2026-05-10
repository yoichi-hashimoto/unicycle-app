@extends('layouts.app')

@section('content')
<main class="pt-28">
<div class="w-3/4 m-auto">
    <h1 class="text-center text-3xl md:w-full font-bold my-8">メニユー</h1>
        <div class="flex flex-col h-full">
            <div class="w-full text-center my-4">
                <a href="{{ route('practiceJadge.show') }}" class="text-center">
                    <button class="btn-primary rounded-full w-1/2 h-18 md:h-24 text-xl md:text-3xl">レベルアップ判定</button>
                </a>
            </div>
            <div class="w-full text-center my-4">
                <a href="{{ route('register') }}" class="text-center">
                    <button class="btn-primary rounded-full w-1/2 h-18 md:h-24 text-xl md:text-3xl">ユーザー登録</button>
                </a>
            </div> 
            <div class="w-full text-center my-4">
                <a href="{{ route('delete.show') }}">
                    <button class="btn-outline rounded-full w-1/2 h-18 md:h-24 text-xl md:text-3xl">ユーザー削除</button>
                </a>
            </div>
        </div>
</div>
</main>
@endsection