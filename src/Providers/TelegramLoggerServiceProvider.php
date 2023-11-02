<?php

namespace Terowoc\LaravelTelegramLogger\Providers;

use Illuminate\Support\ServiceProvider;
use ExceptionHandler;

class TelegramLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \Terowoc\LaravelTelegramLogger\ErrorTelegramLogger\ErrorTelegramLogger::class,
        );


    }
}
