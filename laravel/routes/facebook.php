<?php

use App\FacebookHandlers\MessageHandler;
use App\Utils\FacebookMessenger;

FacebookMessenger::hear('/^my name is {name}$/i', [MessageHandler::class, 'getUserName']);
FacebookMessenger::hear('/^my phone is {phone}$/i', [MessageHandler::class, 'getUserPhone']);
FacebookMessenger::hear('/^my email is {email}$/i', [MessageHandler::class, 'getUserEmail']);
