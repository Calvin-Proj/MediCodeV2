<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }

    public function misconducts()
    {

        return $this->hasMany('App\Models\Misconduct');

    }

    public function test()
    {

        return $this->belongsTo('App\Models\Test');

    }

    public function user()
    {

        return $this->belongsTo('App\Models\User'); //invigilator

    }
}
