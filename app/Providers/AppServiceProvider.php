<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Builder::defaultStringLength(191); // Update defaultStringLength this is mine to give more length ...

        /*View::composer('*', function ($view) {

            $view->with('target_types', TargetType::all());
        });*/
    }
}
