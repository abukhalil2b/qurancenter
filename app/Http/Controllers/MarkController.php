<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Subject;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Task $task, Subject $subject)
    {

        $studentSubjects = DB::table('student_subject')
            ->select('users.id', 'name', 'phone')
            ->join('users', 'student_subject.student_id', '=', 'users.id')
            ->where('student_subject.subject_id',$subject->id)
            ->get();

        $marks = Mark::where('task_id',$task->id)->get();

        //add marks to each student
        $students = $studentSubjects->map(function($student) use($marks) {
            $studentObj['id'] = $student->id;
            $studentObj['name'] = $student->name;
            $studentObj['phone'] = $student->phone;
            $studentObj['mark'] = null;

            foreach($marks as $mark){

                if($mark->student_id == $student->id){
                    $markObj['memorize'] = $mark->memorize;
                    $markObj['recite'] = $mark->recite;
                    $markObj['behave'] = $mark->behave;
                    $studentObj['mark'] = $markObj;
                }
            }
            return (object) $studentObj;
        });

        return view('mark.student.index', compact('students', 'task', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mark = Mark::where([
            'student_id' => $request->student_id,
            'task_id' => $request->task_id
        ])->first();

        if ($mark) {
            $mark->update([
                'memorize' => $request->memorize,
                'recite' => $request->recite,
                'behave' => $request->behave
            ]);
        } else {
            Mark::create([
                'student_id' => $request->student_id,
                'task_id' => $request->task_id,
                'memorize' => $request->memorize,
                'recite' => $request->recite,
                'behave' => $request->behave
            ]);
        }

        return redirect()->route('mark.student.index', ['task' => $request->task_id, 'subject' => $request->subject_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task, User $student, Subject $subject)
    {
        $mark = Mark::where([
            'student_id' => $student->id,
            'task_id' => $task->id
        ])->first();

        if ($mark) {
            $memorize = $mark->memorize;
            $recite = $mark->recite;
            $behave = $mark->behave;
        } else {
            $memorize = 0;
            $recite = 0;
            $behave = 0;
        }


        return view('mark.student.show', compact('student', 'task', 'subject', 'mark', 'memorize', 'recite', 'behave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mark $mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        //
    }
}
