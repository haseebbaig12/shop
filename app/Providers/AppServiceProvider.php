<?php

namespace App\Providers;
use App\Models\Pages;
use App\Models\PagesText;
use Auth;
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
        $menuItems = Pages::where('status',1)->get();         
        view()->share('menuItems', $menuItems);
    }
}
