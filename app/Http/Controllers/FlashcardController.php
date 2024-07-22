<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlashcardController extends Controller
{
    public function getFlashcardsByDeck(Request $request, $deckId)
    {
        // Получаем текущего пользователя
        $user = $request->user();
    
        // Проверка наличия колоды
        $deck = Deck::where('id', $deckId)->first();
    
        if (!$deck) {
            return response()->json(['message' => 'Deck not found'], 404);
        }
    
        // Проверка доступа: если колода публичная или принадлежит текущему пользователю
        if ($deck->is_public || $deck->user_id === $user->id) {
            // Получение карточек с учетом веса пользователя и последней даты рассмотрения
            $flashcards = DB::table('flashcards')
                ->leftJoin('progress', function ($join) use ($user) {
                    $join->on('flashcards.id', '=', 'progress.flashcard_id')
                         ->where('progress.user_id', '=', $user->id);
                })
                ->where('flashcards.deck_id', $deckId)
                ->select('flashcards.*', 'progress.weight', 'progress.last_reviewed_at')
                ->get();
    
            return response()->json($flashcards);
        }
    
        // Если колода не публичная и не принадлежит пользователю, доступ запрещен
        return response()->json([
            'message' => 'Access denied',
            // 'is_public' => $deck->is_public,
            // 'deck_user_id' => $deck->user_id,
            // 'current_user_id' => $user->id,
        ], 403);
    }
    
}
