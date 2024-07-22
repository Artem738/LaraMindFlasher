<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DecksTableSeeder extends Seeder
{
    public function run()
    {


        DB::table('decks')->insert([
            [
                'user_id' => 1,
                'name' => 'Biology',
                'description' => 'Biology flashcards for high school.',
                'is_public' => true, // Пример публичной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'Chemistry',
                'description' => 'Chemistry flashcards for high school.',
                'is_public' => false, // Пример приватной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'name' => 'Physics',
                'description' => 'Physics flashcards for college.',
                'is_public' => true, // Пример публичной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'name' => 'English - Ru',
                'description' => 'English-Russian words',
                'is_public' => true, // Пример приватной колоды
                'created_at' => now(),
                'updated_at' => now(),
            ],            
        ]);
    }
}
