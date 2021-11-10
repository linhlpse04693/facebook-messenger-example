<?php

namespace App\Providers;

use App\Services\Conversation\ConversationService;
use App\Services\Conversation\ConversationServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $services = [
        [
            'abstract' => ConversationServiceInterface::class,
            'concrete' => ConversationService::class,
        ]
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->services as $service) {
            $this->app->bind($service['abstract'], $service['concrete']);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
