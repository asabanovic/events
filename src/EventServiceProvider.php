<?php

namespace Asabanovic\Events;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
       
        $loader->alias('Event', 'Facades\Asabanovic\Events\Model\Event');
        $loader->alias('Comment', 'Facades\Asabanovic\Events\Model\Comment');

    }
}
