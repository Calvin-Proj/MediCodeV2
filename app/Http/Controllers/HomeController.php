<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Test;
use App\Models\User;
use App\Models\Venue;
use App\Models\Module;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $data=auth()->user()->usertype;
        switch ($data) {

            case 'admin':
                $users=User::where('usertype', 'lecturer')->get();
                $users_lect=count($users);


                $users=User::where('usertype', 'student')->get();
                $users_stud=count($users);


                $users=User::where('usertype', 'invig')->get();
                $users_invig=count($users);

                $users=User::where('usertype', 'invig')->get();
                $users_invig=count($users);

                $modules=Module::all();
                $count_Modules=count($modules);

                $buildings=Building::all();
                $count_Buildings=count($buildings);

                $venues=Venue::all();
                $count_Venues=count($venues);

                $tests=Test::where('test_type', 'Standard Test')->get();
                $count_Tests=count($tests);

                $sick_tests=Test::where('test_type', 'Sick Test')->get();
                $count_sTests=count($sick_tests);


                 $currentDate = date("Y-m-d");

                 $tests_completed = Test::where('test_date','<',$currentDate)
                 ->where('test_type', 'Standard Test')->get();
                 $count_CompletedT=count($tests_completed);

                 $sTests_completed = Test::where('test_date','<',$currentDate)
                 ->where('test_type', 'Sick Test')->get();
                 $count_CompletedS = count($sTests_completed);

                return view('usertypes.admin.homeAdmin', compact('users_lect','users_stud','users_invig','count_Modules','count_Venues','count_Tests','count_sTests','count_CompletedT','count_CompletedS'));
                break;


            case 'lecturer':








  //

                return view('usertypes.lecturer.homeLect');


                break;

            case 'student':
                $id= auth()->user()->id;

                $modules=User::find($id)->modules()->get();

                $count_Module=count($modules);

                $currentDate = date("Y-m-d");
                $tests = DB::table('tests')
                ->join('modules', 'tests.module_id', '=', 'modules.id')
                ->join('module_user', 'modules.id', '=', 'module_user.module_id')
                ->select('tests.*', 'modules.*')
                ->where('test_type','Standard Test')
                ->where('test_date','>=',$currentDate)
                ->orderBy('test_date','asc')
                ->get()->limit(4)->unique();

                $count_t = count($tests);
                $tests_completed = DB::table('tests')
                ->join('modules', 'tests.module_id', '=', 'modules.id')
                ->join('module_user', 'modules.id', '=', 'module_user.module_id')
                ->select('tests.*', 'modules.*')
                ->where('test_type','Standard Test')
                ->where('test_date','<',$currentDate)
                ->get();

                 $count_t_c= count($tests_completed);

                 $nearestDate = DB::table('tests')
                 ->join('modules', 'tests.module_id', '=', 'modules.id')
                 ->join('module_user', 'modules.id', '=', 'module_user.module_id')
                 ->select('tests.*', 'modules.*')
                 ->where('test_type','Standard Test')
                 ->where('test_date','>=',$currentDate)
                 ->orderBy('test_date','asc')
                 ->first();

                 $booked= DB::table('sick_notes')
                 ->where('user_id',$id)
                 ->get();

                 $booked=count($booked);

                return view('usertypes.student.homeStud', compact('modules','count_Module', 'tests','count_t','count_t_c','nearestDate','booked'));
                break;

            case 'invig':
                return view('usertypes.invig.homeInvig');
                break;

            default:

                break;
        }


    }

    public function read()
    {


    }
}
