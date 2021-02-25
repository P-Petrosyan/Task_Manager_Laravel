<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\admin\TasksController as Admin;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index']);
Route::get('/search/', [App\Http\Controllers\TasksController::class, 'search'])->name('search');
Route::post('/tasks/change/{id}', [App\Http\Controllers\TasksController::class, 'change']);
Route::post('/tasks/change', [App\Http\Controllers\TasksController::class, 'ajax']);
Route::get('/tasks/more/{id}', [App\Http\Controllers\TasksController::class, 'more']);

Route::prefix("admin/tasks")->middleware(["admin"])->group(function(){

	Route::get('', [Admin::class, 'index'])->name('tasks');
	Route::get('/my', [Admin::class, 'get']);

	Route::get('/create', [Admin::class, 'create']);
	Route::post('/create', [Admin::class, 'store']);

	Route::get('/edit/{id}', [Admin::class, 'edit']);
	Route::post('/edit/{id}', [Admin::class, 'update']);

	Route::get('/delete/{id}', [Admin::class, 'delete']);
});
