<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;



class DrinkController extends Controller
{
    //一般ユーザーから見れるようにするためのController
    //カクテルを探すビューファイルに移動する
    public function index(Request $request){
        //変数「cond_title」には$requestにあるデータを取り出すことを指示されている
        //アロー演算子「->」
        $cond_title = $request->cond_title;
        //もしcond_titleにデータが入っていればデータを検索して取得する
        if ($cond_title != '') {
            $posts = Drink::where('title', $cond_title).orderBy('updated_at', 'desc')->get();
        } else {
            //「Drink::all()」はEloquentを使った全てのテーブルを取得するメゾットのこと
            //「sortByDesc」は投稿日にち順に新しい方から並び替えることを意味している
            $posts = Drink::all()->sortByDesc('updated_at');
        }
        //最新の記事とそうではない記事で表記を変えたいため$headline = $posts->shift();「shift()メソッド」で配列の最初のデータを削除してその値を返している
        //ここでIDを見ている
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        //drink/index.blade.phpファイルを渡している
        //「view」に変数を渡している
        return view('drink.index', ['headline' => $headline, 'posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function show(Request $request){
        // Drink Modelからデータを取得する
        //テーブルにあるデータを表示させたいと思ったらまず①Controllerにコードを書く(以下のコードを追加)②表示させたいViewファイルにコードを書いていく
        $drink = Drink::find($request->id);
        if (empty($drink)) {
        abort(404);    
        }
        return view('drink.show',['drink' => $drink]);
    }
    
}
