<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*------index------*/
Route::get('students', [StudentController::class, 'index']);

/*------store------*/
Route::post('students', [StudentController::class, 'store']);

/*------show-------*/
Route::get('students/{id}', [StudentController::class, 'show']);

/*------delete-------*/
Route::delete('students/{id}', [StudentController::class, 'destroy']);

/*------update-------*/
Route::put('students/{id}', [StudentController::class, 'update']);