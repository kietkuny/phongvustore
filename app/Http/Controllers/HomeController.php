<?php

namespace App\Http\Controllers;

// use App\HTTP\Services\Slider\SliderService;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('home', [
      'title' => 'Phong Vũ Shop',
    ]);
  }

  public function ajaxSearch()
{
    $data = Product::search()->get();
    return view('ajaxSearch', compact('data'));
}
}
