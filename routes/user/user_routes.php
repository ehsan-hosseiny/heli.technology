<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\user\UserController;

Route::middleware('auth:sanctum')->prefix('/v1')->group(function () {

    Route::prefix('/task')->group(function (){
        Route::post('/', [UserController::class, 'createTask'])->name('user.add.task');
        Route::patch('/{id}', [UserController::class, 'editTask'])->name('user.edit.task');
    });
});
