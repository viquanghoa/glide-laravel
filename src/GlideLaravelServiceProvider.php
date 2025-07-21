<?php

namespace HoaVi\GlideLaravel;

use HoaVi\GlideLaravel\Responses\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use League\Glide\ServerFactory;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

class GlideLaravelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'hoavi-glide-laravel');

        $this->app->singleton('glideServer', function () {
            $config = config('hoavi-glide-laravel');

            return ServerFactory::create([
                'response' => new ResponseFactory(app('request')),
                'source' => new Filesystem(new LocalFilesystemAdapter($config['source'])),
                'cache' => new Filesystem(new LocalFilesystemAdapter($config['cache'])),
                'base_url' => $config['base_url'],
                'sign_key' => $config['sign_key'],
                'defaults' => $config['defaults'],
            ]);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('hoavi-glide-laravel.php'),
        ], 'hoavi-glide-laravel-config');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
