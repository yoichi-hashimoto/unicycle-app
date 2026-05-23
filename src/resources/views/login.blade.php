@extends('layouts.app')

@section('content')
<main class="pt-28">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="text-red-600 text-center">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1 class="text-center text-3xl md:w-full font-bold my-8">ログイン</h1>
        <form action="/login" method="POST">
            @csrf
            <div class="w-1/2 md:w-1\/3 mx-auto m-10">
                <p class="">ID</p>
                <input name="login_id" type="text" class="h-10 border border-black w-full rounded-full mb-16 p-6">
                <p>パスワード</p>
                <input name="password" type="password" class="h-10 border border-black w-full rounded-full mb-16 p-6">
                <div class="text-center">
                    <button type="submit" class="btn-primary rounded-full w-1/2 md:h-12 text-md md:text-xl">ログイン</button>
                </div>
            </div>
        </form>
</main>
@endsection