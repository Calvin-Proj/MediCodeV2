<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sick_Note extends Model
{
    use HasFactory;

    protected $table = 'sick_notes';
    protected $guarded = array();

    public function getData()
    {

        $sicknotes = DB::table('sick_notes')
        ->join('users', 'sick_notes.user_id', '=', 'users.id')
        ->join('tests', 'sick_notes.test_id', '=', 'tests.id')
        ->select('sick_notes.*', 'users.email','tests.id')
        ->get();
        return $sicknotes;
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function user()
    {

        return $this->belongsTo('App\Models\User'); //student sick note

    }

    public function bookings()
    {

        return $this->hasMany('App\Models\Booking');

    }

    public function test()
    {

        return $this->belongsTo('App\Models\Test');

    }
}
