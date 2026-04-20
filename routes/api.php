<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return redirect()->route('task.index');
})->middleware('auth:sanctum');

Route::apiResource('/tarefas',TaskController::class)->parameters([
    'tarefas' => 'task'
]);;