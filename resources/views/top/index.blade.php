@extends('layouts.front')
@section('title', 'SaludosCocktail')
@section('content')
{{--見えてる画面の高さを計算して... 「vh」--}}
<div style="background-image:url('/img/drinks-2578446_1920.jpg'); width:100%; height:100vh; background-size:100%;">
        {{--画像を読み込ませる時にはpublic内に画像を入れて/フォルダ名/画像の相対パスをかく--}}
        {{--背景の画像の時にはcssでする--}}
        {{-- <img src="/img/drinks-2578446_1920.jpg"class="backgroun-img"> --}}
       

</div>
       
       <div class="container">
    <div class="middle-container">
        <div class="middle-wrapper">
            {{-- <h1 class="middle-wrapper center title pt-xl-5">
                〜Have a better　time with a cocktail〜<br>
                「飲む楽しみ」と「見る楽しみ」で存分に味わう
            </h1> --}}
            <div class="left-detail-content">
                <h3 class="mx-auto pt-xl-5" style="width: 200px; background:linear-gradient(transparent 70%, #FFFF00 0%);">AlegríaCocktails</h3>
                <p class="mx-auto" style="width: 350px">
                    AlegríaCocktailsは、<br>
                    仲間と楽しむ時間も、特別な人と過ごす大切な時間も<br>
                    その時に合った最高のカクテルを見つけることができます<br>
                    スタンダードからオリジナルまでカクテルを幅広く楽しんで下さい<br>
                </p>
            </div>
            <div class="center-detail content">
                <h3 class="mx-auto pt-xl-5" style="width: 190px;background:linear-gradient(transparent 70%, #FFFF00 0%);">CocktailCharm</h3>
                <p class="mx-auto" style="width: 350px">
                    カクテルはベースとなるお酒に、お酒やジュースを混ぜて作ることから<br>
                    その人に合わせて何千通りもの味わいが作れることが魅力の一つです<br>

                </p>
            </div>

            <div class="right-detail content">
                <h3 class="mx-auto pt-xl-5" style="width: 250px;background:linear-gradient(transparent 70%, #FFFF00 0%);">ShareYourThoughts</h3>
                <p class="mx-auto" style="width: 500px;">
                    このサイトでは「5」が最高評価です
                    お気に入りのカクテルや、誰かに教えてあげたいカクテルはありますか？<br>
                    カクテルのページから感想を書いて見ましょう!<br>
                    <br>
                </p>
                
            </div>

        </div>
    </div>
    <hr color="#c0c0c0">
</div>
    
@endsection
