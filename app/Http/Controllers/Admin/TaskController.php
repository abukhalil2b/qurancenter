<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Center;
use App\Models\Subject;
use App\Models\User;

class TaskController extends Controller
{
    public function index(Center $center)
    {
        $teacherIds = User::where(['profile' => 'teacher','center_id' =>  $center->id])->pluck('id');

        $subjectsWithTasks = Subject::whereIn('teacher_id',$teacherIds)
        ->with('tasks')
        ->get();

        return view('admin.task.index', compact('subjectsWithTasks', 'center'));
    }
}
