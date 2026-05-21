@extends('layouts.app')

@section('content')
<main class="modal-overlay pt-28">

<h1 class="text-center my-4">上達きろく</h1>

@auth
<div class="flex items-center mx-auto justify-center">
    <img src="{{ $matchedAnimal->animal_path ?? asset('images/default_animal.png') }}" alt="動物の画像" class="w-24 h-24 md:w-40 md:h-36 object-cover">
    <div>
        <h2 class="text-center text-xl">レベル</h2>
        <p class="text-center text-2xl">{{ $current_level ?? '未設定' }}</p>
        <p class="text-center">{{ $matchedAnimal->name ?? '未設定' }}</p>
    </div>

</div>
@endauth
<div class="grid grid-cols-3 gap-4 m-8 md:grid-cols-4 lg:grid-cols-5 z-0">
    @foreach($skills as $skill)
        @php
            $isCleared = auth()->check() && !is_null($current_level) && $skill->level <= $current_level - 1;
        @endphp

        <div class="flex flex-col grid-item w-24 h-24 p-2 md:p-4 rounded-lg m-auto md:w-32 md:h-32 lg:w-48 lg:h-48 relative
            {{ $isCleared ? 'bg-gray-200' : 'bg-green-100' }}">

            <div class="{{ $isCleared ? 'bg-gray-300' : 'bg-white' }} rounded-full w-5 h-5 p-0.5 md:w-8 md:h-8 lg:w-12 lg:h-12 md:p-1 absolute left-1 md:left-2 top-1 md:top-2 flex flex-col items-center justify-center">
                <p class="{{ $isCleared ? 'text-gray-400' : '' }} font-bold text-xs md:text-lg lg:text-2xl text-center">
                    {{ $skill->level }}
                </p>
            </div>

            @if($isCleared)
                <div class="current-user-indicator">
                    <p class="text-center text-2xs md:text-sm lg:text-md p-0.5">クリア！</p>
                </div>
            @endif

            <div class="text-center flex flex-row m-auto">
                <p class="{{ $isCleared ? 'text-gray-400' : '' }} my-1 m-auto text-[8px] md:text-[12px] lg:text-xl">
                    {{ $skill->name }}
                </p>
            </div>

            <div class="{{ $isCleared ? 'bg-green-300' : 'bg-green-600' }} border-2 border-white text-[8px] lg:text-[20px] p-0.5 w-12 md:w-16 text-center rounded-full mx-auto absolute right-1 md:right-2 bottom-1 md:bottom-2 flex items-center">
                <button 
                    class="openModal text-white text-[8px] lg:text-[12px] w-full p-0.5 rounded-lg"
                    data-name="{{ $skill->name }}"
                    data-description="{{ $skill->description }}">
                    せつめい
                </button>   
            </div>
        </div>
    @endforeach
</div>
    <div class="modal hidden flex:between" id="uniModal">
    <div class="modal-content text-end m-2">
        <button id="closeModal" class=" text-2xl">×</button>
    </div>
        <div class="w-full text-center">
            <p id="modalName"></p>
            <div class="modalImage w-72 h-32 md:w-[720px] md:h-64 object-cover mx-auto my-4 md:my-8 bg-green-100 rounded-lg flex items-center">
                <p id="modalDescription" class="modalDiscription my-4 mx-auto"></p>
            </div>
            <button class="movie btn-primary">
                <a href="">動画を見る</a>
            </button>
        </div>
    </div>
</div>
<script src="js/modal.js"></script>
</main>

@endsection