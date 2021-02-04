<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'venues';
    protected $guarded = array();

    public function getData()
    {
        $venue = DB::table('venues')
        ->join('buildings', 'buildings.id', '=', 'venues.building_id')
        ->select('venues.*', 'building_name')
        ->get();
        return $venue;
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    public function test()
    {

        return $this->hasOne('App\Models\Test');

    }

    public function buildings()
    {

        return $this->belongsTo('App\Models\Building');

    }

}
