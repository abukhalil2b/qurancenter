<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Mark;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('teacher.show',compact('teacher'));
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
        $absentCount = Attendance::where('student_id',$student->id)
        ->whereNull('attend_at')->count();

        $reciteCount = Mark::where('student_id',$student->id)->sum('recite');
        $memorizeCount = Mark::where('student_id',$student->id)->sum('memorize');
        $behaveCount = Mark::where('student_id',$student->id)->sum('behave');

        return view('student.show',compact('student','absentCount','reciteCount','memorizeCount','behaveCount'));
    }

}
