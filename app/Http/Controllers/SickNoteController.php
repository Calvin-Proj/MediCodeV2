<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sick_Note;

class SickNoteController extends Controller
{
    public function getSickNotes(Request $request, Sick_Note $sick_note)
    {
        $data = $sick_note->getData();
        return \DataTables::of($data)->make(true);
    }

    public function store(Request $request, Sick_Note $sick_note)
    {
        $validator = \Validator::make($request->all(), [
            'id' => 'required',
            'sick_note' => 'required',
            'sick_note_name' => 'required',
            'test_id' => 'required',
            'user_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $sick_note->storeData($request->all());

        return response()->json(['success'=>'Sick_Note added successfully']);
    }
}
