{{--このファイルはリクエストの新規作成ファイル--}}
@extends('layouts.front')
@section('title', 'リクエストの新規作成')
@section('content')
    <div class="container">
     <div class="main-content">リクエスト新規作成</div>
     <hr color="#c0c0c0">
     <p class="explanation">下記のリクエストフォームのご入力お願い致します。</p>
     <form action="{{ action('RequestController@create') }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
    <div class="gender">
        <label for="gender">性別</label>
        <p><select name="gender" class="gender">
            <option value="0">--</option>
            <option value="1">男</option>
            <option value="２">女</option>
            <option value="3">その他</option>
        </select></p>
    </div>
    <div class="age">
        <label for="age">年齢</label>
        <p><select name="age">
            <option value="0">--</option>
            <option value="1">20代</option>
            <option value="2">30代</option>
            <option value="3">40代</option>
            <option value="4">50代</option>
            <option value="5">60代</option>
            <option value="6">70代</option>
            <option value="7">80代</option>
        </select></p>
    </div>
    <div class="other">
        <label for="other">リクエスト背景</label>
        <p><select name="other">
            <option value="0">--</option>
            <option value="1">気軽に飲みたい</option>
            <option value="2">ホテルで飲みたい</option>
            <option value="3">居酒屋で飲みたい</option>
            <option value="4">大人な雰囲気を味わいたい</option>
            <option value="5">その他</option>
        </select></p>
    </div>
    <div class="form-content">
        <tr>
           <th>
             <label for="your-predate">リクエスト内容</label>
             
       </th>
       <p><textarea name="request" placeholder="例）気軽に飲めるカクテルについて" value="{{ old('request') }}"></textarea></p>
       </tr>
       </div>
       {{ csrf_field() }}
       <input type="submit" class="btn btn-primary" value="送信">
     

       <hr color="#c0c0c0">
    </div>
@endsection