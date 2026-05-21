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
    <h1 class="text-center text-3xl md:w-full font-bold my-8">メンバー登録</h1>
        <form action="{{ route('register.store')}}" method="POST">
            @csrf
            <div class="w-1/2 md:w-1\/3 mx-auto m-10">
                <p class="text-xs">※新規登録するメンバーの初回IDとパスワードを入力してください</p>
                <label >ID
                <input type="text" name="login_id" value="{{old('login_id','U-')}}" class="h-10 border border-black w-full rounded-full mb-8 p-4"></label>
                <label>ニックネーム
                <input type="text" name="name" value="{{ old('name')}}" class="h-10 border border-black w-full rounded-full mb-8 p-4"></label>
                <label>パスワード
                <input type="password" name="password" class="h-10 border border-black w-full rounded-full mb-8 p-4"></label>
                <label>パスワード確認
                <input type="password" name="password_confirmation" class="h-10 border border-black w-full rounded-full mb-8 p-4">
                </label>
                    <div class="flex my-12 items-center">
                    <img src="{{ asset('images/default.png')}}" alt="select you avatar" class="w-20 h-20 md:w-36 md:h-36 mx-auto object-cover" id="avatarPreview">
                    <input type="hidden" id="selectedAvatarId" name="member_avatar_id" value="">
                <button id="changeButton" type="button" class="text-center btn-primary m-2 p-2">キャラクターを選ぶ</button>
                </div>
                <div class="text-center">
                <button type="submit" class="btn-primary rounded-full text-center px-8 m-4">登録する</button>
                <button class="btn-outline rounded-full text-center px-4 m-4">
                    <a href="{{ route('admin.index') }}">トップに戻る</a>
                </button>
                </div>
            </div>
        </form>

<div id ="avatarsModal" class="modal hidden p-2 md:p-8 overflow-y-auto">
    <div class="flex flex-wrap gap-2 md:gap-8">
    @foreach($avatars as $avatar)
    <div class="avatar_card p-2">
            <img src="{{$avatar->avatar_path}}" alt="Selectable avatar option showing a character portrait for profile choice" class="avatarOption object-cover w-16 h-12 md:w-32 md:h-24 cursor-pointer" data-id="{{$avatar->id}}" data-path="{{$avatar->avatar_path}}">
    </div>
    @endforeach
    </div>
        <button class="closeButton btn-outline m-8">戻る</button>
</div>


<script>
    const openModal =document.getElementById('changeButton');
    const avatarsModal = document.getElementById('avatarsModal');
    const closeModals = document.querySelectorAll('.closeButton');

    const selectedAvatar = document.querySelectorAll('.avatarOption');
    const avatarPreview = document.getElementById('avatarPreview');
    const selectedAvatarIdInput = document.getElementById('selectedAvatarId');

    openModal.addEventListener("click",()=>{
        avatarsModal.classList.remove("hidden");
    });

    selectedAvatar.forEach(avatar=>{
        avatar.addEventListener("click",()=>{
            const avatarId = avatar.dataset.id;
            const avatarPath = avatar.dataset.path;

            avatarPreview.src =avatarPath;
            selectedAvatarIdInput.value = avatarId;
            avatarsModal.classList.add("hidden");
        });
    });

    closeModals.forEach(button=>{
        button.addEventListener("click",()=>{
            avatarsModal.classList.add("hidden");
        });
    });

</script>
        </main>
@endsection