<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Drink;
use Carbon\Carbon;
use App\History;

class DrinkController extends Controller
{
    public function add(){
        return view('admin.drink.create');
    }

    public function create(Request $request){
            //バリデーションをするためのコード(緑の部分はモデル名)
            $this->validate($request, Drink::$rules);
            $drink = new Drink;
            $form = $request->all();
            //「isset関数」は変数に値が入っているかを確認するために使う
            if (isset($form['image'])) {  //($変数の定義)
            $path = $request->file('image')->store('public/image');  //変数に値が入っている時の処理(if文)
            $drink->image_path = basename($path);
            } else {
              $drink->image_path = null;  //変数で値が入っていなかった時の処理(else文)
            }
            //「unset」では定義した変数の割当を削除することができる
            // フォームから送信されてきた_tokenを削除する
            unset($form['_token']);
            // フォームから送信されてきたimageを削除する
            //トークン＝印のこと
            unset($form['image']);

            //データベースに保存するように命令している
            $drink->fill($form);
            $drink->save();

            //createアクションに命令がきたらadmin/drink/createにリダイレクト（転送）させる
            return redirect('admin/drink/create');
    }

    public function index(Request $request){
            //$requestの中の$cond_titleを$cond_titleに代入している
            //$requestに何もデータが入っていなければnullと表示される
             //このcond_titleは一番最後のコードがRequestにcond_titleを送っている
            //最初の段階では意味が無い変数
            $cond_title = $request->cond_title;
            //ユーザーが渡した文字列が「cond_title」でデータベースにあるデータを「Drink」で照らし合わせて見ている  
            if ($cond_title != '') {
            // cond_titleにデータがあれば一致するデータを呼び出すことができる
            $posts = Drink::where('title', $cond_title)->get();
            } else {
            // cond_titleにデータがなかった場合（null）にはモデルを使ってデータベースにある全てのデータを取り出すと言っている
            $posts = Drink::all();
            }
             return view('admin.drink.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

             
    public function edit(Request $request){
            // Drink Modelからデータを取得する
            $drink = Drink::find($request->id);
            if (empty($drink)) {
            abort(404);    
            }
             return view('admin.drink.edit', ['drink_form' => $drink]);
    }
            //これでデータの更新（編集）をすることができる
    public function update(Request $request){
            // Validationをかける
            $this->validate($request, Drink::$rules);
            // Drink Modelからデータを取得する
            $drink = Drink::find($request->input('id'));
            // 送信されてきたフォームデータを格納する
            $drink_form = $request->all();
            if ($request->input('remove')) {
                $drink_form['image_path'] = null;
            } elseif ($request->file('image')) {
                $path = $request->file('image')->store('public/image');
                $drink_form['image_path'] = basename($path);
            } else {
                $drink_form['image_path'] = $drink->image_path;
            }
                        //     if (isset($drink_form['image'])) {
                        //     $path = $request->file('image')->store('public/image');
                        //     $drink->image_path = basename($path);
                        //     unset($drink_form['image']);
                        //     } elseif (0 == strcmp($request->remove, 'true')) {
                        //     $drink->image_path = null;
                        //     }
            //「unset」で変数の削除ができるようになる
            unset($drink_form['_token']);
            unset($drink_form['image']);
            unset($drink_form['remove']);
            // 該当するデータを上書きして保存する
            $drink->fill(($drink_form))->save();
            //carbonは時刻を扱うための日付け操作ライブラリーのこと
            $history = new History;
            $history->drink_id = $drink->id;
            //Carbonを使って得た現在時間を「edited_at」に渡している
            $history->edited_at = Carbon::now();
            $history->save();

            return redirect('admin/drink');
    }
    //このアクションで削除する命令を出すことができている
    public function delete(Request $request){
            $drink = Drink::find($request->id);
            // 削除する
            $drink->delete();
            return redirect('admin/drink/');
    }
}
