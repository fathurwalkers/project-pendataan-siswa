<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';
    protected $guarded = [];

    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }

    public function pengajar()
    {
        return $this->hasOne('App\Pengajar');
    }
}
