{{--カクテルの一覧ページ--}}
{{--共通のファイルの拡張であることを言っている--}}
@extends('layouts.admin')
{{--@yieldにタイトルを新しく表示させる--}}
@section('title', '登録済みカクテル一覧')
{{--@yieldに新しくページの内容を表示させる--}}
@section('content')
    <div class="container">
        <div class="row">
            <h2>カクテル一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                {{--アクションを「a href」のなかに入れてあげるとクリックした時にそこの画面に移動することができる--}}
                <a href="{{ action('Admin\DrinkController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                {{--フォームタグからデータを受け取る--}}
                {{--methodではgetかpostか指定することができる/シェアしたい内容であれば「get」誰にも見られたく内容なら「post」特にログインの内容やパスワードのやりとり--}}
                {{--actionでは「どこに」データを送信するのか/methodでは「どの方法で」データを送信するのかを指定している--}}
                <form action="{{ action('Admin\DrinkController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            {{--value属性はコントロールの種類によって異なる意味を持つ--}}
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{--クロスサイトリクエストフォージェリの攻撃を防ぐことができる--}}
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        {{--表の一番上の行を定義することができる--}}
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">カクテル名</th>
                                <th width="10%">サブタイトル</th>
                                <th width="10%">レシピ</th>
                                <th width="5%">度数</th>
                                <th width="30%">解説</th>
                                <th width="10%">総合評価</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $drink)
                            {{--str_limitは文字列を指定した数で区切ることができる--}}
                            {{--<thead>タグで指定したタイトルの内容をつくることができる--}}
                                <tr>
                                    <th>{{ $drink->id }}</th>
                                    <td>{{ str_limit($drink->name, 100) }}</td>
                                    <td>{{ str_limit($drink->sub, 150) }}</td>
                                    <td>{{ str_limit($drink->thing, 150) }}</td>
                                    <td>{{ str_limit($drink->how, 100) }}</td>
                                    <td>{{ str_limit($drink->body, 200) }}</td>
                                    <td>{{ str_limit($drink->all, 100) }}</td>
                                    <td>
                                        <div>
                                            {{--このphpのデータを読み込んだことで編集の文字をしたら編集する画面に移動することができる--}}
                                            <a href="{{ action('Admin\DrinkController@edit', ['id' => $drink->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\DrinkController@delete', ['id' => $drink->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

