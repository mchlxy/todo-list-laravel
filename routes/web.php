<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::get('/', [TodoListController::class, 'index'])->name('home');
Route::post('/save-task', [TodoListController::class, 'addTask'])->name('addTask');
Route::get('/dalete-task/{id}', [TodoListController::class, 'deleteTask'])->name('deleteTask');
Route::get('/update-task/{id}', [TodoListController::class, 'updateTask'])->name('updateTask');
Route::post('/save-updated-task', [TodoListController::class, 'saveUpdatedTask'])->name('saveTask');
Route::get('/done-task/{id}', [TodoListController::class, 'doneTask'])->name('doneTask');
Route::get('/undo-task/{id}', [TodoListController::class, 'undoTask'])->name('undoTask');