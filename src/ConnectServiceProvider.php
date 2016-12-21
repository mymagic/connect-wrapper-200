<?php

namespace MyMagic\Connect;

use Illuminate\Support\ServiceProvider;

class ConnectServiceProvider extends ServiceProvider{
    protected $defer = true;
    public function boot(){
        include __DIR__ . "/routes.php";
        include __DIR__ . "/Client.php";
    }

    public function register(){
        $this->app->singleton('MyMagic\Connect', function ($app) {
            return new Client($app);
        });
    }

    public function provides(){
        return 'MyMagic\Connect';
    }

}