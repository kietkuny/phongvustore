<?php

namespace App\Http\Controllers;

// use App\HTTP\Services\Slider\SliderService;

use App\Http\Requests\Home\HomeRequest;
use App\HTTP\Services\Customer\CustomerService;
use App\Models\City;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HomeController extends Controller
{
  protected $customerService;
  
  public function __construct(CustomerService $customerService)
  {
    $this->customerService = $customerService;
  }

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

    if (Auth::guard('cus')->attempt($request->only('email', 'password'), $request->has('remember_token'))) {
      if (Auth::guard('cus')->user()->status == 0) {
        Auth::guard('cus')->logout();
        return redirect()->route('home.login')->with('error', 'Tài khoản chưa kích hoạt, <a href="#">nhấn vào đây</a>');
      }
      return redirect()->route('home');
    }
    Session::flash('error', 'Email hoặc Mật khẩu không đúng');
    return redirect()->back();
  }

  public function register()
  {
    $cities = City::all();
    $provinces = Province::all();
    return view('register', [
      'title' => 'Đăng ký',
      'cities' => $cities,
      'provinces' => $provinces
    ]);
  }

  public function post_register(Request $request){
    $request->validate([
      'password' => 'required',
      'confirm_password' => 'required|same:password',
    ]);
    $token = strtoupper(Str::random(10));
    $data = $request->only('name','phone','housenumber','province_id','city_id','email');
    $password = Hash::make($request->password);
    $data['password'] = $password;
    $data['token'] = $token;

    if($customer = Customer::create($data)){
      Mail::send('emails.active_account',compact('customer'), function($email) use($customer){
        $email->subject('Phong Vũ - Xác nhận tài khoản');
        $email->to($customer->email,$customer->name);
      });
      return redirect()->route('home.login')->with('success','Đã đăng kí tài khoản, hãy xác thực tài khoản');
    }

    return redirect()->back();
  }

  public function actived(Customer $customer, $token){
    if($customer->token === $token){
      $customer->update(['status' => 1,'token' => null]);
      return redirect()->route('home.login')->with('success','Xác nhận thành công, bạn có thể đăng nhập');
    }else{
      return redirect()->route('home.login')->with('error','Mã xác nhận bạn gửi không hợp lệ');
    }
  }

  public function showInfo(){
    $customer = Auth::guard('cus')->user();
    $provinces = Province::all();
    $cities = City::all();
    return view('info',[
      'title' => 'Thông tin khách hàng',
    ],compact('customer','provinces','cities'));
  }

  public function updateInfo(HomeRequest $request)
  {
    $customer = Auth::guard('cus')->user();
    $this->customerService->updateInfo($request, $customer);
    return redirect('/info');
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
