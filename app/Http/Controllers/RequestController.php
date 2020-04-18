<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proporsal;

class RequestController extends Controller
{
    public function index(){
        return view('request.index');
    }
    

    public function add(){

        return view('request.create');
    }
    
    public function create(Request $request){
        $this->validate($request, Proporsal::$rules);

        $proporsal = new Proporsal;
         $form = $request->all();

         // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        $proporsal->fill($form);
        $proporsal->save();
        return view('request.create');
    }

    public function end(){
        return view('request.end');
    }
}
