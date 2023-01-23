<?php

namespace Elngar\Whatsapp;

use Illuminate\Support\ServiceProvider;

class WhatsappServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/whatsapp.php' => config_path('whatsapp.php')
        ]);
    }

    public function register()
    {

    }
}
