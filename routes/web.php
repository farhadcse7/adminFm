<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Backend Routes */
Route::prefix('admin')->middleware(['auth'])->group(function(){

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Resource Routes
    Route::resource('/module', ModuleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/users', UserController::class);


});
