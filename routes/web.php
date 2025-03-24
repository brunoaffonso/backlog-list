<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

Route::resource('tasks', TaskController::class);
Route::resource('categories', CategoryController::class);

Route::redirect('/', '/tasks');
