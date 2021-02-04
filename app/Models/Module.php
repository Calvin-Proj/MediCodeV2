<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'modules';
    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
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


    /**
     * The primary key associated with the table.
     *
     *
     */
    //protected $primaryKey = 'module_code'; @var string

     /**
     * Indicates if the model's ID is auto-incrementing.
     *
     *
     */
    //public $incrementing = false;@var bool

    /**
     * The data type of the auto-incrementing ID.
     *
     *
     */
   // protected $keyType = 'string';@var string

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function tests()
    {

        return $this->hasMany('App\Models\Test');

    }

    public function qualifications()
    {
        return $this->belongsToMany('App\Models\Qualification');
    }


}
