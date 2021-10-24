<?php

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

Route::view('home', 'home')->name('home')->middleware('auth');
Route::resources([
    'companies' => App\Http\Controllers\CompanyController::class,
    'users' => App\Http\Controllers\UserController::class,
]);
