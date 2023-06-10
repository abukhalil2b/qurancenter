<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentSubjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|---------

|---------
*/

Route::get('/', function () {
    return view('welcome');
});

/*---- Profile -----*/
Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',[ProfileController::class,'dashboard'])
    ->name('dashboard');
});

/*---- center -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('admin/center/index',[CenterController::class,'index'])
    ->name('admin.center.index');

    Route::get('admin/center/show/{center}',[CenterController::class,'show'])
    ->name('admin.center.show');

    Route::post('admin/center/store',[CenterController::class,'store'])
    ->name('admin.center.store');

    Route::post('admin/center/update/{center}',[CenterController::class,'update'])
    ->name('admin.center.update');
});

/*---- teacher -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('admin/teacher/index/{center}',[TeacherController::class,'index'])
    ->name('admin.teacher.index');

    Route::get('admin/teacher/show/{teacher}',[TeacherController::class,'show'])
    ->name('admin.teacher.show');

    Route::post('admin/teacher/update/{teacher}',[TeacherController::class,'update'])
    ->name('admin.teacher.update');

    Route::post('admin/teacher/store',[TeacherController::class,'store'])
    ->name('admin.teacher.store');
});


/*---- student -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('student/index',[UserController::class,'indexStudent'])
    ->name('student.index');

    Route::get('student/absence_count',[UserController::class,'absenceCountStudent'])
    ->name('student.absence_count');

    Route::get('student/show/{student}',[UserController::class,'showStudent'])
    ->name('student.show');

    Route::post('student/update/{student}',[UserController::class,'updateStudent'])
    ->name('student.update');


});



/*---- subject -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::post('subject/store',[SubjectController::class,'store'])
    ->name('subject.store');

    Route::post('subject/update/{subject}',[SubjectController::class,'update'])
    ->name('subject.update');

    Route::get('subject/tasks/{subject}',[SubjectController::class,'subjectTasks'])
    ->name('subject.tasks');

    Route::post('subject/remove_student/{subject}',[SubjectController::class,'removeStudent'])
    ->name('subject.remove_student');
});

/*---- record -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('record/index/{subject}',[RecordController::class,'index'])
    ->name('record.index');

    Route::post('record/store',[RecordController::class,'store'])
    ->name('record.store');

});

/*---- student subject -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('student_subject/student/index/{subject}',[StudentSubjectController::class,'studentIndex'])
    ->name('student_subject.student.index');

    Route::post('student_subject/student/store/{subject}',[StudentSubjectController::class,'studentStore'])
    ->name('student_subject.student.store');

    Route::match(['GET','POST'],'student_subject/student/search_by_idcard/{subject}',[StudentSubjectController::class,'searchByIdcard'])
    ->name('student_subject.student.search_by_idcard');

    Route::post('student_subject/student/add_student_to_subject',[StudentSubjectController::class,'addStudentToSubject'])
    ->name('student_subject.student.add_student_to_subject');
    
    
});

/*---- attendances -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('attendance/index/{record}',[AttendanceController::class,'index'])
    ->name('attendance.index');

    Route::post('attendance/update/{record}',[AttendanceController::class,'update'])
    ->name('attendance.update');
});


/*---- tasks -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('task/index/{record}/{subject}',[TaskController::class,'index'])
    ->name('task.index');

    Route::post('task/store/{record}',[TaskController::class,'store'])
    ->name('task.store');

    Route::post('task/update/{task}',[TaskController::class,'update'])
    ->name('task.update');
});

/*---- marks -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('mark/student/index/{task}/{subject}',[MarkController::class,'index'])
    ->name('mark.student.index');

    Route::get('mark/student/show/{task}/{student}/{subject}',[MarkController::class,'show'])
    ->name('mark.student.show');

    Route::post('mark/student/store',[MarkController::class,'store'])
    ->name('mark.student.store');

});
require __DIR__.'/auth.php';
