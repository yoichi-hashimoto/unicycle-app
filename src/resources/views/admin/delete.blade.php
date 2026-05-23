@extends('layouts.app')

@section('content')
<main class="pt-28">
<h1 class="text-center m-8 font-bold">メンバー削除画面</h1>
<table class="ranking-table m-auto text-center border-collapse">
    <tr class="w-full">
        <th class="table-title" colspan="3">なまえ</th>
        <th class="table-title">レベル</th>
        <th class="table-title">動物</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <form action="{{ route('delete',['id'=>$user->id])}}" method="POST" class="deleteForm">
            @csrf
        <td class="bg-green-50 text-center p-3 md:text-2xl">
            <button class="btn-outline text-xs" type="submit">削除する</button>
        </td>
        </form>
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
<div class="flex m-auto items-center">
        <button class="btn-outline rounded-full text-center px-8 m-auto">
            <a href="{{ route('admin.index') }}">トップに戻る</a>
        </button>
</div>
</main>
<script>
    const deleteAlert = "本当に削除しますか？";
    const deleteForms = document.querySelectorAll('.deleteForm');

    deleteForms.forEach(function(form){
        form.addEventListener('submit',function(e){
            if(!confirm(deleteAlert)){
                e.preventDefault();
            }
        })
    });
</script>

@endsection