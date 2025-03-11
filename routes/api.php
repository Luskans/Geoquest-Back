<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameSessionController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RiddleController;
use App\Http\Controllers\SessionStepController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Nouvel agencement
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // Home
    Route::get('/', [HomeController::class, 'index']);

    // Riddles
    Route::apiResource('riddles', RiddleController::class);
    Route::get('/riddles/created/list', [RiddleController::class, 'getCreatedRiddles']);
    Route::get('/riddles/created/list/{riddleId}', [RiddleController::class, 'getCreatedRiddle']);
    
    // Etapes imbriquées dans les riddles
    Route::apiResource('riddles.steps', StepController::class);
    
    // Hints imbriqués dans les étapes
    Route::apiResource('steps.hints', HintController::class);
    
    // Reviews sur les riddles
    Route::apiResource('riddles.reviews', ReviewController::class);
    
    // Sessions de jeu
    Route::apiResource('game-sessions', GameSessionController::class);
    
    // Etapes de session (peut-être imbriquées sous game-sessions)
    Route::apiResource('game-sessions.session-steps', SessionStepController::class);
    
    // Classement
    Route::get('/leaderboard', [LeaderboardController::class, 'index']);
    Route::get('/leaderboard/search', [LeaderboardController::class, 'search']);
    Route::get('/leaderboard/riddle/{riddleId}', [LeaderboardController::class, 'showByRiddle']);
});
