@extends('layouts.front')
@section('title', 'レビューの新規作成')
@section('content')
    <div class="container">
    <div class="main-container">レビュー新規作成</div>
        <hr color="#c0c0c0">
        <form action="{{ action('ReviewController@create') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
        <label class="tag">カクテル名</label>
        {{ $drink->name }}
            <div class="teist">
                    <p><label class="tag">テイスト</label></p>
                    
                    <label class="sweet">甘口度</label>
                    
                    <p><select name="sweet">
                        <option value="0" name="sweet">--</option>
                        <option value="すごい甘い" name="sweet">すごい甘い</option>
                        <option value="甘い" name="sweet">甘い</option>
                        <option value="やや甘い" name="sweet">やや甘い</option>
                        <option value="普通" name="sweet">普通</option>
                    </select></p>
                 <label class="dry">辛口度</label>
                    <p><select name="dry">
                        <option value="0" name="dry">--</option>
                        <option value="すごい辛い" name="dry">すごい辛い</option>
                        <option value="辛い" name="dry">辛い</option>
                        <option value="やや辛い" name="dry">やや辛い</option>
                        <option value="普通" name="dry">普通</option>
                    </select></p>
                    <label class="acidity">酸味</label>
                    <p><select name="acidity">
                        <option value="0" name="acidity">--</option>
                        <option value="すごい酸っぱい" name="acidity">すごい酸っぱい</option>
                        <option value="酸っぱい" name="acidity">酸っぱい</option>
                        <option value="やや酸っぱい" name="acidity">やや酸っぱい</option>
                        <option value="普通" name="acidity">普通</option>
                    </select></p>
                    <label class="bitter">苦味</label>
                    <p><select name="bitter">
                        <option value="0" name="bitter">--</option>
                        <option value="すごい苦い" name="bitter">すごい苦い</option>
                        <option value="苦い" name="bitter">苦い</option>
                        <option value="やや苦い" name="bitter">やや苦い</option>
                        <option value="普通" name="bitter">普通</option>
                        
                    </select></p>
            </div>
            <div class="evaluation">
                <label class="all">総合評価</label>
               <p><select name="all">
                    <option value="0" name="all">--</option>
                    <option value="1" name="all">1</option>
                    <option value="2" name="all">2</option>
                    <option value="3" name="all">3</option>
                    <option value="4" name="all">4</option>
                    <option value="5" name="all">5</option>
                </select></p>
            </div>
            <div class="text">
                <label class="text">感想</label>
                <p><textarea name="text">{{ old('text') }}</textarea></p>
            </div>
            {{--これでidを読み取るように指示している--}}
            <input type="hidden" name="drink_id" value="{{ $drink_id }}">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="投稿">
    </form>
    </div>
@endsection