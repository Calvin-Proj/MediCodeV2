<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Misconduct extends Model
{
    use HasFactory;

    protected $table = 'misconducts';
    protected $guarded = array();

    public function getData()
    {
        $miscon = DB::table('misconducts')
        ->join('users', 'misconducts.user_id', '=', 'users.id')
        ->select('misconducts.*', 'users.email')
        ->orderBy('created_at','desc')
        ->get();

        return $miscon;
    }

    public function test()
    {

        return $this->belongsTo('App\Models\Test');

    }

    public function users()
    {

        return $this->hasMany('App\Models\User'); //students

    }
}
