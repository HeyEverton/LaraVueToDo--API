<?php

use App\Http\Controllers\{AuthController, MeController, TodoController, TodoTaskController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    //LOGIN USER 
    Route::post('login', [AuthController::class, 'login']);
    //REGISTER USER
    Route::post('register', [AuthController::class, 'register']);
    //VERIFY EMAIL USER
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    //FORGOT PASSWORD EMAIL SUSER
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    //CHANCGE PASSWORD USER 
    Route::post('reset-password', [AuthController::class, 'resetPassword']);

    Route::prefix('me')->group(function () {

        Route::get('', [MeController::class, 'index']);
        Route::put('', [MeController::class, 'update']);
    });

    Route::prefix('todos')->group(function () {
        Route::get('', [TodoController::class, 'index']);
        Route::get('{todo}', [TodoController::class, 'show']);
        Route::post('{todo}/tasks', [TodoController::class, 'addTask']);
        Route::post('', [TodoController::class, 'store']);
        Route::put('{todo}', [TodoController::class, 'update']);
        Route::delete('{todo}', [TodoController::class, 'destroy']);
    });

    Route::prefix('todo-tasks')->group(function () {
        Route::put('{todoTask}', [TodoTaskController::class, 'update']);
        Route::delete('{todoTask}', [TodoTaskController::class, 'destroy']);
    });
});
