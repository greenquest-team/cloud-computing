<?php

use App\Http\Controllers\Api\WasteTypeController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\QuestController;
use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\Api\UserQuestController;
use App\Http\Controllers\Api\UserQuizAnswerController as ApiUserQuizAnswerController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserQuizAnswerController;
use App\Models\UserQuest;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route auth
Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

// Route waste-types
Route::get('/waste-types', [WasteTypeController::class, 'index']);
Route::get('/waste-types/{id}', [WasteTypeController::class, 'show']);

// Route Material
Route::get('/materials', [MaterialController::class, 'index']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);

// ROute Quiz
Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizzes/{id}', [QuizController::class, 'getQuiz']);
Route::post('/quizzes/submit', [QuizController::class, 'checkAnswer']);

// Route quest
Route::get('/quests', [QuestController::class,'index']);
// Route::get('/quests', [QuestController::class,'getQuestsByType']);
Route::post('/quests', [QuestController::class, 'store']);

Route::prefix('user-progress')->group(function () {
    Route::get('/{userId}', [UserQuestController::class, 'index']);
    Route::post('/start', [UserQuestController::class, 'startQuest']);
    Route::post('/complete', [UserQuestController::class, 'completeQuest']);
    Route::get('/{userId}/{status}', [UserQuestController::class, 'getProgressByStatus']);
});

Route::get('/leaderboard', [UserQuestController::class, 'getLeaderboard']);

// userquizanswer
Route::get('/user-quiz-answers', [UserQuizAnswerController::class, 'index']);
Route::post('/user-quiz-answers', [UserQuizAnswerController::class, 'store']);

Route::get('/quests/random', [QuestController::class, 'getRandomQuests']);



Route::get('/hello', function () {
    return 'Hello, Laravel';
});
});