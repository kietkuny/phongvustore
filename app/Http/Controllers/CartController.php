<?php

namespace App\Http\Controllers;

use App\HTTP\Services\Cart\CartService;
use Illuminate\Http\Request;

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
  }
}
