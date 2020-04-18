<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proporsal extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'gender' => 'required',
        'age' => 'required',
        'other' => 'required',
        'request' => 'required',
    );
}
