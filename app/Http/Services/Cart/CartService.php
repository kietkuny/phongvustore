<?php

namespace App\HTTP\Services\Cart;

use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
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

  public function update($request)
  {
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

  public function addOrder(Request $request)
  {
    // Lấy thông tin khách hàng từ input
    $customer_id = $request->input('customer_id');

    // Tạo một đối tượng Order mới
    $order = new Order();
    $order->customer_id = $customer_id;
    $order->save();

    // Lấy giỏ hàng hiện tại
    $carts = Session::get('carts');
    $productIds = array_keys($carts);

    foreach ($productIds as $productId) {
      $product = Product::with(['promotion'])
        ->select('id', 'name', 'quantity', 'thumb', 'price', 'promotion_id')
        ->where('id', $productId)
        ->firstOrFail();
      $product_id = $product->id;
      $quantity = $carts[$productId];
      $price = $product->price - $product->price * $product->promotion->sale;

      // Tạo một đối tượng OrderDetail mới
      $orderDetail = new Orderdetail();
      $orderDetail->order_id = $order->id;
      $orderDetail->product_id = $product_id;
      $orderDetail->quantity = $quantity;
      $orderDetail->price = $price;
      $orderDetail->status_id = 1;
      $orderDetail->save();

      // Trừ số lượng sản phẩm trong kho
      $product->quantity -= $quantity;
      $product->save();
    }
    Session::forget('carts');
    return redirect('/addpay')->with('success', 'Thanh toán thành công');
  }
}
