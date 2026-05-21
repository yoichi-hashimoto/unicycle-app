@extends('layouts.app')

@section('content')
<main class="pt-28">
    <h1 class="text-center m-auto">みんなのレベル</h1>

<div class="w-4/5 my-4 mx-auto mt-12 flex justify-around md:gap-4">
    @foreach($animals as $animal)
    <div class="m-4">
        <div class="animal-container">
            <p class="level-int">{{$animal->description}}</p>
            <img src="{{asset($animal->animal_path)}}" alt="動物の画像" class="animal-image">
            <p>{{$animal->name}}</p>
        </div>
        @foreach($animal->matchedUsers as $user)
            @if(auth()->check() && auth()->user()->id === $user->id)
        <div class="auth-user-container">
            @else
        <div class="member-container">
            @endif
            <p class="member-name">{{ $user->name }}</p>
            <img src="{{ asset($user->avatar->avatar_path)}}" alt="ユーザー画像" class="member-image">
            <div class="flex align-bottom justify-around gap-2 p-0.5">
                <div class="flex items-center">
                <p class="level-text">レベル</p>
                <p class="level-int">{{ $user->histories->last()->practice->level}}</p>
                </div>
                <div class="flex items-center">
                <p class="text-red-500">&#9829;</p>
                <p class="received-likes">{{ $user->receivedLikesCount }}</p>
                </div> 
            </div>
                    @if(auth()->check() && auth()->user()->id === $user->id)
                    <div class="current-user-indicator">
                        <p class="text-md text-center text-white font-bold">あなた</p>
                    </div>
                    @endif
        </div>
        @endforeach 
    </div>
    @endforeach
</div>
</main>

<script>
    document.addEventListener('DOMContentLoaded',function(){
        const select = document.getElementById('selectedMember');
        const image = document.getElementById('memberImage');
        const level = document.getElementById('memberLevel');
        const challenge = document.getElementById('nextChallenge');

        if(!select || !image || !level || !challenge)return;

        function updateMemberInfo(){
            const selectedOption = select.options[select.selectedIndex];
            const memberAvatar = selectedOption.dataset.image;
            const memberLevel = selectedOption.dataset.level || '-';
            const memberChallenge = selectedOption.dataset.challenge || '-';

            if(memberAvatar){
                image.src = memberAvatar;
                image.style.display = 'block';
            }else{
                image.src = '';
                image.style.display = 'none';
            }

                level.textContent = memberLevel;
                challenge.textContent = memberChallenge;
            }
            select.addEventListener('change',updateMemberInfo);

            updateMemberInfo();
        });
</script>

@endsection