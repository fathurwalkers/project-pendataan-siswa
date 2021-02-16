<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'detail';

    protected $guarded = [];

    public function login()
    {
        return $this->hasOne('App\Login');
    }

    public function pengajar()
    {
        return $this->hasOne('App\Pengajar');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
