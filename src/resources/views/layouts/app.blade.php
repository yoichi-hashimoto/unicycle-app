<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnicycleApp</title>
    <link rel="stylesheet" href="/css/layouts.css">
    <link rel="stylesheet" href="/css/unicycle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>
<body>
    <header class="bg-green-500 w-full flex justify-between h-20 items-center top-0 fixed z-50 px-2">
        <div class="flex items-center m-3">
            <img src="{{asset('/images/okuma_transparent.png')}}" alt="ロゴ" class="w-16 h-16">
            <h1 class="text-white p-4 text-lg">
                <a href="{{ asset('/')}}">おおくま一輪車クラブ</a>
            </h1>
        </div>
        @if(auth()->user() && auth()->user()->is_admin)
        <nav class="hidden bg-white text-green-600 py-3 px-6  rounded-lg md:text-green-600 lg:flex lg:list-none md:gap-8  m-5">
            <li><a href="{{route('admin.index')}}" class="group text-green-600 pb-0.5 border-b-2 border-transparent hover:border-green-500 transition-all">ホーム</a></li>
            <li><a href="{{route('register')}}" class="group text-green-600 pb-1 border-b-2 border-transparent hover:border-green-500 transition-all">メンバー登録</a></li>
            <li><a href="{{route('delete.show')}}" class="group text-green-600 pb-1 border-b-2 border-transparent hover:border-green-500 transition-all">メンバー削除</a></li>
            <li><a href="{{route('practiceJadge.show')}}" class="group text-green-600 pb-1 border-b-2 border-transparent hover:border-green-500 transition-all">レベルアップチェック</a></li>
        </nav>
        @endif

        @auth
            <nav class="hidden lg:flex lg:list-none md:gap-5 md:text-white m-5">
                    <a href="{{ route('profile.show') }}" class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">プロフィール</a>
                        <p class="menu-bar"></p>
                    <a href="{{ route('animal.show') }}"  class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">ランキング</a>
                        <p class="menu-bar"></p>
                    <a href="{{ route('history.show') }}" class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">チャレンジ履歴</a>
                        <p class="menu-bar"></p>
                    <a href="{{ route('technical.show') }}"  class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">わざ一覧</a>
                        <p class="menu-bar"  class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all"></p>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">ログアウト</button>
                    </form>
            </nav>
    <button type="button" class="humberger lg:hidden m-5" id="hamburger">
        <span class="block w-6 h-0.5 bg-white mb-1"></span>
        <span class="block w-6 h-0.5 bg-white mb-1"></span>
        <span class="block w-6 h-0.5 bg-white"></span>
    </button>
    <nav id="mobile-menu" class="mobile-menu hidden fixed top-20 right-5 bg-green-500 text-white py-3 px-6 rounded-lg w-40 z-[9999]">        
            <a href="{{ route('profile.show') }}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">プロフィール</a>
            <a href="{{ route('animal.show') }}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">ランキング</a>
            <a href="{{ route('history.show') }}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">チャレンジ履歴</a>
            <a href="{{ route('technical.show') }}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">わざ一覧</a>
            <form action="{{ url('/logout') }}" method="POST">
                @csrf   
                <button type="submit" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">ログアウト</button>
            </form>

            @if(auth()->user() && auth()->user()->is_admin)
                <a href="{{route('admin.index')}}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">管理者ホーム</a>
                <a href="{{route('register')}}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">メンバー登録</a>
                <a href="{{route('delete.show')}}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">メンバー削除</a>
                <a href="{{route('practiceJadge.show')}}" class="block py-2 pb-1 border-b-2 border-transparent hover:border-white transition-all">レベルアップチェック</a>
            @endif
        @endauth
        
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
                console.log(mobileMenu.className);
        });

        // 画面サイズが変更されたときにメニューを閉じる
        // window.addEventListener('resize', () => {
        //     if (window.innerWidth >= 1024) { // lg以上のサイズでメニューを表示
        //         mobileMenu.classList.add('hidden');
        //     }
        // });
});
    </script>
    </header>
    @yield('content')
    


</body>
</html>