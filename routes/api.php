<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameSessionController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HintController;
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

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Games
    Route::apiResource('games', GameController::class);
    Route::get('/games/public', [GameController::class, 'publicGames']);
    Route::post('/games/{game}/join', [GameController::class, 'join']);
    Route::post('/games/{game}/verify-password', [GameController::class, 'verifyPassword']);

    // Steps
    Route::apiResource('games.steps', StepController::class)->except(['show']);
    Route::post('/steps/{step}/verify-qr', [StepController::class, 'verifyQrCode']);
    Route::get('/steps/{step}/hints', [StepController::class, 'getHints']);

    // Game Sessions
    Route::get('/sessions', [GameSessionController::class, 'index']);
    Route::get('/sessions/{session}', [GameSessionController::class, 'show']);
    Route::post('/sessions/{session}/abandon', [GameSessionController::class, 'abandon']);
    Route::get('/sessions/{session}/current-players', [GameSessionController::class, 'currentPlayers']);
    
    // Comments
    Route::apiResource('games.comments', CommentController::class);
});

// Nouvel agencement
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // Riddles
    Route::apiResource('riddles', RiddleController::class);
    
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
    Route::get('/leaderboard/riddle/{riddleId}', [LeaderboardController::class, 'showByRiddle']);
});
