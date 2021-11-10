<?php

namespace App\Services\Conversation;

use App\Services\ServiceInterface;

interface ConversationServiceInterface extends ServiceInterface
{
    public function updateOrCreate(array $condition, array $data);
}
