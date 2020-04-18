@extends('layouts.front')
@section('title', 'みんなの感想')
@section('content')
    <div class="container">
       <h2>みんなの感想を見る</h2>
        <div class="drink-serch">みんなの感想を検索する</div>
        {{--入力エリアには「form-control」クラスを設定する--}}
        <input type="text" name="cond_title" value class="form-control">
        {{--この「hr」で直線を書くことができる--}}
        <hr color="#c0c0c0">
    </div>
    {{--左側が配列で右側が要素--}}
    <div class="container">
        <div class="row">
            
        @foreach($reviews as $review)
        <div class="col-4 p-4 border-none">
            <div class="card">
            <img class="card-img-top"src="{{ asset('storage/image/' . $review->drink->image_path) }}" style="height:200px; object-fit: cover;">
            <div class="card-body">
              <div>カクテル名</div>
              <a href="{{ action('ReviewController@show',['id' => $review->id])}}">
                <div>{{ $review->drink->name }}</div></a>
              <div>総合評価
              {{ ($review->all) }}
            </div>
            <div>
                {{ $review->text }}
            </div>
            </div>
            </div>
          </div>
        {{--clo-3をつけることでレイアウトが変わってくる--}}
            {{-- <div class="col-3 box">
                
                {{--要素の値が取り出されている--}}
                
                {{-- <img src="{{ asset('storage/image/' . $review->drink->image_path) }}" class="view-img">
            
                <div>
                    <div>カクテル</div>
                    <a href="{{ action('ReviewController@show',['id' => $review->id])}}">
                    <div>{{ $review->drink->name }}</div></a>
                </div>
                <div>
                    <div>甘口度</div>
                {{ \Str::limit($review->sweet) }}
                </div>
                <div>
                    <div>辛口度</div>
                {{ \Str::limit($review->dry) }}
                </div>
                <div>
                    <div>酸味</div>
                {{ \Str::limit($review->acidity) }}
                </div>
                <div>
                    <div>苦味</div>
                {{ \Str::limit($review->bitter) }}
                </div>
                <div>
                    <div>総合評価
                {{ \Str::limit($review->all) }}
                    </div>
                </div>
            
        
    </div> --}} 
         @endforeach
        </div>
        <hr color="#c0c0c0">
    </div>
    
    
@endsection