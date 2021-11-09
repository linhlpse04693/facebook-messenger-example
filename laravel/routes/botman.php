<?php

use BotMan\BotMan\BotMan;
use Illuminate\Support\Facades\Log;

$botman = app('botman');

$botman->hears('alo', function (BotMan $botMan){
    try {
        $botMan->reply('asdasdasd');
    }catch (Exception $e) {
        Log::critical($e);
    }
});
