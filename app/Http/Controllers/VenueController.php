<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenueController extends Controller
{
    public function index()
    {
        return view('usertypes.admin.managevenue');
    }

    public function getVenues(Request $request, Venue $venue)
    {
        $data = $venue->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button class="btn btn-success btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getEditVenueData" data-id="'.$data->id.'">Edit</button>
                    <button data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteVenueModal" class="btn btn-danger btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }


    public function store(Request $request, Venue $venue)
    {
        $validator = \Validator::make($request->all(), [
            'no_of_seats' => 'required',
            'venue_name' => 'required',
            'building_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $venue->storeData($request->all());

        return response()->json(['success'=>'Venue added successfully']);
    }

    public function edit($id)
    {
        $venue = new Venue;
        $data = $venue->findData($id);

        $html = '<div class="flex text-white p-2">
                    <label for="no_of_seats">Number of Seats:</label>
                    <span class="w-14"></span>
                    <input type="text" name="no_of_seats1" id="no_of_seats1" value="'.$data->no_of_seats.'" class="text-gray-600 w-38">
                </div>
                <div class="flex text-white p-2">
                    <label for="venue_name">Venue Name:</label>
                    <span class="w-11"></span>
                    <span class="w-10"></span>
                    <input type="text" name="venue_name1" id="venue_name1" value="'.$data->venue_name.'" class="text-gray-600 w-38">
                </div>
                <div class="form-group flex justify-start p-2 text-white">
                    <label for="building_id">Building Name:</label>
                    <span class="w-9"></span>
                    <span class="w-9"></span>
                    <select name="building_id1" id="building_id1" value="'.$data->building_id.'" class="text-gray-600 w-32">
                        <option value="1">Heinz Betz</option>
                        <option value="2">Engineering</option>
                        <option value="3">ICT</option>
                    </select>
                </div>';


        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'no_of_seats' => 'required',
            'venue_name' => 'required',
            'building_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $venue = new Venue;
        $venue->updateData($id, $request->all());

        return response()->json(['success'=>'Venue updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = new Venue;
        $venue->deleteData($id);

        return response()->json(['success'=>'Venue deleted successfully']);
    }
}
