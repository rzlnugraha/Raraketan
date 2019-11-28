<?php

namespace App\Providers;

use App\Customer;
use App\Merk;
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
        view()->composer('forms.jenis_merk', function ($view) {
            $view->with('merks', Merk::all());
        });
    }
}
