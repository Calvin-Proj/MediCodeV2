<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public function campus()
    {

        return $this->belongsTo('App\Models\Campus');

    }

    public function venues()
    {

        return $this->hasMany('App\Models\Venue');

    }
}
