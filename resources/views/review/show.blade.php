@extends('layouts.front')
@section('title', 'レビューの詳細')
@section('content')
    <div class="container">
        <h2>レビューの詳細</h2>
       <hr color="#c0c0c0">
         {{-- <img src="/storage/image/{{$review->drink->image_path}}"> --}}

        <h5 class="name">カクテル名</h5>
        <p>{{ $review->drink->name }}</p> 
         <h5 class="sweet">甘口度</h5>
        <p>{{ ($review->sweet) }}</p>
        <h5 class="dry">辛口度</h5>
        <p>{{ ($review->dry) }}</p>
        <h5 class="acidity">酸味</h5>
        <p>{{ ($review->acidity) }}</p>
        <h5 class="bitter">苦味</h5>
        <p>{{ ($review->bitter) }}</p>
        <h5 class="all">総合評価</h5>
        <p>{{ ($review->all) }}</p>
        <h5>感想</h5>
        <p>{{ ($review->text)}}</p>
        <hr color="#c0c0c0">
    </div>
    
@endsection