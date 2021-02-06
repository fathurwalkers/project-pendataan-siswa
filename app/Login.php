<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';

    protected $guarded = [];

    public function detail()
    {
        return $this->hasOne('App\Detail');
    }
}
