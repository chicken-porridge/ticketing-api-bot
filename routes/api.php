<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//myRoutes
Route::get('students', 'App\Http\Controllers\ApiController@getAllStudents');
Route::get('students/{id}', 'App\Http\Controllers\ApiController@getStudent');
Route::post('students', 'App\Http\Controllers\ApiController@createStudent');
Route::put('students/{id}', 'App\Http\Controllers\ApiController@updateStudent');
Route::delete('students/{id}', 'App\Http\Controllers\ApiController@deleteStudent');

Route::resource('managers', App\Http\Controllers\APIController\ManagerController::class);
Route::resource('programmers', App\Http\Controllers\APIController\ProgrammerController::class);
Route::resource('reportinstallations', App\Http\Controllers\APIController\ReportInstallationController::class);
Route::resource('repoertphotos', App\Http\Controllers\APIController\ReportPhotoController::class);
