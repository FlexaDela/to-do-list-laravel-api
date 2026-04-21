<?php

use App\Http\Controllers\Api\TaskController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('/tarefas',TaskController::class)->parameters([
        'tarefas' => 'task'
    ]);
});

Route::post('/login',function(Request $request) {
    $credentials = $request->only(['email','password']);
    if(Auth::attempt($credentials) == false) {
        return response()->json('Unauthorized', 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);
});


Route::post('/cadastro', function (Request $request){
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);
    return response()->json(['message' => 'USuario criado'],201);
});


