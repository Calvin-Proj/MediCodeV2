<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Test;
use Illuminate\Http\Request;

class InvigDTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInvigsTest(Request $request, Test $test)
    {
        $data = $test->getInvigTestData();
        return \DataTables::of($data)->make(true);
    }


    public function getInvigs(Request $request, User $invig)
    {
        $data = $invig->getInvigData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button class="btn btn-success btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getEditInvigData" data-id="'.$data->id.'">Edit</button>
                    <button data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteInvigModal" class="btn btn-danger btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function edit($id)
    {
        $invig = new User;
        $data = $invig->findData($id);

        $html = '<div class="flex text-white p-2">
                    <label for="invig_name">Invig Name:</label>
                    <span class="w-14"></span>
                    <input type="text" name="invig_name1" id="invig_name1" value="'.$data->name.'" class="text-gray-600 w-38">
                </div>
                <div class="flex text-white p-2">
                    <label for="invig_email">Invig Email:</label>
                    <span class="w-8"></span>
                    <span class="w-7"></span>
                    <input type="text" name="invig_email1" id="invig_email1" value="'.$data->email.'" class="text-gray-600">
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

        $invig = new User;
        $invig->updateData($id, $request->all());

        return response()->json(['success'=>'Invig updated successfully']);
    }

    public function destroy($id)
    {
        $invig = new User;
        $invig->deleteData($id);

        return response()->json(['success'=>'Invig deleted successfully']);
    }
}
