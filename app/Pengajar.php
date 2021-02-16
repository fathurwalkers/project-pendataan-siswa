<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajar';
    protected $guarded = [];

    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
}
