<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::all();
        return response()->json([
            'success' => true,
            'data' => TaskResource::collection($tasks),
            'message' => 'Tarefas entregas com sucesso'
        ]);
    }

    public function store(TaskCreateRequest $request): JsonResponse
    {
       return response()
       ->json(Task::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
