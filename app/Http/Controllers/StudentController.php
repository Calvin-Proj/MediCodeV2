<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Sick_Note;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    //button routes for students
    
    public function indexbooktest()
    {
      
       return view('usertypes.student.booksicktest');
    }

    public function fileUpload(Request $request)
    {
           $this->validate(request(),  
                   [
                  'title'=> 'required|string',
                   'file' => 'required|mimes:pdf,xlx,csv|max:2048',
                  'test_id'=> 'required|int'
                   ]);
       

        $input= $request->all();
        
        if($file= $request->file('file'))
        {
          $name = $file->getClientOriginalName();
          
          $file->move('SickNotes',$name);
          
          $input['path'] = $name;
          $input['user_id'] = auth()->user()->id;
          
         
        }

        $test_id=Test::where('id','=', $input['test_id'])
        ->where('test_type','=','Sick Test')
        ->first();
        
        if ($test_id == null ) 
        {
          return redirect()->back()->with('error', 'SickTest does not exist');                  
        }


         $id=auth()->user()->id;

         $check=Sick_Note::where('user_id','=',$id)
         ->where('test_id','=',$input['test_id'] )->first();

         if($check <> null) 
         {
             return redirect()->back()->with('error', 'You have already booked for this test');  
         }
        
        Sick_Note::create($input);

        session()->flash('updated', 'Sick Note Uploaded ');
        return redirect('/');


        }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }

        $building=DB::table('buildings')
        ->join('venues','buildings.id','=','venues.building_id')
        ->join('tests','venues.id','=','tests.venue_id')
        ->join('modules', 'tests.module_id','=','module_id')
        ->join('module_user', 'modules.id', '=', 'module_user.module_id')
        ->join('users', 'module_user.user_id', '=', 'user_id')
        ->select('buildings.building_location' , 'tests.*','modules.module_code', 'users.name','venues.no_of_seats')
        ->first();
     
         
        
        return view('usertypes.student.testsched',compact('building'));
    }
    public function indexhelp()
    {
        return view('usertypes.student.studenthelp');
    }
}
