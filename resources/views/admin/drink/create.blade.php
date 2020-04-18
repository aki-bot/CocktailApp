{{--カクテルに新規作成ページ--}}
{{-- layouts/admin.blade.phpを読み込む --}}
{{--つまり共通ファイルの拡張ファイル--}}
{{--@extendsで拡張するよ「layoutsにあるadmin.blade.phpのファイルを」--}}
@extends('layouts.admin')
{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'カクテルの新規作成')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>カクテル新規作成</h2>
                <form action="{{ action('Admin\DrinkController@create') }}" method="post" enctype="multipart/form-data">
                    {{--＄errorsはbalidateで弾かれた内容を記憶する配列のこと--}}
                    {{--countはビルトイン関数で配列の要素の数を数えるのに使う--}}
                    {{--エラーがなければ$errorsはnullを返すからcount($errors)は何も無い状態で返す--}}
                    @if (count($errors) > 0)
                        <ul>
                            {{--foreachは配列の数だけ繰り返し処理を行うこと/--}}
                            {{---$errorsつまりエラーを全て$eに代入すると言っている--}}
                            @foreach($errors->all() as $e)
                            {{--{{ $e }}と書くことでエラーが表示されるようになる--}}
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">カクテル名</label>
                        <div class="col-md-10">
                            {{--データを書くための箱をinput（textarea）でつくる--}}
                            {{--データベースに保存した内容を表示するために{{old（カラムの名前}}のコードを書いている--}}
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="sub">サブタイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="sub" value="{{ old('sub') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="how">度数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="how" value="{{ old('how') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="thing">レシピ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="thing" value="{{ old('thing') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">解説</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="all">総合評価</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="all" value="{{ old('all') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
            