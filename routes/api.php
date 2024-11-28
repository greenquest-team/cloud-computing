<?php

use App\Http\Controllers\Api\WasteTypeController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\API\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/waste-types', [WasteTypeController::class, 'index']);

Route::get('/waste-types/{id}', [WasteTypeController::class, 'show']);

// Route Material
Route::get('/materials', [MaterialController::class, 'index']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);

// ROute Quiz
Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizzes/{id}', [QuizController::class, 'getQuiz']);
Route::post('/quizzes/submit', [QuizController::class, 'checkAnswer']);