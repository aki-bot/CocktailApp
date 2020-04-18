{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'レビューの確認')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
{{--divのclassのcontentとrowはグリットシステムを支えるもの--}}
    <div class="container">
        <div class="row">
            {{--mx-autoはコンテンツの中央寄せ--}}
            {{--カラム数は合計で12分割--}}
            {{--1カラムが一つのブロックのイメージ--}}
            <div class="col-md-12">
                <h2>レビューの確認画面</h2>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ReviewController@create') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
<div class="row">
    <div class="list-review col-md-12 mx-auto">
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="5%">C-ID</th>
                        <th width="20%">感想</th>
                        <th width="10%">甘さ</th>
                        <th width="10%">辛さ</th>
                        <th width="10%">酸味</th>
                        <th width="10%">苦味</th>
                        <th width="10%">総合評価</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <th>{{ $review->id }}</th>
                            <td>{{ ($review->drink_id) }}</td>
                            <td>{{ ($review->text) }}</td>
                            <td>{{ ($review->sweet) }}</td>
                            <td>{{ ($review->dry) }}</td>
                            <td>{{ ($review->acidity) }}</td>
                            <td>{{ ($review->bitter) }}</td>
                            <td>{{ ($review->all) }}</td>
                            <td>
                                <a href="{{ action('Admin\ReviewController@delete', ['id' => $review->id]) }}">削除</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection