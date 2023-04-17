<?php

namespace App\Providers;

use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\ProductComposer;
use App\Http\View\Composers\SliderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
    View::composer('header',MenuComposer::class);
    View::composer('home',SliderComposer::class);
    View::composer('home',ProductComposer::class);
    View::composer('product',ProductComposer::class);
  }
}
