<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use App\Models\Center;
use App\Models\Mark;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{


    public function store(Request $request)
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

    public function update(Request $request, User $teacher)
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


    public function show(User $teacher)
    {
        return view('admin.teacher.show', compact('teacher'));
    }

    public function index(Center $center)
    {
        $teachers = User::where(['profile' => 'teacher', 'center_id' => $center->id])->get();

        return view('admin.teacher.index', compact('teachers'));
    }
}
