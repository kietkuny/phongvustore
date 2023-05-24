<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
  public function index(Request $request)
  {
    $selectedMonth = intval($request->input('month')) ? intval($request->input('month')) : Carbon::now()->month;
    $selectedYear = intval($request->input('year')) ? intval($request->input('year')) : Carbon::now()->year;

    $startOfYear = Carbon::create($selectedYear, 1, 1, 0, 0, 0);
    $endOfYear = Carbon::create($selectedYear, 12, 31, 23, 59, 59);
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

    $producttypes = Orderdetail::select('product_types.name as product_type', DB::raw('SUM(orderdetails.quantity) as total_quantity'))
      ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
      ->join('products', 'orderdetails.product_id', '=', 'products.id')
      ->join('product_types', 'products.producttype_id', '=', 'product_types.id')
      ->where('orders.status_id', 4)
      ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
      ->groupBy('product_types.name')
      ->get();

    $chartData = [];
    foreach ($producttypes as $producttype) {
      $chartData[] = [
        'label' => $producttype->product_type,
        'value' => $producttype->total_quantity,
      ];
    };

    $revenueData = Orderdetail::select(DB::raw('MONTH(orders.updated_at) as month'), DB::raw('SUM(orderdetails.price * orderdetails.quantity) as total_amount'))
      ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
      ->whereIn('orders.id', function ($query) {
        $query->select('id')
          ->from('orders')
          ->where('status_id', 4);
      })
      ->whereBetween('orders.updated_at', [$startOfYear, $endOfYear])
      ->groupBy('month')
      ->orderBy('month')
      ->get();

    $months = [
      'Tháng 1',
      'Tháng 2',
      'Tháng 3',
      'Tháng 4',
      'Tháng 5',
      'Tháng 6',
      'Tháng 7',
      'Tháng 8',
      'Tháng 9',
      'Tháng 10',
      'Tháng 11',
      'Tháng 12',
    ];

    $revenue = [];
    foreach ($months as $key => $month) {
      $revenue[$key] = 0;
      foreach ($revenueData as $Data) {
        if ($Data->month == $key + 1) {
          $revenue[$key] = $Data->total_amount;
          break;
        }
      }
    }

    $totalOrders = Order::where('status_id', 4)
      ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
      ->count();

    $totalProducts = Orderdetail::whereHas('order', function ($query) use ($startOfMonth, $endOfMonth) {
      $query->where('status_id', 4)
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    })->sum('quantity');

    $totalRevenue = Orderdetail::whereHas('order', function ($query) use ($startOfMonth, $endOfMonth) {
      $query->where('status_id', 4)
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    })->sum(DB::raw('price * quantity'));

    $sumOrders = Order::where('status_id', 4)
      ->count();

    $sumProducts = Orderdetail::whereHas('order', function ($query) {
      $query->where('status_id', 4);
    })->sum('quantity');

    $sumRevenue = Orderdetail::whereHas('order', function ($query) {
      $query->where('status_id', 4);
    })->sum(DB::raw('price * quantity'));

    $sumCustomers = Customer::where('status', 1)
      ->count();

    return view('admin.home.home', [
      'title' => 'Thống kê doanh số'
    ], compact('orderDetails', 'selectedMonth', 'months', 'chartData', 'revenue', 'totalOrders', 'totalProducts', 'totalRevenue', 'sumOrders', 'sumProducts', 'sumRevenue', 'sumCustomers','selectedYear'));
  }
}
