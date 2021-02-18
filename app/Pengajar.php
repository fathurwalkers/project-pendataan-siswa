<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajar';
    protected $guarded = [];

    public function matapelajaran()
    {
        return $this->belongsToMany('App\Matapelajaran');
    }

    public function kelas()
    {
        return $this->belongsToMany('App\Kelas');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function detail()
    {
        return $this->belongsToMany('App\Detail');
    }
}
