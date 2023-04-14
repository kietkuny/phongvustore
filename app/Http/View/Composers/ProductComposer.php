<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class ProductComposer
{
  protected $users;

  public function __construct()
  {
  }

  public function compose(View $view): void
  {
    $products = Product::select('id','name')->orderByDesc('id')->get();
    $view->with('products',$products);
  }
}
