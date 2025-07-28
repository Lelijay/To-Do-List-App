<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/register', [AuthManager::class, 'register'])->name('reg-user');
Route::Post('/register', [AuthManager::class, 'registerPost'])->name('reg.post');

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskManager::class, 'listTask'])->name('home');

    Route::get('/taskadd', [TaskManager::class, 'addTask'])->name('add.task');
    Route::post('/taskadd', [TaskManager::class, 'addTaskPost'])->name('add.task.post');

    Route::get('/taskedit/{id}', [TaskManager::class, 'editTask'])->name('edit.task');
    Route::put('/update-task/{id}', [TaskManager::class, 'update'])->name('update');

    Route::get('/taskstatus/{id}', [TaskManager::class, 'updateTaskStatus'])->name('update.task.status');


    Route::get('/taskdelete/{id}', [TaskManager::class, 'deleteTask'])->name('delete.task');
});
