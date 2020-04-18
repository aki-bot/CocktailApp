@extends('layouts.front')
@section('title', 'リクエストが完了しました')
@section('content')
    <div class="container">
       <h2>リクエストが完了しました</h2>
        <hr color="#c0c0c0">
        <a href="{{ action('TopController@index') }}">トップページに戻る</a>
    </div>
@endsection