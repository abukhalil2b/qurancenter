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
        ->select('users.id','name','phone')
        ->join('users','student_subject.student_id','=','users.id')
        ->where('subject_id', $subject->id)->get();

        return view('student_subject.student.index', compact('students', 'subject'));
    }

    public function studentStore(Request $request, Subject $subject)
    {

        $request->validate([
            'phone' => 'required',
            'name' => 'required'
        ]);

        $student = User::create([
            'profile' => 'student',
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->phone)
        ]);

        DB::table('student_subject')->insert([
            'student_id' => $student->id,
            'subject_id' => $subject->id
        ]);

        return back();
    }
}