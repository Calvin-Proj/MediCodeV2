<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class LecturerDTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getLecturers(Request $request, Test $lecturer)
    {
        $data = $lecturer->getLectData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button class="btn btn-success btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getEditLecturerData" data-id="'.$data->id.'">Edit</button>
                    <button data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteLecturerModal" class="btn btn-danger btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function edit($id)
    {
        $lecturer = new Test;
        $data = $lecturer->findData($id);

        $html = '<div class="flex text-white p-2">
                    <label for="lecturer_name">Lecturer Name:</label>
                    <span class="w-14"></span>
                    <input type="text" name="lecturer_name1" id="lecturer_name1" value="'.$data->name.'" class="text-gray-600 w-38">
                </div>
                <div class="flex text-white p-2">
                    <label for="lecturer_email">Lecturer Email:</label>
                    <span class="w-8"></span>
                    <span class="w-7"></span>
                <input type="text" name="lecturer_email1" id="lecturer_email1" value="'.$data->email.'" class="text-gray-600">
                </div>';
        return response()->json(['html'=>$html]);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $lecturer = new Test;
        $lecturer->updateData($id, $request->all());

        return response()->json(['success'=>'Lecturer updated successfully']);
    }

    public function destroy($id)
    {
        $lecturer = new Test;
        $lecturer->deleteData($id);

        return response()->json(['success'=>'Lecturer deleted successfully']);
    }
}
