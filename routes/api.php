<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;

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

/*---------------------Sign up and Login------------------------*/
Route::controller(LoginController::class)->group(function () {
    Route::post('signup', 'store');     // register user
    Route::post('signin', 'login');     // signin user
    Route::get('users', 'index');       // show all users
    Route::put('users/{id}', 'update');      // update password
});