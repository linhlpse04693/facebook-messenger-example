<?php

namespace App\Providers;

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Container\LaravelContainer;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Storages\Drivers\FileStorage;
use BotMan\Drivers\Facebook\FacebookDriver;
use Illuminate\Support\ServiceProvider;

class BotManServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('botman', function ($app) {
            $storage = new FileStorage(storage_path('botman'));

            DriverManager::loadDriver(FacebookDriver::class);

            $botman = BotManFactory::create(config('services.botman', []), new LaravelCache(), $app->make('request'), $storage);

            $botman->setContainer(new LaravelContainer($this->app));

            return $botman;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
