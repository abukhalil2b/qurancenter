<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Center;
use App\Models\User;

class TaskController extends Controller
{
    public function index(Center $center)
    {
        // $teachers =  User::where('profile', 'teacher')
        //     ->where('center_id', $center->id)
        //     ->with(['subjects' => fn ($sub) => $sub->with('tasks')])
        //     ->get();

        // return $teachers;

        // return view('admin.task.index', compact('tasks', 'center'));
    }
}
