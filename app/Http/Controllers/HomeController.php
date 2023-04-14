<?php

namespace App\Http\Controllers;

use App\HTTP\Services\Slider\SliderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  protected $slider;

  public function __construct(SliderService $slider){
    $this->slider = $slider;
  }
  public function index()
  {
    return view('home', [
      'title' => 'Phong Vũ Shop',
      // 'sliders' => $this->slider->show()
    ]);
  }
}
