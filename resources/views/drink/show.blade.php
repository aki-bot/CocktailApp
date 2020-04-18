{{--カクテルの詳細画面（この画面から口コミをかけるようにする）--}}
@extends('layouts.front')
@section('title', 'カクテルの詳細')
@section('content')
    <div class="container">
        <h2>カクテルの詳細</h2>
        <hr color="#c0c0c0">
        
    

        <h3 class="name">カクテル名</h3>
           <p>{{ $drink->name }}</p> 
           <h3>
    <img src="/storage/image/{{$drink->image_path}}">
            </h3>
        
        
        <h3 class="sub">このカクテルと言えば</h3>
            <p>{{ $drink->sub }}</p>
        
        <h3 class="how">アルコール度数</h3>
            <p>{{ $drink->how }}</p>
        
        <h3 class="thing">レシピ</h3>
            <p>{{ $drink->thing }}</p>
        
        <h3 class="body">解説</h3>
            <p>{{ $drink->body }}</p>
        
        @auth
        {{--ドリンクIDがaddメゾットにわたる--}}
        <a href="{{ action('ReviewController@add',['id' => $drink->id])}}">感想を新規作成</a>
        @endauth
        <hr color="#c0c0c0">
    </div>
@endsection