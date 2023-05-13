<?php

namespace App\HTTP\Services\Order;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderService
{
  public function get()
  {
    return Order::orderbyDesc('id')->paginate(5);
  }

  public function update($request, $order): bool
  {
    $order->status_id = (string) $request->input('status_id');
    if (!empty($request->input('user_id'))) {
      $order->user_id = (string) $request->input('user_id');
    }
    if ($order->status_id == 5) {
      foreach ($order->orderdetails as $detail) {
        $product = Product::find($detail->product_id);
        $product->quantity += $detail->quantity;
        $product->save();
      }
    }
    $status = '';
    $content = '';
    $customer = Customer::find($order->customer_id);
    switch ($order->status_id) {
      case 2:
        $status = "Đã duyệt đơn hàng";
        $content = "đã được duyệt qua, chờ được giao hàng";
        break;
      case 3:
        $status = "Đang giao hàng";
        $content = "đang trên đường được giao hàng";
        break;
      case 4:
        $status = "Giao hàng thành công";
        $content = "đã được giao hàng thành công";
        break;
      case 5:
        $status = "Đơn hàng bị hủy";
        $content = "đã bị hủy";
        break;
      default:
        $status = "";
        break;
    }
    Mail::send('emails.order', compact('customer', 'order','content'), function ($email) use ($customer,$status) {
      $email->subject('Phong Vũ - ' . $status);
      $email->to($customer->email, $customer->name);
    });
    $order->update();

    Session::flash('success', 'Cập nhật hóa đơn thành công');
    return true;
  }
}
