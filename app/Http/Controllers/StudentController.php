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

class StudentController extends Controller
{



    public function show(User $student)
    {
        return view('admin.student.show', compact('student'));
    }

    public function index(Center $center)
    {
        $students = User::where(['profile' => 'student', 'center_id' => $center->id])->get();

        return view('admin.student.index', compact('students'));
    }
}
