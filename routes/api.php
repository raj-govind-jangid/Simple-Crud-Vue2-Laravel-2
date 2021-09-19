<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/student',[StudentController::class,'student']);

Route::post('/addstudent',[StudentController::class,'add']);

Route::get('/editstudent/{id}',[StudentController::class,'edit']);

Route::put('/updatestudent/{id}',[StudentController::class,'update']);

Route::delete('/deletestudent/{id}',[StudentController::class,'delete']);
