<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [UserController::class, 'loginPage'])->name('loginPage');
    Route::post('/auth/login/post', [UserController::class, 'login'])->name('login');
});

Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');

// Tasks Routes
Route::middleware('auth')->group(function () {
    Route::get('/tasks/create', [TasksController::class, 'create'])->name('createTask');
    Route::get('/tasks', [TasksController::class, 'list'])->name('listTask');
    Route::get('/tasks/{id}', [TasksController::class, 'getById'])->name('getTodoById');
    Route::post('/tasks', [TasksController::class, 'store'])->name('storeTask');
    Route::get('/tasks/{id}/update', [TasksController::class, 'updatePage'])->name('updateTaskPage');
    Route::put('/tasks/{id}/update/store', [TasksController::class, 'updateTask'])->name('updateTask');
    Route::put('/tasks/{id}/check/{currentStatus}', [TasksController::class, 'checkOrUncheck'])->name('checklist');
    Route::delete('/tasks/{id}/delete', [TasksController::class, 'delete'])->name('deleteTask');
});
