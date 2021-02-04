<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function getAttendance(Request $request, Attendance $attendance)
    {
        $data = $attendance->getData();
        return \DataTables::of($data)->make(true);
    }
}
