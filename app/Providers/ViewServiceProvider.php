<?php

namespace App\Providers;
use App\Catalog;
use Illuminate\Support\ServiceProvider;
use View;
class  ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

     View::composer('layouts.app', function ($view){
         $v_catalogs = Catalog::all();
         $view->with('v_catalogs', $v_catalogs);
     });
    }
}
