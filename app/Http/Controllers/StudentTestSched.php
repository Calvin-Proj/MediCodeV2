<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class StudentTestSched extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usertypes.student.testsched');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTests(Request $request, Test $test)
    {
        $data = $test->getStudData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
            return '<button class="px-4 py-2 text-white bg-secondary rounded-sm fo font-semibold hover:bg-highlight hover:text-primary focus:outline-none" type="button" onclick="toggleModal(`modal-id`);dodge();">View</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function getSickTests(Request $request, Test $test)
    {
        $data = $test->getSickStudData();
        return \DataTables::of($data)
            
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Test $test)
    {
        $validator = \Validator::make($request->all(), [
            'test_date' => 'required',
            'test_time' => 'required',
            'test_type' => 'required',
            'test_desc' => 'required',
            'module_name' => 'required',
            'venue_name' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $test->storeData($request->all());

        return response()->json(['success'=>'Test added successfully']);
    }

}
