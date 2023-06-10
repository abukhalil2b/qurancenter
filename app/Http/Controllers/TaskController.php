<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Subject;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Record $record,Subject $subject)
    {
        $tasks =  Task::where('record_id', $record->id)
        ->get();

        return view('task.index', compact('tasks', 'record','subject'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Record $record)
    {
        Task::create([
            'title' =>$request->title,
            'record_id' =>$record->id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $task->update(['title'=>$request->title]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
