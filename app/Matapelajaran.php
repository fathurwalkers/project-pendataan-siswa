<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    protected $table = 'matapelajaran';

    protected $guarded = [];

    public function pengajar()
    {
        return $this->hasMany('App\Pengajar');
    }

    public function nilai()
    {
        return $this->hasMany('App\Nilai');
    }
}
