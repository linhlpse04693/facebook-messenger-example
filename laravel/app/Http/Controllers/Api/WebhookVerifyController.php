<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebhookVerifyRequest;

class WebhookVerifyController extends Controller
{
    public function __invoke(WebhookVerifyRequest $request)
    {
        return response($request->hub_challenge);
    }
}
