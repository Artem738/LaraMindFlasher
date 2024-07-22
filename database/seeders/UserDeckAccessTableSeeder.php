<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDeckAccessTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_deck_access')->insert([
            [
                'user_id' => 1,
                'deck_id' => 1,
                'access_level' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'deck_id' => 2,
                'access_level' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'deck_id' => 3,
                'access_level' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

