<?php

use App\Http\Controllers\Api\WasteTypeController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\QuestController;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\UserQuestController;
use App\Http\Controllers\Api\UserQuizAnswerController as ApiUserQuizAnswerController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserQuizAnswerController;
use App\Models\UserQuest;
use App\Http\Middleware\EnsureUserIsAuthenticated;




// Route auth
Route::post('/register', RegisterController::class,);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

Route::middleware([EnsureUserIsAuthenticated::class])->group(function () {

Route::post('/users/{id}', [RegisterController::class, 'update']);

// Route waste-types
Route::get('/waste-types', [WasteTypeController::class, 'index']);
Route::get('/waste-types/{id}', [WasteTypeController::class, 'show']);

// Route Material
Route::get('/materials', [MaterialController::class, 'index']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);

// Route Quiz
Route::get('/quizzes', [QuizController::class, 'index']);
Route::post('/quizzes/submit', [QuizController::class, 'checkAnswer']);

// Route quest
Route::get('/quests', [QuestController::class,'index']);


Route::get('/leaderboard', [UserQuestController::class, 'getLeaderboard']);

Route::get('/hello', function () {
    return 'Hello, Laravel';
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});