@extends('layouts.app')

@section('content')
<main class="pt-20"> 

<form action="{{route('profile.update')}}" method="POST" class="w-full">
@csrf
@method('PATCH')
<div class="w-96 my-12 m-auto text-center">
    
<h1 class="text-3xl">プロフィール変更画面</h1>
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="text-red-600 text-center">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<img src="{{ ($userData->avatar->avatar_path)}}" alt="" class="w-24 h-20 md:w-48 md:h-36 mx-auto my-12 object-cover" id="avatarPreview">
<input type="hidden" id="selectedAvatarId" name="member_avatar_id" value="{{ $userData->avatar_id }}">
<button id="changeButton" type="button" class="text-center btn-primary">キャラクターを変更する</button>

<h2 class="text-left mt-8">ニックネーム</h2>
    <input name="name" type="text" placeholder="{{ $userData->name }}" value="{{ $userData->name }}" class="h-10 border border-black w-full rounded-full mb-8 p-6">
<h2 class="text-left mt-8">パスワードを変更する</h2>
    <input type="password" name="old-password" placeholder="現在のパスワード" class="h-10 border border-black w-full rounded-full mb-8 p-6">
    <input type="password" name="new-password" placeholder="新しいパスワード" class="h-10 border border-black w-full rounded-full mb-4 p-6">
    <input type="password" name="new-password_confirmation" placeholder="新しいパスワード（確認）" class="h-10 border border-black w-full rounded-full mb-8 p-6">

    <button class="btn-primary" type="submit">更新する</button>
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
</div>

<script>
const openModal = document.getElementById('changeButton');
const avatarsModal = document.getElementById('avatarsModal');
const closeModals = document.querySelectorAll('.closeButton')

const selectAvatar = document.querySelectorAll('.avatarOption');
const avatarPreview = document.getElementById('avatarPreview');
const selectedAvatarIdInput = document.getElementById('selectedAvatarId');

openModal.addEventListener("click",()=>{
    avatarsModal.classList.remove("hidden");
});

selectAvatar.forEach(avatar => {
    avatar.addEventListener("click", () => {
        const avatarId = avatar.dataset.id;
        const avatarPath = avatar.dataset.path;
        avatarPreview.src = avatarPath;
        selectedAvatarIdInput.value = avatarId;
        avatarsModal.classList.add("hidden");
    });
});

</script>

</main>
@endsection