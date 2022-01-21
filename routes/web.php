<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Route::group(['middleware' => ['auth']], function() {
    Route::view('/home', 'home')->name('home');
    
    Route::resources([
        'companies' => App\Http\Controllers\CompanyController::class,
        'departments' => App\Http\Controllers\DepartmentController::class,
        'designations' => App\Http\Controllers\DesignationController::class,
        'users' => App\Http\Controllers\UserController::class,
        'leaves' => App\Http\Controllers\LeaveController::class
    ]);

    Route::get('/attendance-logs/{user}', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendances.log');
    Route::get('/attendance-reports', [App\Http\Controllers\AttendanceReportController::class, 'index'])->name('attendance-reports.index');
});

Route::get('/monitors', function() {
    return view('monitors.show', ['user' => User::role('Monitor')->where('email', request('email'))->first()]);
})->name('monitors.show');
