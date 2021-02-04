<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
    protected $guarded = array();

    public function getLectData()
    {
        //needs data from module relation venue info
        $adlect = DB::table('users')
        ->join('modules', 'modules.id', '=', 'module_user.module_id')
        ->select('users.*','modules.module_name')
        ->orderBy('created_at','desc')
        ->get();
        return $adlect;
    }

    public function getInvigData()
    {
        return static::where('usertype','invig')->orderBy('created_at','desc')->get();
    }
    public function getStudentData()
    {
        $tests = DB::table('users')
        ->Join('module_user','users.id', '=', 'module_user.user_id')
        ->Join('modules', 'modules.id', '=', 'module_user.module_id')
        ->select('users.*', 'modules.module_name')
        ->where('usertype','student')
        ->get();
        return $tests;
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

    public function modules()
    {

  return $this->belongsToMany('App\Models\Module');

    }

    public function attendances()
    {

        return $this->hasMany('App\Models\Attendance');

    }

    public function sicktest_notes()
    {

        return $this->hasMany('App\Models\Sick_Note');

    }

    public function bookings()
    {

        return $this->hasMany('App\Models\Booking');

    }
    public function tests()
    {

        return $this->belongsToMany('App\Models\Test');

    }
    public function misconduct()
    {

        return $this->belongsTo('App\Models\Misconduct');

    }
}
