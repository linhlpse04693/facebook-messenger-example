<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FacebookMessenger
{
    public static array $routes = [];

    public static function sendTextMessage(string $recipient, string $message)
    {
        return Http::withToken(config('services.botman.facebook_token'))
            ->post(
                config('facebook.message_api'),
                [
                    'messaging_type' => 'RESPONSE',
                    'recipient' => [
                        'id' => $recipient,
                    ],
                    'message' => [
                        'text' => $message,
                    ],
                ]
            );
    }

    public static function handleMessage(string $recipient, string $message)
    {
        $matches = [];
        foreach (static::$routes as $pattern => $handler) {
            if (preg_match($pattern, $message, $matches)) {
                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
                $params = array('recipient' => $recipient);
                foreach ($matches as $key => $value) {
                    $params[$key] = $value;
                }

                app()->call(implode($handler, '@'), $params);
                return;
            }
        }
    }

    public static function hear(string $pattern, $handler)
    {
        $pattern = preg_replace('/\{(.+)\}/', '(?P<\1>.+)', $pattern);

        static::$routes[$pattern] = $handler;
    }
}
