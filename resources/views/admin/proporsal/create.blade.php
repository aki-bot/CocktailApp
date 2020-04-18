{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'リクエストの確認')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
{{--divのclassのcontentとrowはグリットシステムを支えるもの--}}
    <div class="container">
        <div class="row">
            {{--mx-autoはコンテンツの中央寄せ--}}
            {{--カラム数は合計で12分割--}}
            {{--1カラムが一つのブロックのイメージ--}}
            <div class="col-md-12">
                <h2>リクエストの確認画面</h2>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProporsalController@create') }}" method="get">
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
                        <th width="10%">ID</th>
                        <th width="10%">性別</th>
                        <th width="10%">年齢</th>
                        <th width="10%">どんな場面</th>
                        <th width="60%">リクエスト内容</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proporsals as $proporsal)
                        <tr>
                            <th>{{ $proporsal->id }}</th>
                            <td>{{ ($proporsal->gender) }}</td>
                            <td>{{ ($proporsal->age) }}</td>
                            <td>{{ ($proporsal->other) }}</td>
                            <td>{{ ($proporsal->request) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection