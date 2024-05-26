<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    $verticalMenuData = [];

    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData]);
  }
}
