<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'sub' => 'required',
        'how' => 'required',
        'thing' => 'required',
        'body' => 'required',
        'all' => 'required',
    );

    public function histories()
    {
      return $this->hasMany('App\History');

    }
}
