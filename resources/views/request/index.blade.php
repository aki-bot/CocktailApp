{{--このファイルはリクエストのトップページになっている--}}
@extends('layouts.front')
@section('title', 'リクエストについて')
@section('content')
    <div class="container">
        <h2 class="request-content">リクエストを送る</h2>
        {{--この「hr」で直線を書くことができる--}}
        <hr color="#c0c0c0">
        <a href="{{ action('RequestController@create') }}">新規リクエストを作成する</a>
    </div>
@endsection