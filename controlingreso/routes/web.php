<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Models\Report;
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
Route::get('/employees/import/view', [EmployeeController::class, 'import_view']);
Route::post('/employees/import/excel', [EmployeeController::class, 'import_excel'])->name('import_excel');



//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/done', [RegisterController::class, 'register']);


//Reports
Route::get('/reports', [ReportController::class, 'index']);
Route::get('/reports/export/excel', [ReportController::class, 'export'])->name('export');


//Auth
Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
