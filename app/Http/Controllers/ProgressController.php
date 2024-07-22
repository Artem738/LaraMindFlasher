<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    /**
     * Обновить вес для конкретной карточки пользователя.
     */
    public function updateWeight(Request $request, $flashcardId)
    {
        $validated = $request->validate([
            'weight' => 'required|integer',
        ]);

        // Получение текущего пользователя
        $userId = $request->user()->id;

        // Поиск записи прогресса для указанной карточки и пользователя
        $progress = DB::table('progress')
                      ->where('flashcard_id', $flashcardId)
                      ->where('user_id', $userId)
                      ->first();

        if (!$progress) {
            // Если запись не существует, создаем новую
            DB::table('progress')->insert([
                'flashcard_id' => $flashcardId,
                'user_id' => $userId,
                'weight' => $validated['weight'],
                'last_reviewed_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // Обновление веса, если запись существует
            DB::table('progress')
              ->where('flashcard_id', $flashcardId)
              ->where('user_id', $userId)
              ->update([
                  'weight' => $validated['weight'],
                  'last_reviewed_at' => now(),
                  'updated_at' => now(),
              ]);
        }

        // Получение обновленной записи
        $updatedProgress = DB::table('progress')
                             ->where('flashcard_id', $flashcardId)
                             ->where('user_id', $userId)
                             ->first();

        return response()->json(['message' => 'Weight updated successfully', 'progress' => $updatedProgress]);
    }
}
