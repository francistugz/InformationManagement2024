<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ClientsController;

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
    return view('welcome');
});


Route::resource('projects', ProjectController::class);
Route::resource('clients', ClientsController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('invoices', InvoicesController::class);
Route::resource('payments', PaymentsController::class);




// Route::resource('projects', 'ProjectController');

