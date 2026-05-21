@extends('layouts.app')

@section('content')
<main class="pt-20">
<h1 class="text-lg md:text-3xl text-center mx-4 my-8 font-bold">メンバーのチャレンジりれき</h1>
@foreach($histories as $history)
@if($history->is_passed)
<div class="w-4/5 md:w-3/5 m-auto my-4 p-1 md:p-4 border-2 border-green-500 rounded-lg shadow bg-yellow-100">
@else
<div class="w-4/5 md:w-3/5 m-auto my-4 p-1 md:p-4 border rounded-lg shadow bg-green-100">
@endif
    <div class="flex justify-center items-center gap-2 md:gap-4">
        <div>
        <p class="text-[8px] md:text-sm text-black font-bold w-12 md:w-20">{{ Carbon\Carbon::parse($history->created_at)->format('n月j日') }}</p>
        <p class="text-[8px] md:text-sm text-gray-500 w-12 md:w-20">{{ Carbon\Carbon::parse($history->created_at)->format('h:i') }}</p>
    </div>
    <div class="px-1">
        <img src="{{ asset($history->user->avatar->avatar_path) }}" alt="" class="m-auto w-16 h-12 md:w-2/3 md:h-2/3 object-cover">
        <p class="text-center text-xs lg:text-lg font-bold">{{ $history->user->name }}</p>
    </div>
    <div class="w-36 md:w-full">
    <p class="text-xs md:text-lg w-ful font-bold">レベル: {{ $history->user->current_level }}</p>
    <p class="text-xs md:text-lg w-full">{{ $history->practice->name }}に{{ $history->is_passed ? '合格' : 'チャレンジ' }}しました！</p>
    </div>
    <div class="lg:p-2 items-center">
        @php
            $liked = $history->likes
                ->where('user_id',auth()->id())
                ->isNotEmpty();
        @endphp

        @if($liked)
        <button id="likeButton" class="text-red-500 text-xl lg:text-4xl w-8 lg:w-24">&#9829;</button>
        <p class="text-[6px] md:text-xs text-center">❤済み！</p>
        @else
        <form action="{{ route('like.store', $history->id)}}" method="POST" class="hover-message w-8 lg:w-24" data-tooltip="ログインすると❤を押すことが出来ます！">
            @csrf
        <input type="hidden" name="history_id" value="{{ $history->id}}">
        <button type="submit" class="text-pink text-xl md:text-2xl lg:text-4xl w-8 lg:w-24";">&#9825;</buton>
        <p class="hidden lg:block md:text-xs text-center">がんばったね！</p>
        </form>
        @endif
        <p id="likeCount" class="text-center md:text-lg font-bold m-1">{{ $history->likes_count }}</p>
    </div>
</div>
</div>
@endforeach
    <div class="w-full flex justify-center my-4">
        {{ $histories->links() }}
    </div>
    <div class="w-full text-center my-1">
        <a href="{{ url('/') }}">
            <button class="closeButton btn-outline m-8">トップに戻る</button>
        </a>
    </div>
</main>

<script>
    const likeButton = document.getElementById('likeButton');
    const count = document.getElementById('likeCount');



    function addLike(){
        likeButton.addEventListener(("onClick")=>{
            count +1;
        })
    }

</script>

@endsection