<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgressController;

// Удалите дублирующийся маршрут
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'show']);

Route::middleware('auth:sanctum')->post('/flashcards/{flashcardId}/progress/weight', [ProgressController::class, 'updateWeight']);


Route::get('/register', function() {
    return response()->json(['message' => 'The GET method is not supported for this route. Supported methods: POST.'], 405);
});
Route::get('/login', function() {
    return response()->json(['message' => 'The GET method is not supported for this route. Supported methods: POST.'], 405);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Добавление маршрутов для получения публичных колод
Route::get('/decks', [DeckController::class, 'index']);
Route::get('/decks/{id}', [DeckController::class, 'show']);

//Route::get('decks/{deckId}/flashcards', [FlashcardController::class, 'getFlashcardsByDeck']);
Route::middleware('auth:sanctum')->get('decks/{deckId}/flashcards', [FlashcardController::class, 'getFlashcardsByDeck']);




