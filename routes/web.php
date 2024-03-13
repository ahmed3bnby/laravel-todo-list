<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/', [TodoController::class, 'store'])->name('todos.store');
Route::patch('/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
