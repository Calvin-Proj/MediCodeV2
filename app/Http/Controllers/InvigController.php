<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Misconduct;
use App\Models\User;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class InvigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    //button routes for invigilators
    public function indexinvigschedule()
    {
        return view('usertypes.invig.scheduleviewinvig');
    }
    public function indexinvigmiscon()
    {
        return view('usertypes.invig.submisconduct');
    }

    public function createinvigmiscon(Request $request)
     {
         $this->validate(request(),
         [
            'user_id' => 'required|int',
             'test_id' => 'required|int',
             'misconduct_desc' => 'required'
          ]);

         $misconduct= new Misconduct;
         $misconduct->user_id = $request->user_id;
         $misconduct->test_id = $request->test_id;
         $misconduct->misconduct_desc = $request->misconduct_desc;



          $user_id=User::where('id','=',$misconduct->user_id)
          ->first();

          if ($user_id == null )
          {
            return redirect()->back()->with('error', 'Student does not exist');
          }

          $test_id=Test::where('id','=',$misconduct->test_id)
          ->first();

          if ($test_id == null )
          {
            return redirect()->back()->with('error', 'Test does not exist');
          }


           $check=Misconduct::where('user_id','=',$misconduct->user_id )
           ->where('test_id','=',$misconduct->test_id )->first();

         if($check <> null)
         {
             return redirect()->back()->with('error', 'Record already exists');
         }

         $misconduct->save();


         session()->flash('updated', 'Misconduct Added ');

         return redirect('/');


    }



    public function indexinvighours()
    {
        return view('usertypes.invig.subhours');
    }
    public function indexhelp()
    {
        return view('usertypes.invig.invighelp');
    }
}
