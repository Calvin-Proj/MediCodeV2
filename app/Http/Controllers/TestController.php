<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usertypes.lecturer.managetests');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTests(Request $request, Test $test)
    {
        $data = $test->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button class="btn btn-success btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getEditTestData" data-id="'.$data->id.'">Edit</button>
                    <button data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteTestModal" class="btn btn-danger btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
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
            'venue_id' => 'required',
            'module_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $test->storeData($request->all());

        return response()->json(['success'=>'Test added successfully']);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = new Test;
        $data = $test->findData($id);

        $html = '<div class="flex text-white p-2">
                    <label for="test_date">Test Date:</label>
                    <span class="w-14"></span>
                    <input type="date" name="test_date1" id="test_date1" value="'.$data->test_date.'" class="text-gray-600 w-38">
                </div>
                <div class="flex text-white p-2">
                    <label for="test_time">Test Time:</label>
                    <span class="w-14"></span>
                    <input type="time" name="test_time1" id="test_time1" value="'.$data->test_time.'" class="text-gray-600">
                </div>
                <div class="flex text-white p-2">
                    <label for="test_type">Test Type:</label>
                    <span class="w-14"></span>
                    <select name="test_type1" id="test_type1" value="'.$data->test_type.'" class="text-gray-600 w-32">
                        <option value="Standard Test">Standard Test</option>
                        <option value="Sick Test">Sick Test</option>
                    </select>
                </div>
                <div class="flex text-white p-2">
                    <label for="test_desc">Test Description:</label>
                    <span class="w-2"></span>
                    <textarea name="test_desc1" id="test_desc1"'.$data->test_desc.'" class="text-gray-600 w-48">
                    </textarea>
                </div>
                <div class="flex text-white p-2">
                    <label for="test_type">Venue:</label>
                    <span class="w-10"></span>
                    <span class="w-9"></span>
                    <select name="venue_id1" id="venue_id1" value="'.$data->venue_id.'" class="text-gray-600 w-32">
                        <option value="1">Heinz Betz</option>
                        <option value="2">ENG03</option>
                    </select>
                </div>
                <div class="flex text-white p-2">
                    <label for="test_type">Module:</label>
                    <span class="w-8"></span>
                    <span class="w-8"></span>
                    <select name="module_id1" id="module_id1" value="'.$data->module_id.'" class="text-gray-600 w-32">
                        <option value="1">ONT3660</option>
                        <option value="2">WIH3660</option>
                    </select>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'test_date' => 'required',
            'test_time' => 'required',
            'test_type' => 'required',
            'test_desc' => 'required',
            'venue_id' => 'required',
            'module_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $test = new Test;
        $test->updateData($id, $request->all());

        return response()->json(['success'=>'Test updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = new Test;
        $test->deleteData($id);

        return response()->json(['success'=>'Test deleted successfully']);
    }
}
