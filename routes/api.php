<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

Route::get('/todos-all', [TodoController::class, 'index']);        // Get all todos
Route::post('/todos', [TodoController::class, 'store']);       // Create todo
Route::get('/todos/{id}', [TodoController::class, 'show']);// Get todo by ID
Route::put('/todos-update/{id}', [TodoController::class, 'update']); //Update record entirely
Route::patch('/todos-edit/{id}', [TodoController::class, 'edit']); // update partial todo by ID
Route::delete('/todos-delete/{id}', [TodoController::class, 'destroy']); // Delete todo by ID
