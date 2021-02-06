<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'detail';

    protected $guarded = [];

    public function login()
    {
        return $this->belongsTo('App\Login');
    }
}