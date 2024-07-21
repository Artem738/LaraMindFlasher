<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    public function getFlashcardsByDeck($deckId)
    {
        $deck = Deck::with('flashcards')->where('id', $deckId)->where('is_public', true)->first();

        if (!$deck) {
            return response()->json(['message' => 'Deck not found or not public'], 404);
        }

        return response()->json($deck->flashcards);
    }
}
