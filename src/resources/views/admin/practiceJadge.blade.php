@extends('layouts.app')

@section('content')
<main class="pt-28">
<h1 class="text-center m-8">レベルアップチェック</h1>

<form action="{{route('practiceJadge.store')}}" method="POST">
    @csrf
<div class="w-3/4 m-auto grid grid-cols-2 items-center text-sm md:text-lg text-center gap-4 md:gap-12">
    <div class="">
        <img src="" id="memberImage" alt="メンバーを選択してください" class="w-32 md:w-48 h-24 md:h-40 text-center m-auto object-cover">
    <select name="members" id="selectedMember" value="メンバー" class="my-4 md:my-8 text-md md:text-xl">
        <option value="choice name">メンバー選択</option>
        @foreach($users as $user)
        <option name="user_id" value="{{ $user->id }}" data-image="{{ $user->avatar ? asset( $user->avatar->avatar_path ) : ''}}" data-level="{{ $user->histories->last()?->practice?->level ?? ''}}" data-challenge="{{ $user->histories->last()->practice?->name ?? ''}}" data-practice-id="{{ $user->histories->last()?->practice_id ?? 0 }}">{{$user->name}}</option>
        @endforeach
    </select>
    </div>
    <input type="hidden" name="practice_id" id="practiceId" value="">
    <div class="w-[150px] h-[150px] md:w-[300px] md:h-[300px] m-auto">
        <div class="">
            <p class="my-2 text-xs md:text-lg">現在のレベル</p>
            <p class="w-12 h-12 md:w-24 md:h-24 m-auto text-xl md:text-3xl font-bold bg-green-500 text-white rounded-full p-2 md:p-7" id="memberLevel"></p>
        </div>
        <div class="my-4 md:my-8">        
            <p class="my-2 text-xs md:text-lg">次のわざ</p>
            <p class="max-w-full max-h-full text-md bg-slate-200 rounded-md p-2" id="nextChallenge"></p>
        </div>
    </div>
    <div class="m-auto flex flex-row  items-center w-full text-lg h-[150px]">
        <button type="submit" id="clear-approve" class="btn-primary w-full h-16 md:text-3xl ">合格！</button>
    </div>
            <a href="{{ route('admin.index') }}" class="text^center w-full h-16 md:text-3xl">
        <button type="button" class="btn-outline w-full h-16 md:text-3xl">トップに戻る</button>
        </a>
    <div class="items-top w-full h-[150px]">
        <button type="submit" id="failure-approve" class="btn-outline w-1/2 h-1/4 p-1">レベルを下げる</button>
    </div>
</div>
</form>
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
            const practiceId = selectedOption.dataset.practiceId || '0';
            if(memberAvatar){
                image.src = memberAvatar;
                image.style.display = 'block';
            }else{
                image.src = '';
                image.style.display = 'none';
            }

            level.textContent = memberLevel;
            challenge.textContent = memberChallenge;
            document.getElementById('practiceId').value = practiceId;
            }
            select.addEventListener('change',updateMemberInfo);

            updateMemberInfo();
        });
</script>

@endsection