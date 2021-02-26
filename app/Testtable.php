<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testtable extends Model
{
    protected $table = 'test_table';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
