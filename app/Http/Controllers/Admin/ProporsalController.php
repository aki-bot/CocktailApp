<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proporsal;

class ProporsalController extends Controller
{
    public function create(Request $request){
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            //もし$requestの中に何もなければnullが取得される
            $proporsals = Proporsal::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのレビューを取得する
            $proporsals = Proporsal::all();
        }
        //投稿したレビューを取得するためにパラメータのRequestに向かって最後の['reviews' => $reviews, 'cond_title' => $cond_title]のコードが動いている
        return view('admin.proporsal.create', ['proporsals' => $proporsals, 'cond_title' => $cond_title]);
    }
}
