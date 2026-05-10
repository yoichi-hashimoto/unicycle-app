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
    <header class="bg-green-500 w-full flex justify-between h-20 items-center fixed z-50">
        <div class="flex items-center m-3">
            <img src="{{asset('/images/okuma_transparent.png')}}" alt="ロゴ" class="w-16 h-16">
            <h1 class="text-white p-4 text-lg">
                <a href="{{ asset('/')}}">おおくま一輪車クラブ</a>
            </h1>
        </div>
        @if(auth()->user() && auth()->user()->is_admin)
        <nav class="hidden bg-white text-green-600 py-3 px-6  rounded-lg md:text-green-600 md:flex md:list-none md:gap-8  m-5">
            <li><a href="{{route('admin.index')}}" class="group text-green-600 pb-0.5 border-b-2 border-transparent hover:border-green-500 transition-all">管理者ホーム</a></li>
            <li><a href="{{route('register')}}" class="group text-green-600 pb-1 border-b-2 border-transparent hover:border-green-500 transition-all">メンバー登録</a></li>
            <li><a href="{{route('delete.show')}}" class="group text-green-600 pb-1 border-b-2 border-transparent hover:border-green-500 transition-all">メンバー削除</a></li>
            <li><a href="{{route('practiceJadge.show')}}" class="group text-green-600 pb-1 border-b-2 border-transparent hover:border-green-500 transition-all">レベルアップチェック</a></li>
        </nav>
        @endif

        @auth
            <nav class="hidden md:flex md:list-none md:gap-5 md:text-white m-5">
                    <a href="{{ route('profile.show') }}" class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">プロフィール</a>
                        <p class="menu-bar"></p>
                    <a href="{{ route('animal.show') }}"  class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">ランキング</a>
                        <p class="menu-bar"></p>
                    <a href="{{ route('technical.show') }}"  class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">わざ一覧</a>
                        <p class="menu-bar"  class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all"></p>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="menu group text-white pb-1 border-b-2 border-transparent hover:border-white transition-all">ログアウト</button>
                    </form>
                @endauth
            </nav>
            <!-- <nav class="md:hidden">
                    <span></span>
            </nav> -->
    </header>
    @yield('content')
    
</body>
</html>