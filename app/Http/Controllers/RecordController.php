<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Record;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{

    public function index(Subject $subject)
    {
        $records = Record::where('subject_id', $subject->id)
            ->latest('id')
            ->get();

        return view('record.index', compact('records', 'subject'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $subject_id = $request->subject_id;

        $record = Record::where('subject_id', $subject_id)->first();

        if ($record) {

            if ($record->title != date('d-m-Y')) {

                $record = Record::create([
                    'title' => date('d-m-Y'),
                    'subject_id' => $subject_id
                ]);

                $this->addStudentToAttendace($subject_id, $record);
            }
        } else {

            $record = Record::create([
                'title' => date('d-m-Y'),
                'subject_id' => $subject_id
            ]);

            $this->addStudentToAttendace($subject_id, $record);
        }

        return back();
    }


    private function addStudentToAttendace($subjectId, $record)
    {

        $studentSubjects = DB::table('student_subject')
            ->where('subject_id', $subjectId)->get();
        foreach ($studentSubjects as $studentSubject) {

            Attendance::create([
                'student_id' => $studentSubject->student_id,
                'record_id' => $record->id
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
    }
}
