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
                $id= auth()->user()->id;

                $module=User::find($id)->modules()->first();


                $lect_studs=User::has('modules')->where('usertype','student')->get();
                $lect_studs_count = count($lect_studs);

                $tests=Test::where('module_id', $module->id)
                ->where('test_type','Standard Test')->get();
                $count_test_created = count($tests);


                $tests=Test::where('module_id', $module->id)
                ->where('test_type','Sick Test')
                ->get();
                $count_stest_created = count($tests);


//
                $currentDate = date("Y-m-d");
                $tests=Test::where('module_id', $module->id)
                ->where('test_type','Standard Test')
                ->where('test_date','<',$currentDate)
                ->get();
                $count_test_created_comp = count($tests);

                $tests=Test::where('module_id', $module->id)
                ->where('test_type','Sick Test')
                ->where('test_date','<',$currentDate)
                ->get();
                $count_stest_created_comp = count($tests);

                $tests_upcoming=Test::where('module_id', $module->id)
                ->where('test_date','>',$currentDate)
                ->orderby('test_date', 'asc')->unique();







  //

                return view('usertypes.lecturer.homeLect',compact('module','lect_studs','lect_studs_count', 'count_test_created','count_stest_created','count_test_created_comp','count_stest_created_comp','tests_upcoming'));


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
                ->get()->unique();

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
