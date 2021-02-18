<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajar';
    protected $guarded = [];

    public function matapelajaran()
    {
        return $this->belongsTo('App\Matapelajaran');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
}
