<?php

use App\Http\Controllers\Api\WasteTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/waste-types', [WasteTypeController::class, 'index']);

Route::get('/waste-types/{id}', [WasteTypeController::class, 'show']);
