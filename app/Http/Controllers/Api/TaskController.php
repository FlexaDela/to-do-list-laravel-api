<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskEditRequest;
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
        $task = Task::create($request->validated());

       return response()
       ->json([
        'success' => true,
        'data' => new TaskResource($task),
        'message' => 'Tarefa criada com sucesso'
       ], 201);
    }


    public function show(Task $task): JsonResponse
    {   

        if(!$task->exists) {
            return response()->json([
            "erro" =>'Laravel não encontrou o id no banco',
            ], 404);
        }
        return response()
            ->json([
            'success' => true,
            'data' => new TaskResource($task),
            'message' => 'Tarefa entregue com sucesso'
        ]);
    }

 
    public function update(TaskEditRequest $request, Task $task)
    {   
        $task->update($request->validated());
        return response()->json([
            'success' => true,
            'data' => new TaskResource($task),
            'message' => 'Tarefa atualizada'
        ],201);
    }

    
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tarefa deletada'
        ],201);
    }
}
