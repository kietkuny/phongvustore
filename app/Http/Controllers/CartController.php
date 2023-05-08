<?php

namespace App\Http\Controllers;

use App\HTTP\Services\Cart\CartService;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse as HttpJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\JsonResponse;

class CartController extends Controller
{
  protected $cartService;
  /**
   * Display a listing of the resource.
   */
  public function __construct(CartService $cartService)
  {
    $this->middleware('cus');
    $this->cartService = $cartService;
  }

  public function index(Request $request)
  {
    $result = $this->cartService->create($request);
    if ($result === false) {
      return redirect()->back();
    }
    return view('cart');
  }

  public function show()
  {
    $promotions = Promotion::all();
    $products = $this->cartService->getProduct();

    return view('cart', [
      'title' => 'Giỏ hàng',
      'products' => $products,
      'promotions' => $promotions,
      'carts' => Session::get('carts'),
    ]);
  }

  public function showPay()
  {
    // $customer = Auth::customer();
    $promotions = Promotion::all();
    $products = $this->cartService->getProduct();

    return view('pay', [
      'title' => 'Thanh toán',
      'products' => $products,
      'promotions' => $promotions,
      'carts' => Session::get('carts'),
    ]);
  }

  public function update(Request $request)
  {
    $this->cartService->update($request);
    return redirect('/carts');
  }

  public function delete($productId): JsonResponse
  {
    $result = $this->cartService->delete($productId);
    if ($result) {
      return response()->json([
        'error' => false,
        'message' => 'Xóa thành công sản phẩm trong giỏ hàng'
      ]);
    }

    return response()->json([
      'error' => true
    ]);
  }

  public function deleteAll(): JsonResponse
  {
    $result = $this->cartService->deleteAll();
    if ($result) {
      return response()->json([
        'error' => false,
        'message' => 'Đã xóa toàn bộ sản phẩm trong giỏ hàng'
      ]);
    }

    return response()->json([
      'error' => true
    ]);
  }

  public function addOrder(Request $request)
  {
    $this->cartService->addOrder($request);
    return redirect('/carts');
  }
}
