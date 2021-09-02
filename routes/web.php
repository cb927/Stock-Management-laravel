<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', function () {
    return redirect('/redirect');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/redirect', [HomeController::class, 'index']);
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/customer/home', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/vehicle/search', [CustomerController::class, 'search_vehicle'])->name('vehicle.search');
Route::get('/request/send/{id}', [CustomerController::class, 'send_request'])->name('send.request');
Route::get('/request/view', [CustomerController::class, 'view_request'])->name('view.request');
Route::get('/cost_calc', [CustomerController::class, 'cost_calc'])->name('cost.calc');

Route::get('/officer/home', [OfficerController::class, 'index'])->name('officer.index');
Route::get('/vehicle/add', [OfficerController::class, 'add_vehicle'])->name('vehicle.add');
Route::get('/vehicle/edit/{id}', [OfficerController::class, 'edit_vehicle'])->name('vehicle.edit');
Route::get('/vehicle/delete/{id}', [OfficerController::class, 'delete_vehicle'])->name('vehicle.delete');
Route::post('/vehicle/store', [OfficerController::class, 'store_vehicle'])->name('vehicle.store');
Route::post('/vehicle/update/{id}', [OfficerController::class, 'update_vehicle'])->name('vehicle.update');

Route::get('drivers', [OfficerController::class, 'drivers'])->name('drivers');
Route::get('drivers/add', [OfficerController::class, 'add_driver'])->name('driver.add');
Route::get('drivers/edit/{id}', [OfficerController::class, 'edit_driver'])->name('driver.edit');
Route::post('drivers/store', [OfficerController::class, 'store_driver'])->name('driver.store');
Route::post('drivers/update/{id}', [OfficerController::class, 'update_driver'])->name('driver.update');
Route::get('drivers/delete/{id}', [OfficerController::class, 'delete_driver'])->name('driver.delete');

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.login.post');
Route::post('/admin/register', [AdminController::class, 'registerPost'])->name('admin.register.post');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin-only');
Route::get('/request/pending', [AdminController::class, 'pending_request'])->name('pending.request')->middleware('admin-only');
Route::get('/request/approve/{id}', [AdminController::class, 'approve_request'])->name('approve.request')->middleware('admin-only');
Route::get('/request/delete/{id}', [AdminController::class, 'delete_request'])->name('delete.request')->middleware('admin-only');
