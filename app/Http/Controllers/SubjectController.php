<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{

    public function index()
    {
        $loggedUser = auth()->user();

        $teacherIds = User::where('center_id',$loggedUser->center_id)->pluck('id');
    
        $subjects = Subject::whereIn('teacher_id',$teacherIds)->get();
        
        return view('subject.index', compact('subjects'));
    }


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

    public function subjectMarks(Subject $subject)
    {
        $taskIds = $subject->tasks()->pluck('tasks.id');
        // return $taskIds;
        $studentMarks = Mark::whereIn('task_id', $taskIds)
            ->select('name', DB::raw("SUM(memorize) as memorize, SUM(recite) as recite, SUM(behave) as behave"), DB::raw("(SUM(memorize) + SUM(recite) + SUM(behave)) as totalPoints"))
            ->join('users', 'marks.student_id', '=', 'users.id')
            ->groupby('student_id')
            ->orderby('totalPoints', 'DESC')
            ->get();
        //     return $studentMarks ;
        // $studentMarks = $studentMarks->map(function ($mark) {
        //     $markObj['name'] = $mark->name;
        //     $markObj['total'] = $mark->memorize + $mark->recite + $mark->behave;

        //     return (object) $markObj;
        // });

        // return $studentMarks;

        return view('subject.marks', compact('studentMarks', 'subject'));
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
