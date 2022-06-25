<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LoginController::class, 'index']);

//Employees
Route::resource('/employees', EmployeeController::class)->middleware('auth');
Route::get('/employees/{id}/confirmdelete', [EmployeeController::class, 'confirmdelete'])->name('confirmdelete')->middleware('auth');
Route::get('/employees/import/view', [EmployeeController::class, 'import_view'])->middleware('auth');
Route::post('/employees/import/excel', [EmployeeController::class, 'import_excel'])->name('import_excel')->middleware('auth');


//Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('auth');
Route::post('/register/done', [RegisterController::class, 'register'])->middleware('auth');


//Reports
Route::get('/reports', [ReportController::class, 'index'])->middleware('auth');
Route::get('/reports/export/excel', [ReportController::class, 'export'])->name('export')->middleware('auth');


// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


//Users
Route::resource('/users', UserController::class)->middleware('auth');
Route::get('/users/{id}/confirmdelete', [UserController::class, 'confirmdelete'])->name('confirmdelete')->middleware('auth');


//Login
Route::get('/auth/login', [LoginController::class, 'index'])->name('showlogin');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
