<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class HttpClientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест отправки POST-запроса на регистрацию пользователя.
     */
    public function test_register_user_with_http_client()
    {
        // Мокирование ответа от HTTP-клиента
        Http::fake([
            'http://your-api-url.com/api/register' => Http::response(['message' => 'User registered successfully'], 201),
        ]);

        $response = Http::post('http://your-api-url.com/api/register', [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertTrue($response->successful());
        $this->assertEquals('User registered successfully', $response->json('message'));
    }
}

