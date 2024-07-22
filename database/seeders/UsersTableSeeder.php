<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'John One',
            'username' => 'one',
            'email' => '1',
            'password' => Hash::make('1'),
        ]);

        User::factory()->create([
            'name' => 'Jane Two',
            'username' => 'two',
            'email' => '2',
            'password' => Hash::make('2'),
        ]);

        User::factory()->create([
            'name' => 'Smith Three',
            'username' => 'three',
            'email' => '3',
            'password' => Hash::make('3'),
        ]);
    }
}
