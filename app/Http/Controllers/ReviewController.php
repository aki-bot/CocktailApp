<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Drink;

class ReviewController extends Controller
{
    public function index(Request $request){
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $reviews = Review::where('title', $cond_title)->get();
        } else {
          // それ以外はすべてのニュースを取得する
          $reviews = Review::all()->sortByDesc('updated_at');
        }
        return view('review.index',['reviews' => $reviews, 'cond_title' => $cond_title]);
    }
    public function add(Request $request){
        //Idを取得するため
        $drink_id=$request->id;
        $drink = Drink::find($request->id);

        return view('review.create',['drink_id'=>$drink_id,'drink'=>$drink]);
    }
    public function end(){
        return view('review.end');
    }
    public function create(Request $request){
        $this->validate($request, Review::$rules);

        $review = new Review;
        $form = $request->all();

        //悪意を持った値に書き換えられてしまう。（サイトが乗っ取られてしまう。）
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $review->fill($form);
        $review->save();

        return view('review.end');
        // return redirect('')
    }

    public function show(Request $request){
        $drink_id=$request->id;
        $review = Review::find($request->id);

        return view('review.show',['drink_id'=>$drink_id,'review'=>$review]);
    }

    
}
