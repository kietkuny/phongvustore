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
    $products = Product::with('producttype', 'promotion', 'trademark')
    ->select('products.*')
    ->join('product_types', 'product_types.id', '=', 'products.producttype_id')
    ->join('trademarks', 'trademarks.id', '=', 'products.trademark_id')
    ->join('promotions', 'promotions.id', '=', 'products.promotion_id')->orderByDesc('id')->get();
    $view->with('products',$products);
  }
}
