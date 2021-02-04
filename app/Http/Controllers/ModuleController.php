<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usertypes.admin.managemodule');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getModules(Request $request, Module $module)
    {
        $data = $module->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button class="btn btn-success btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getEditModuleData" data-id="'.$data->id.'">Edit</button>
                    <button data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteModuleModal" class="btn btn-danger btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getDeleteId">Delete</button>';
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
    public function store(Request $request, Module $module)
    {
        $validator = \Validator::make($request->all(), [
            'module_code' => 'required',
            'module_name' => 'required',
            'module_year' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $module->storeData($request->all());

        return response()->json(['success'=>'Module added successfully']);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = new Module;
        $data = $module->findData($id);

        $html = '<div class="flex text-white p-2">
                    <label for="module_code">Module Code:</label>
                    <span class="w-14"></span>
                    <input type="text" name="module_code1" id="module_code1" value="'.$data->module_code.'" class="text-gray-600 w-38">
                </div>
                <div class="flex text-white p-2">
                    <label for="module_name">Module Name:</label>
                    <span class="w-7"></span>
                    <span class="w-6"></span>
                    <input type="text" name="module_name1" id="module_name1" value="'.$data->module_name.'" class="text-gray-600">
                </div>
                <div class="flex text-white p-2">
                    <label for="module_year">Module Year:</label>
                    <span class="w-8"></span>
                    <span class="w-8"></span>
                    <select name="module_year1" id="module_year1" value="'.$data->module_year.'" class="text-gray-600 w-32">
                        <option value=1>1st Year</option>
                        <option value=2>2nd Year</option>
                        <option value=3>3rd Year</option>
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
            'module_code' => 'required',
            'module_name' => 'required',
            'module_year' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $module = new Module;
        $module->updateData($id, $request->all());

        return response()->json(['success'=>'Module updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = new Module;
        $module->deleteData($id);

        return response()->json(['success'=>'Test deleted successfully']);
    }
}
