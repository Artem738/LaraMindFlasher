<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('progress')->insert([
            [
                'flashcard_id' => 1,
                'user_id' => 1,
                'weight' => 1,
                'last_reviewed_at' => now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flashcard_id' => 2,
                'user_id' => 1,
                'weight' => 1,
                'last_reviewed_at' => now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flashcard_id' => 3,
                'user_id' => 2,
                'weight' => 1,
                'last_reviewed_at' => now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

