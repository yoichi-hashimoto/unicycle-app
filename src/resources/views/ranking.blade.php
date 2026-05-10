@extends('layouts.app')


@section('content')
<main class="pt-28">
<h1 class="text-center m-4 font-bold">クラブメンバーのランキング</h1>
<table class="ranking-table">
    <tr class="">
        <th class="table-title" colspan="2">なまえ</th>
        <th class="table-title">レベル</th>
        <th class="table-title">動物</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td class="bg-green-50 text-center p-3 text-md md:text-2xl">{{ $user->name}}</td>
        <td class="bg-green-50 text-center border-r border-y-white p-3">
            @if($user->avatar)
                <img src="{{ asset($user->avatar->avatar_path)}}" alt="" class="m-auto w-10 h-10 md:w-24 md:h-20 object-cover">
            @else
            -
            @endif
        </td>        
        <td class="bg-green-50 text-center p-3 border-r border-y-white text-lg  md:text-3xl font-bold">{{ $user->current_level}}</td>
        <td class="bg-green-50 text-center p-3">
            @if($user->matchedAnimal)
            <img src="{{ asset($user->matchedAnimal->animal_path) }}" alt="" class="m-auto w-10 h-10 md:w-20 md:h-20 object-cover">
            @else
            -
            @endif
        </td>
    </tr>
    @endforeach
</table>
    <div class="w-full text-center my-1">
        <a href="{{ url('/') }}">
            <button class="closeButton btn-outline m-8">トップに戻る</button>
        </a>
    </div>
</main>

@endsection