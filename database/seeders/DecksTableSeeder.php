<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DecksTableSeeder extends Seeder
{
    public function run()
    {
        $user1 = User::where('email', 'john@example.com')->first();
        $user2 = User::where('email', 'jane@example.com')->first();

        DB::table('decks')->insert([
            [
                'user_id' => $user1->id,
                'name' => 'Biology',
                'description' => 'Biology flashcards for high school.',
                'is_public' => true, // Пример публичной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user1->id,
                'name' => 'Chemistry',
                'description' => 'Chemistry flashcards for high school.',
                'is_public' => false, // Пример приватной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user2->id,
                'name' => 'Physics',
                'description' => 'Physics flashcards for college.',
                'is_public' => true, // Пример публичной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user1->id,
                'name' => 'English - Ru',
                'description' => 'English-Russian words',
                'is_public' => true, // Пример приватной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],            
        ]);
    }
}
