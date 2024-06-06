<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManagerController;

Route::get('/', [TaskManagerController::class, 'index']);
Route::post('/store-category', [TaskManagerController::class, 'storeCategory'])->name('store.category');
Route::post('/store-task', [TaskManagerController::class, 'storeTask'])->name('store.task');
Route::put('/tasks/{task}', [TaskManagerController::class, 'updateTask'])->name('update.task');
Route::post('/categories/update/{id}', [TaskManagerController::class, 'updateCategories'])->name('categories.update');
Route::delete('/categories/{id}', [TaskManagerController::class, 'destroyCategory'])->name('categories.destroy');
Route::delete('/tasks/{task}', [TaskManagerController::class, 'destroyTask'])->name('tasks.destroy');


