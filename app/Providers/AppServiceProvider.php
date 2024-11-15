<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\SiteData; 
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $staticSiteData = SiteData::first();
            $view->with('staticSiteData', $staticSiteData);
        });
    }
}
