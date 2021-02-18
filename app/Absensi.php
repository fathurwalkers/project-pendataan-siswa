<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $guarded = [];

    public function pengajar()
    {
        return $this->belongsTo('App\Pengajar');
    }
}
