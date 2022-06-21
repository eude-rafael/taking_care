<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\UserController;

Route::post('/login', [UserController::class, 'login']);

Route::namespace('API')->name('api.')->group(function(){
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user()->id;
    });
    Route::middleware('auth:sanctum')->get('/listar_todos_os_links', [LinkController::class, 'list_all_links']);
    Route::middleware('auth:sanctum')->post('/cadastrar_link', [LinkController::class, 'store'])->name('link');
});





 