<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListaTarefaController;
use App\Http\Controllers\Api\TarefaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/todo')->group(function() {

    Route::group([
        'as' => 'listatarefas'
        //'middleware'=> \Tymon\JWTAuth\Http\Middleware\Authenticate::class
    ], function() {       
        Route::resource('listatarefa',ListaTarefaController::class);
    });

    Route::group([
        'as' => 'tarefas'
        //'middleware'=> \Tymon\JWTAuth\Http\Middleware\Authenticate::class
    ], function() {       
        Route::resource('tarefas',TarefaController::class);
    });
});
