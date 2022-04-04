<?php

use App\Http\Controllers\Api\AjaxController;
use App\Http\Controllers\Api\AttendanceController;
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

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/getDesignation/{department}/{designation?}', [AjaxController::class, 'getDesignation']);
    //Route::post('/perform-attendances', [AttendanceController::class, 'performAttendance']);
    Route::get('/sync-users', [App\Http\Controllers\Api\SyncController::class, 'userSync']);
    Route::post('/sync-attendances', [App\Http\Controllers\Api\SyncController::class, 'attendanceSync']);
});
