<?php

namespace App\Providers;

use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\ProductComposer;
use App\Http\View\Composers\ProductTypeComposer;
use App\Http\View\Composers\SliderComposer;
use App\Http\View\Composers\TrademarkComposer;
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
    View::composer('layout.header',MenuComposer::class);
    View::composer('home',SliderComposer::class);
    View::composer('home',ProductTypeComposer::class);
    View::composer('home',TrademarkComposer::class);
    View::composer('home',ProductComposer::class);
    View::composer('product',ProductComposer::class);
    View::composer('layout.cart',CartComposer::class);
  }
}
