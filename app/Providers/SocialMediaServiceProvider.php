<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class SocialMediaServiceProvider extends ServiceProvider
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
        // Share social media settings with all views
        view()->composer('*', function ($view) {
            $socialMedia = json_decode(Setting::where('key', 'social_media_settings')->value('value'), true);
            $view->with('socialMedia', $socialMedia);
        });
    }
}