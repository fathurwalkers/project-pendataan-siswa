<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $guarded = [];

    public function pengajar()
    {
        return $this->belongsTo('App\Pengajar');
    }

    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
}
