<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\PermissionController;
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

/*---- admin teacher -----*/
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


/*---- admin student -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('admin/student/index/{center}',[StudentController::class,'index'])
    ->name('admin.student.index');

    Route::get('admin/student/show/{student}',[StudentController::class,'show'])
    ->name('admin.student.show');
});

/*---- admin task -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('admin/task/index/{center}',[AdminTaskController::class,'index'])
    ->name('admin.task.index');

});


/*---- student -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('student/index',[UserController::class,'indexStudent'])
    ->middleware('permission:student.index')
    ->name('student.index');

    Route::get('student/absence_count',[UserController::class,'absenceCountStudent'])
    ->middleware('permission:student.absence_count')
    ->name('student.absence_count');

    Route::get('student/present_count',[UserController::class,'presentCountStudent'])
    ->middleware('permission:student.present_count')
    ->name('student.present_count');

    Route::get('student/show/{student}',[UserController::class,'showStudent'])
    ->name('student.show');

    Route::post('student/update/{student}',[UserController::class,'updateStudent'])
    ->name('student.update');


});



/*---- subject -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('subject/index',[SubjectController::class,'index'])
    ->name('subject.index');

    Route::post('subject/store',[SubjectController::class,'store'])
    ->name('subject.store');

    Route::post('subject/update/{subject}',[SubjectController::class,'update'])
    ->name('subject.update');

    Route::get('subject/tasks/{subject}',[SubjectController::class,'subjectTasks'])
    ->name('subject.tasks');

    Route::post('subject/remove_student/{subject}',[SubjectController::class,'removeStudent'])
    ->name('subject.remove_student');

    Route::get('subject/marks/{subject}',[SubjectController::class,'subjectMarks'])
    ->name('subject.marks');
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

    Route::get('mark/index',[MarkController::class,'index'])
    ->name('mark.index');

    Route::get('mark/student/index/{task}/{subject}',[MarkController::class,'studentIndex'])
    ->name('mark.student.index');

    Route::get('mark/student/show/{task}/{student}/{subject}',[MarkController::class,'show'])
    ->name('mark.student.show');

    Route::post('mark/student/store',[MarkController::class,'store'])
    ->name('mark.student.store');
});

/*---- permission -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('admin/permission/index',[PermissionController::class,'index'])
    ->name('admin.permission.index');

    Route::post('admin/permission/store',[PermissionController::class,'store'])
    ->name('admin.permission.store');

    Route::get('admin/permission/user/index/{user}',[PermissionController::class,'permissionUserIndex'])
    ->name('admin.permission.user.index');

    Route::post('admin/permission/user/update/{user}',[PermissionController::class,'permissionUserUpdate'])
    ->name('admin.permission.user.update');
    
});
require __DIR__.'/auth.php';
