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
    <h1 class="text-center text-3xl md:w-full my-8">管理者ログイン</h1>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="w-1/2 md:w-1\/3 mx-auto m-10">
                <p class="">ID</p>
                <input type="text" name="login_id" class="h-10 border border-black w-full rounded-full mb-8 p-6">
                <p>パスワード</p>
                <input type="password" name="password" class="h-10 border border-black w-full rounded-full mb-8 p-6">
                <p>パスワード確認</p>
                <input type="password" name="password_confirmation" class="h-10 border border-black w-full rounded-full mb-8 p-6">
                <div class="text-center">
                    <button class="btn-primary rounded-full w-1/2 h-6 md:h-12 text-md md:text-xl">管理者ログイン</button>
                </div>

                <div class="text-right my-8">
                    <a href="{{asset('login')}}">
                        <button class="btn-outline">メンバーログイン</button>
                    </a>
                </div>
            </div>
        </form>
</main>
@endsection