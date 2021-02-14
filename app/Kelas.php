<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function siswa()
    {
        return $this->hasOne('App\Detail');
    }
}
