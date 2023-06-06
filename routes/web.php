<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentSubjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Http\Livewire\Mark\Student\UpdateMark as StudentUpdateMark;
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

/*---- subject -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::post('subject/store',[SubjectController::class,'store'])
    ->name('subject.store');

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
});

/*---- marks -----*/
Route::group(['middleware'=>'auth'],function(){

    Route::get('mark/student/index/{task}/{subject}',[MarkController::class,'index'])
    ->name('mark.student.index');

    Route::get('mark/student/show/{task}/{student}/{subject}',[MarkController::class,'show'])
    ->name('mark.student.show');

    Route::post('mark/student/store',[MarkController::class,'store'])
    ->name('mark.student.store');

    Route::get('mark/student/index/{task}',StudentUpdateMark::class)
    ->name('mark.student.update');

});
require __DIR__.'/auth.php';
