{{--このファイルは全てのファイルの共通ファイルになっている--}}

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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    {{--idとはhtmlの属性のこと/属性とはタグに情報を持たせるもの/idは1つのページに1つだけ--}}
    <div id="app">
    {{--画面上部に表示するナビゲーションバーのこと--}}
    <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
    <div class="container">
        {{--a hrefでリンク先の作成--}}{{--url('パス')はそのままURLを返すと言っている--}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {{--configフォルダにあるapp.phpの中にあるnameにアクセスすると言っている/基本的にはアプリケーションの名前Laravelが格納されている--}}
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </div>
    {{--ここまでがナビゲーションバー--}}
    </nav>
    <main class="py-4">
        {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
        @yield('content')
    </main>
    </div>
</body>
</html>