<?php

namespace App\HTTP\Services\Cart;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartService
{

  public function create($request)
  {
    $quantity = (int) $request->input('num_product');
    $product_id = (int) $request->input('product_id');

    if ($quantity <= 0 || $product_id <= 0) {
      Session::flash('error', 'Số lượng hoặc sản phẩm không chính xác');
      return false;
    }

    $carts = Session::get('carts');
    if (is_null($carts)) {
      Session::put('carts', [
        $product_id => $quantity
      ]);
      $carts = [];
      return true;
    }

    $exists = Arr::exists($carts, $product_id);
    if ($exists) {
      $carts[$product_id] += $quantity;
      Session::put('carts', $carts);
      return true;
    }

    $carts[$product_id] = $quantity;
    Session::put('carts', $carts);

    return true;
  }

  public function getProduct()
  {
    $carts = Session::get('carts');
    if (is_null($carts)) return [];

    $productId = array_keys($carts);

    return Product::with(['promotion'])
      ->select('id', 'name', 'quantity', 'thumb', 'price', 'promotion_id')
      ->whereIn('id', $productId)
      ->get();
  }

  public function update($request){
    Session::put('carts', $request->input('num_product'));
    return true;
  }

  public function delete($productId)
  {
    $carts = Session::get('carts');

    if (is_null($carts) || !Arr::exists($carts, $productId)) {
      Session::flash('error', 'Sản phẩm không tồn tại trong giỏ hàng');
      return false;
    }

    unset($carts[$productId]);

    Session::put('carts', $carts);

    return true;
  }

  public function deleteAll(): bool
  {
    Session::forget('carts');
    return true;
  }
}