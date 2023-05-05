<?php

namespace App\Http\Controllers;

// use App\HTTP\Services\Slider\SliderService;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

  public function index()
  {
    return view('home', [
      'title' => 'Phong Vũ Shop',
    ]);
  }

  public function logout()
  {
    Auth::guard('cus')->logout();
    return redirect()->route('home');
  }

  public function login()
  {
    return view('login', [
      'title' => 'Đăng nhập',
    ]);
  }

  public function post_login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email:filter',
      'password' => 'required',
    ], [
      'email.required' => 'Vui lòng nhập email',
      'password.required' => 'Vui lòng nhập mật khẩu'
    ]);

    if (Auth::guard('cus')->attempt($request->only('email', 'password'), $request->has('remember'))) {
      return redirect()->route('home');
    }
    Session::flash('error', 'Email hoặc Mật khẩu không đúng');
    return redirect()->back();
  }

  public function ajaxSearch()
  {
    $data = Product::search()->get();
    return view('ajaxSearch', compact('data'));
  }

  public function testEmail()
  {
    $name = 'Đỗ Tuấn Kiệt';
    Mail::send(
      'emails.test',
      compact('name'),
      function ($email) use ($name) {
        $email->subject('Đơn đặt hàng');
        $email->to('dotuankiet00@gmail.com', $name);
      }
    );
  }
}
