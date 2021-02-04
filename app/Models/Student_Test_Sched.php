<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student_Test_Sched extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tests';
    protected $guarded = array();

    public function getData()
    {
        $userID =auth()->user()->id;
        $tests = DB::table('tests')
        ->join('modules', 'tests.module_id', '=', 'modules.id')
        ->select('tests.*', 'modules.module_name')
        ->where('users.id', $userID)
        ->get();
        return $tests;
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }
}
