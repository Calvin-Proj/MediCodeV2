<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function test()
    {

        return $this->belongsTo('App\Models\Test');

    }

    public function sicktest_note()
    {

        return $this->belongsTo('App\Models\Sicktest_note');

    }

    public function user()
    {

        return $this->belongsTo('App\Models\User');

    }
}
