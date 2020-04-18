<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'text' => 'required',
    );
    public function drink()
    {
    //このbelongstoでテーブルの情報を違うviewで取り出せるようになる
      return $this->belongsTo('App\Drink');

    }
}
