<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*---------------------------------Students-----------------------------*/
Route::controller(StudentController::class)->group(function () {
    Route::get('students', 'index');            // show all records
    Route::post('students', 'store');           // insert record
    Route::get('students/{id}', 'show');        // show specific record 
    Route::delete('students/{id}', 'destroy');  // remove record
    Route::put('students/{id}', 'update');      // updated record
});
/*------------------------------------End--------------------------------*/

/*---------------------User Signup and Login------------------------*/
Route::controller(LoginController::class)->group(function () {
    Route::post('signup', 'store');     // register user
    Route::post('signin', 'login');     // signin user
    Route::get('users', 'index');       // show all users
    Route::put('users/{email}', 'update');      // update password
});
/*---------------------------End-------------------------------------*/

/*----------------------Teachers-------------------------*/
Route::controller(TeacherController::class)->group(function () {
    Route::get('teachers', 'index');            // display all teachers
    Route::get('teachers/{id}', 'display');     // display specific teacher
    Route::post('teachers', 'store');           // add teacher details
    Route::delete('teachers/{id}', 'destroy');  // delete specific teacher
    Route::put('teachers/{id}', 'update');      // update teacher details
});
/*-------------------------End---------------------------*/