<?php

namespace Quincalla\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'home',
            'collection',
            'product',
            'search',
            'cart',
        ], 'Quincalla\Http\ViewComposers\CollectionComposer');

        View::composer([
            'home',
            'collection',
            'product',
            'search',
            'cart',
            'checkout/*',
            'order/*',
            'auth/*',
            'account',
        ], 'Quincalla\Http\ViewComposers\CartComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
