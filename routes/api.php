<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListaController;
use App\Http\Controllers\Api\TarefaController;
use App\Http\Controllers\Api\ListaTarefaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/todo')->group(function() {

    Route::group([
        'as' => 'listas'
        //'middleware'=> \Tymon\JWTAuth\Http\Middleware\Authenticate::class
        ], function() {       
        Route::resource('listas',ListaController::class);
    });

    Route::group([
        'as' => 'tarefas'
        //'middleware'=> \Tymon\JWTAuth\Http\Middleware\Authenticate::class
        ], function() {       
        Route::resource('tarefas',TarefaController::class);
    });

     Route::group([
        'as' => 'listatarefas'
        //'middleware'=> \Tymon\JWTAuth\Http\Middleware\Authenticate::class
        ], function() {       
        Route::resource('listatarefas',ListaTarefaController::class);
    });
});
