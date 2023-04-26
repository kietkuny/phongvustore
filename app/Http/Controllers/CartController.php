<?php

namespace App\Http\Controllers;

use App\HTTP\Services\Cart\CartService;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
  protected $cartService;
  /**
   * Display a listing of the resource.
   */
  public function __construct(CartService $cartService)
  {
    $this->cartService = $cartService;
  }

  public function index(Request $request){
    $result = $this->cartService->create($request);
    if($result === false){
      return redirect()->back();
    }
    return redirect('/carts');
  }

  public function show(){
    $promotions = Promotion::all();
    $products = $this->cartService->getProduct();

    return view('cart',[
      'title' => 'Giỏ hàng',
      'products' => $products,
      'promotions' => $promotions,
      'carts' => Session::get('carts'),
    ]);
  }

  public function showCart(){
    $promotions = Promotion::all();
    $products = $this->cartService->getProduct();

    return view('layout.header',[
      'title' => 'Giỏ hàng',
      'products' => $products,
      'promotions' => $promotions,
      'carts' => Session::get('carts'),
    ]);
  }
}
