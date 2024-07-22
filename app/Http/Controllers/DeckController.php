<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deck;

class DeckController extends Controller
{
    public function index()
    {
        $decks = Deck::where('is_public', true)->get();
        return response()->json($decks);
    }

    public function show($id)
    {
        $deck = Deck::where('id', $id)->where('is_public', true)->first();

        if (!$deck) {
            return response()->json(['message' => 'Deck not found or not public'], 404);
        }

        return response()->json($deck);
    }
}
