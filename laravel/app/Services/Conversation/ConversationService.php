<?php

namespace App\Services\Conversation;

use App\Models\Conversation;
use App\Services\AbstractService;

class ConversationService extends AbstractService implements ConversationServiceInterface
{
    public function __construct(Conversation $conversation)
    {
        $this->model = $conversation;
    }

    public function updateOrCreate(array $condition, array $data)
    {
        $this->model->updateOrCreate(
            $condition,
            $data,
        );
    }
}
