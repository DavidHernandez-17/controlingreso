<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [ RegisterController::class, 'index']);

//Employees
Route::resource('/employees', EmployeeController::class);
Route::get('/employees/{id}/confirmdelete', [EmployeeController::class, 'confirmdelete'])->name('confirmdelete');


//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/done', [RegisterController::class, 'register']);

//Reports
Route::get('/reports', [ReportController::class, 'index']);