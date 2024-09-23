<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;


// Add task to the table
Route::post('/', [AppController::class, 'addTask'])->name('addTask');

// View index and display tasks if exist
Route::get('/', [AppController::class, 'displayTask'])->name('displayTask');

// Delete task
Route::get('/delete/{taskId}', [AppController::class, 'removeTask'])->name('remove');

// View edit file
Route::get('/edit/{taskId}', [AppController::class, 'editTask'])->name('edit');

// Add task to the table
Route::post('/edit/{taskId}', [AppController::class, 'updateTask'])->name('update');