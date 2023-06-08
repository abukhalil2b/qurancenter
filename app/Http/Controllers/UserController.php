<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Mark;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function storeTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'idcard' => 'required'
        ]);

        User::create([
            'profile' => 'teacher',
            'name' => $request->name,
            'phone' => $request->phone,
            'idcard' => $request->idcard,
            'password' => Hash::make($request->idcard),
        ]);

        return back();
    }

    public function updateTeacher(Request $request, User $teacher)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $teacher->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return back();
    }

    public function showTeacher(User $teacher)
    {
        return view('teacher.show', compact('teacher'));
    }

    public function updateStudent(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return back();
    }

    public function showStudent(User $student)
    {
        //student subjects
        $subjects = DB::table('student_subject')
            ->select('subjects.id', 'subjects.title')
            ->join('subjects', 'student_subject.subject_id', '=', 'subjects.id')
            ->where('student_id', $student->id)
            ->get();

        //TODO need to be inhanced to reduce database query
        $subjectWithAbsentCount = $subjects->map(function ($subject) use ($student) {
            //get records in each his subjects
            $recordIds = Record::where('subject_id', $subject->id)->pluck('id');
            
            $subjectObj['id'] = $subject->id;
            $subjectObj['title'] = $subject->title;
            $subjectObj['absentCount'] = Attendance::where('student_id', $student->id)
                ->whereIn('record_id', $recordIds)
                ->whereNull('attend_at')->count();

                return (object) $subjectObj;
        });

        // return $studentSubjectWithAbsentCount;

        $reciteCount = Mark::where('student_id', $student->id)->sum('recite');
        $memorizeCount = Mark::where('student_id', $student->id)->sum('memorize');
        $behaveCount = Mark::where('student_id', $student->id)->sum('behave');

        return view('student.show', compact('student', 'subjectWithAbsentCount', 'reciteCount', 'memorizeCount', 'behaveCount'));
    }
}
