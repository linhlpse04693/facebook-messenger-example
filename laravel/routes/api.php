<?php

use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\WebhookController;
use App\Http\Controllers\Api\WebhookVerifyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/webhook', WebhookVerifyController::class);
Route::post('/webhook', WebhookController::class);
