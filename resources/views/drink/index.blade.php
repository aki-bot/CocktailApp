{{--共通ファイルの拡張ファイルと言うこと--}}
@extends('layouts.front')
@section('title', 'カクテルの一覧')
{{--その拡張ファイルに今から書くコードを埋め込むよー--}}
@section('content')
    <div class="container">
        <h2 class="drink-content">カクテルを探す</h2>
        <div class="drink-serch">カクテルを検索する</div>
        {{--入力エリアには「form-control」クラスを設定する--}}
        <input type="text" name="cond_title" value class="form-control">
        {{--この「hr」で直線を書くことができる--}}
        <hr color="#c0c0c0">
        {{--is_nullはメゾットの意味は「nullであればtrueでそれ以外であればfalse」になる--}}
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                    {{-- 「img」から始まるコードで画像を表示できるようになる--}} 
                                    
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                {{--$headlineと$postに入っているデータが違うことに気を付ける--}}
                                <div class="title p-2">
                                    
                                    <a href="{{ action('DrinkController@show',['id' => $headline->id])}}">
                                        {{ str_limit($headline->name, 70) }}
                                    
                                    </a>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pl-2">このカクテルと言えば</div>
                            <p class="body mx-auto pl-sm-2">{{ str_limit($headline->sub) }}</p>
                        <div class="col-md-6">
                            <div>解説</div>
                            <p class="body mx-auto">{{ str_limit($headline->body) }}</p>
                        </div>
                        <div class="col-md-6">
                            <div>アルコール度数</div>
                            <p class="body mx-auto">{{ str_limit($headline->how) }}</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif

        <hr color="#c0c0c0">
        
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="title pl-4">
                                    <a href="{{ action('DrinkController@show',['id' => $post->id])}}">
                                    {{ str_limit($post->name, 150) }}
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <div class="pl-sm-3">このカクテルと言えば</div>
                                    <p class="body mx-auto pl-sm-3">{{ str_limit($post->sub) }}</p>
                                <div class="col-md-12">
                                    <div>レシピ</div>
                                    <p class="body mx-auto">{{ str_limit($post->thing) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <div>アルコール度数</div>
                                    <p class="body mx-auto">{{ str_limit($post->how) }}</p>
                                </div>
                                <div class="col-md-12">
                                    <div>解説</div>
                                    <p class="body mx-auto">{{ str_limit($post->body) }}</p>
                                </div>
                            </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
                                   


































                                    
{{--時間を出力することができる--}}                                    
{{-- <div class="date">
{{ $post->updated_at->format('Y年m月d日') }}
                                     </div> --}}