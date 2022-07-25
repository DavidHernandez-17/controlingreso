<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\QR\QrController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Imports\EmployeeImport;
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
Route::resource('/employees', EmployeeController::class)->middleware('auth')->names([
    'index' => 'employees',
    'create' => 'employees-create',
    'edit' => 'employees-edit'
]);
Route::get('/employees/{id}/confirmdelete', [EmployeeController::class, 'confirmdelete'])->name('employee-confirmdelete')->middleware('auth');
Route::get('/employees/import/view', [EmployeeController::class, 'import_view'])->name('employee-import')->middleware('auth');
Route::post('/employees/import/excel', [EmployeeController::class, 'import_excel'])->name('import_excel')->middleware('auth');
Route::get('/employees/import/view/download', [EmployeeController::class, 'download_import_format'])->name('download_import')->middleware('auth');
Route::get('/employees/generador/qr', [QrController::class, 'index'])->name('qr_index')->middleware('auth');


//Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('auth');
Route::post('/register/done', [RegisterController::class, 'register'])->middleware('auth');


//Reports
Route::get('/reports', [ReportController::class, 'index'])->name('reports')->middleware('auth');
Route::get('/reports/all', [ReportController::class, 'indexAll'])->name('reports-all')->middleware('auth');
Route::get('/reports/export/excel', [ReportController::class, 'export'])->name('reports-export')->middleware('auth');
Route::get('/reports/export/excel/all', [ReportController::class, 'exportAll'])->name('reports-exportAll')->middleware('auth');


// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


//Users
Route::resource('/users', UserController::class)->middleware('auth')->names([
    'index' => 'users',
    'create' => 'users-create',
    'edit' => 'users-edit'
]);
Route::get('/users/{id}/confirmdelete', [UserController::class, 'confirmdelete'])->name('confirmdelete')->middleware('auth');
Route::get('/users/{id}/edit/password', [UserController::class, 'edit_password'])->name('edit_password');
Route::put('/users/{id}/edit/password_confirm', [UserController::class, 'edit_password_confirm'])->name('edit_password_confirm');

//Login
Route::get('/auth/login', [LoginController::class, 'index'])->name('showlogin');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [LoginController::class, 'forgot'])->name('forgot-password');
Route::post('/forgot-confirm', [LoginController::class, 'forgot_confirm'])->name('forgot-confirm');



