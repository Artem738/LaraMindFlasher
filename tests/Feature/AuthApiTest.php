<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест успешной регистрации пользователя
     */
    public function test_register_user()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'John Doe',
            'username' => 'johndoe',  // Поле username
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201)
                 ->assertJson(['message' => 'User registered successfully']);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    /**
     * Тест успешного логина пользователя
     */
    public function test_login_user()
    {
        // Создание пользователя
        $user = User::factory()->create([
            'username' => 'johndoe',  // Поле username
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Попытка логина
        $response = $this->postJson('/api/login', [
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['access_token', 'token_type']);
    }

    /**
     * Тест неуспешного логина с неверными данными
     */
    public function test_login_user_with_invalid_credentials()
    {
        // Попытка логина с неверными данными
        $response = $this->postJson('/api/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email']);
    }
}
