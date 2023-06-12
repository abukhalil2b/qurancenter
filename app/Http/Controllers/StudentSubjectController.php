<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSubjectController extends Controller
{


    public function studentIndex(Subject $subject)
    {
        $students = DB::table('student_subject')
            ->select('users.id', 'name', 'phone','idcard')
            ->join('users', 'student_subject.student_id', '=', 'users.id')
            ->where('subject_id', $subject->id)->get();

        return view('student_subject.student.index', compact('students', 'subject'));
    }

    public function studentStore(Request $request, Subject $subject)
    {

        $loggedUser = auth()->user();

        $request->validate([
            'idcard' => 'required|unique:users',
            'phone' => 'required',
            'name' => 'required'
        ]);

        $student = User::create([
            'profile' => 'student',
            'center_id' => $loggedUser->center_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'idcard' => $request->idcard,
            'password' => Hash::make($request->phone)
        ]);

        DB::table('student_subject')->insert([
            'student_id' => $student->id,
            'subject_id' => $subject->id
        ]);

        return back();
    }

    public function searchByIdcard(Request $request, Subject $subject)
    {
        $student = null;

        if ($request) {

            $student = User::where('idcard', $request->idcard)
                ->where('id', '<>', 1)
                ->where('profile', 'student')
                ->first();
        }

        return view('student_subject.student.search_by_idcard', compact('subject', 'student'));
    }

    public function addStudentToSubject(Request $request)
    {

        $exist = DB::table('student_subject')->where([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id
        ])->first();

        if (!$exist) {

            DB::table('student_subject')->insert([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id
            ]);
        }

        return redirect()->route('student_subject.student.index',$request->subject_id);
    }
}
