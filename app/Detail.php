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

    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($detail) { // before delete() method call this
    //         $detail->login()->delete();
    //         $detail->kelas()->delete();
    //         $detail->semester()->delete();
    //         $detail->pengajar()->delete();
    //         $detail->absensi()->delete();
    //         // do the rest of the cleanup...
    //     });
    // }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function semester()
    {
        return $this->hasMany('App\Semester');
    }

    public function pengajar()
    {
        return $this->hasOne('App\Pengajar');
    }

    public function absensi()
    {
        return $this->hasMany('App\Absensi');
    }
}
