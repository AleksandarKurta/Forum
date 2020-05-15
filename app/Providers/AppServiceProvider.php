<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

class AppServiceProvider extends ServiceProvider
{

//    private static $channels;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->isLocal())
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);

        \View::composer('*', function ($view) {

//            if(self::$channels == null)
//            {
//                self::$channels = Channel::all();
//            }

            $channels = \Cache::rememberForever('channels', function(){
                return Channel::all();
            });

            $view->with('channels', $channels);
        });
    }
}
