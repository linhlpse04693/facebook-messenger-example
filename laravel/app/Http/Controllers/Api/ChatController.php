<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use BotMan\BotMan\BotMan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function __invoke()
    {
        $botman = app('botman');

        $botman->hears('alo', function (BotMan $botMan){
            try {
                Log::debug($botMan);
                Log::debug('/???????????????????');
                $botMan->reply('asdasdasd');
            }catch (Exception $e) {
                Log::critical($e);
            }
        });

        $botman->listen();
    }
}
