<?php

namespace App\FacebookHandlers;

use App\Services\Conversation\ConversationServiceInterface;
use App\Utils\FacebookMessenger;
use Illuminate\Support\Facades\Log;

class MessageHandler
{
    protected ConversationServiceInterface $conversationService;

    public function __construct(ConversationServiceInterface $conversationService)
    {
        $this->conversationService = $conversationService;
    }

    public function getUserName(string $recipient, string $name)
    {
        $this->conversationService->updateOrCreate(['sender' => $recipient], ['name' => $name]);

        FacebookMessenger::sendTextMessage($recipient, "Your name is: $name");
    }

    public function getUserPhone(string $recipient, string $phone)
    {
        $this->conversationService->updateOrCreate(['sender' => $recipient], ['phone' => $phone]);

        FacebookMessenger::sendTextMessage($recipient, "Your phone number is: $phone");
    }

    public function getUserEmail(string $recipient, string $email)
    {
        Log::debug('??????????????????????');
        $this->conversationService->updateOrCreate(['sender' => $recipient], ['email' => $email]);

        FacebookMessenger::sendTextMessage($recipient, "Your email is: $email");
    }
}
