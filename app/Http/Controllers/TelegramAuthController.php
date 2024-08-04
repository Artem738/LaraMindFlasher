<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class TelegramAuthController extends Controller
{
    public function handleAuth(Request $request)
    {
        Log::info('Received Telegram ahandleAuth - Runed');
        Log::info('Received Telegram auth request', $request->all());

        $data = $request->all();
        $hash = $data['hash'];
        unset($data['hash']);

        $checkString = collect($data)
            ->map(function ($value, $key) {
                return "$key=$value";
            })
            ->sort()
            ->implode("\n");

        $secretKey = hash('sha256', env('TELEGRAM_BOT_TOKEN'), true);
        $hmac = hash_hmac('sha256', $checkString, $secretKey);

        Log::info('Generated HMAC', ['hmac' => $hmac, 'hash' => $hash]);

        if (hash_equals($hmac, $hash)) {
            // Проверка подписи прошла успешно
            $user = User::updateOrCreate(
                ['telegram_id' => $data['id']],
                [
                    'username' => $data['username'] ?? null,
                    'first_name' => $data['first_name'] ?? null,
                    'last_name' => $data['last_name'] ?? null,
                    'photo_url' => $data['photo_url'] ?? null,
                ]
            );

            Log::info('User authenticated and updated/created', ['user' => $user]);

            // Вы можете создать JWT токен или выполнить другие действия
            // В данном примере просто возвращаем пользователя
            return response()->json($user);
        } else {
            // Неверная подпись
            Log::warning('Unauthorized access attempt', ['data' => $data]);

            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
