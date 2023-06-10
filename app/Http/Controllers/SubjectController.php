<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $loggedUser = auth()->user();

        Subject::create([
            'title' => $request->title,
            'teacher_id' => $loggedUser->id
        ]);

        return back();
    }


    public function subjectTasks(Subject $subject)
    {
        $tasks = $subject->tasks;

        return view('subject.tasks', compact('tasks', 'subject'));
    }

 
    public function removeStudent(Request $request, Subject $subject)
    {
        DB::table('student_subject')
            ->where(['student_id' => $request->student_id, 'subject_id' => $subject->id])
            ->delete();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $subject->update(['title' => $request->title]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
