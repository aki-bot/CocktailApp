{{--このファイルは一般向けのファイルの共通ファイルになっている--}}
<!DOCTYPE html>
{{--言語環境を指定するためにある,ローカル環境でも使えるようにという解釈--}}
<html lang="{{ app()->getLocale() }}">
<head>
    {{--headの中身は典型文--}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--クロスサイトリクエストフォージェリー（攻撃）からアプリケーションを守る--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--各ページごとにタイトルは変更になるから@yieldで空けておく--}}
    <title>@yield('title')</title>
    {{--Laravelで用意されているjavescriptを読み込む（js/app.jsファイルのことを指している）--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--グーグルフォントをパフォーマンスの向上のために使う--}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    {{--Laravelで用意されているcssを読み込む(public/css/app.cssのことを指している)--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--自分で作成したcssを読み込むため使う--}}{{--assetは関数のこと/現在のリクエストのスキーマ(HTTPかHTTPS)を使い、アセットへのURLを生成する--}}
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('css/view.css') }}" rel="stylesheet">
</head>
<body>
    {{--idとはhtmlの属性のこと/属性とはタグに情報を持たせるもの/idは1つのページに1つだけ--}}
    <div id="app">
    {{--画面上部に表示するナビゲーションバーのこと--}}
    <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
    <div class="container">
        {{-- a hrefでリンク先の作成 --}}
        {{--url('パス')はそのままURLを返すと言っている --}}
        {{--configフォルダにあるapp.phpの中にあるnameにアクセスすると言っている/基本的にはアプリケーションの名前Laravelが格納されている--}}
        {{-- <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }}</a>   --}}
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <h1 class="header-title">AlegríaCocktails</h1>
                @guest
                <a href="{{ action('TopController@index') }}" class="header-menu">AlegríaCocktailsについて</a>
                <a href="{{ action('DrinkController@index')}}" class="header-menu">カクテルを探す</a>
                <a href="{{ action('ReviewController@index')}}" class="header-menu">みんなの感想</a>
                @else
                <a href="{{ action('TopController@index') }}" class="header-menu">AlegríaCocktailsについて</a>
                <a href="{{ action('DrinkController@index')}}" class="header-menu">カクテルを探す</a>
                <a href="{{ action('ReviewController@index')}}" class="header-menu">みんなの感想</a>
                <a href="{{ action('RequestController@index')}}" class="header-menu">リクエスト</a>
                @endguest
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                {{-- 以下を追記 --}}
            <!-- Authentication Links -->
            {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
            @guest
            <li><a class="dropdown-toggle" href="{{ route('register') }}" style="color:black;">{{ __('新規登録') }}</a></li>
            <li><a class="dropdown-toggle" href="{{ route('login') }}" style="color:black;">{{ __('ログイン') }}</a></li>
        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
        @else
            <li class="nav-item dropdown">
                
                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:black;">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
            {{-- 以上までを追記 --}}
            </ul>
        </div>
    </div>
</nav>
 
    </nav>
    <main class="py-4">
        {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
        @yield('content')
    </main>
    </div>
    <div class="footer">
        <p>
            ©︎ 2020 AlegríaCocktails
        </p>
    </div>
</body>
</html>