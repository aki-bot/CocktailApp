<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
    public function create(Request $request){
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            //もし$requestの中に何もなければnullが取得される
            $reviews = Review::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのレビューを取得する
            $reviews = Review::all();
        }
        //投稿したレビューを取得するためにパラメータのRequestに向かって最後の['reviews' => $reviews, 'cond_title' => $cond_title]のコードが動いている
        return view('admin.review.create', ['reviews' => $reviews, 'cond_title' => $cond_title]);
    }
    public function delete(Request $request){
      // 該当するNews Modelを取得
      $reviews = Review::find($request->id);
      // 削除する
      $reviews->delete();
      return redirect('admin/review/');
    }  
}
