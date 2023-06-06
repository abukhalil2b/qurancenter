<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Record $record)
    {
        $attendances =  Attendance::where('record_id', $record->id)
            ->join('users', 'attendances.student_id', '=', 'users.id')
            ->get();

        return view('attendance.index', compact('attendances', 'record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {

        if ($studentIds = $request->studentIds) {
            Attendance::where('record_id', $record->id)
                ->update(['attend_at' => NULL]);

            Attendance::whereIn('student_id', $studentIds)->update(['attend_at' => date('Y-m-d')]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
