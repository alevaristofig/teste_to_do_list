<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListaController;
use App\Http\Controllers\Api\TarefaController;
use App\Http\Controllers\Api\ListaTarefaController;
use App\Http\Controllers\Api\Auth\LoginJwtController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/todo')->group(function() {

    Route::post('/login',[LoginJwtController::class,'login'])->name('login');
    Route::get('/logout',[LoginJwtController::class,'logout'])->name('logout');

    Route::group([
        'as' => 'tarefas',
        'middleware'=> \Tymon\JWTAuth\Http\Middleware\Authenticate::class
        ], function() {       
        Route::resource('tarefas',TarefaController::class);
    });
});
