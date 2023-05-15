<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orderdetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
  public function index(Request $request)
  {
    $selectedMonth = intval($request->input('month')) ? intval($request->input('month')) : Carbon::now()->month;

    $startOfMonth = Carbon::create(null, $selectedMonth, 1, 0, 0, 0);
    $endOfMonth = Carbon::create(null, $selectedMonth, 1, 0, 0, 0)->endOfMonth();

    $orderDetails = Orderdetail::select(DB::raw('DATE(orders.updated_at) as date'), DB::raw('SUM(orderdetails.price * orderdetails.quantity) as total_sales'))
      ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
      ->whereIn('orders.id', function ($query) {
        $query->select('id')
          ->from('orders')
          ->where('status_id', 4);
      })
      ->whereBetween('orders.updated_at', [$startOfMonth, $endOfMonth])
      ->groupBy('date')
      ->orderBy('date', 'ASC')
      ->get();

    $months = [
      1 => 'Tháng 1',
      2 => 'Tháng 2',
      3 => 'Tháng 3',
      4 => 'Tháng 4',
      5 => 'Tháng 5',
      6 => 'Tháng 6',
      7 => 'Tháng 7',
      8 => 'Tháng 8',
      9 => 'Tháng 9',
      10 => 'Tháng 10',
      11 => 'Tháng 11',
      12 => 'Tháng 12',
    ];

    $producttypes = Orderdetail::select('product_types.name as product_type', DB::raw('SUM(orderdetails.quantity) as total_quantity'))
      ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
      ->join('products', 'orderdetails.product_id', '=', 'products.id')
      ->join('product_types', 'products.producttype_id', '=', 'product_types.id')
      ->where('orders.status_id', 4)
      ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
      ->groupBy('product_types.name')
      ->get();

    $chartData = collect();
    foreach ($producttypes as $producttype) {
      $chartData->push([
        'label' => $producttype->product_type,
        'value' => $producttype->total_quantity,
      ]);
    };
    
    return view('admin.home.home', [
      'title' => 'Thống kê doanh số'
    ], compact('orderDetails', 'selectedMonth', 'months') + ['chartData' => $chartData->toJson()]);
  }
}
