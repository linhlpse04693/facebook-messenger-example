<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Conversation\ConversationServiceInterface;
use App\Utils\FacebookMessenger;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->object !== 'page') {
            return;
        }

        foreach ($request->entry as $entry) {
            FacebookMessenger::handleMessage($entry['messaging'][0]['sender']['id'], $entry['messaging'][0]['message']['text']);
        }
    }
}
