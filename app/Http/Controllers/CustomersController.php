<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use App\Mail\VerifyEmail;
use App\Models\City;
use App\Models\Customer;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
  public function showRegistrationForm()
  {
    $cities = City::all();
    $provinces = Province::all();
    return view('register', [
      'title' => 'Đăng ký',
      'cities' => $cities,
      'provinces' => $provinces
    ]);
  }

  public function showInfoCustomer(){
    $customer = Auth::customer();
    return view('info',[
      'title' => 'Thông tin khách hàng'
    ],compact('customer'));
  }

  // public function updateCustomer(CustomerRequest $request,Customer $customer){
  //   $customer = Auth::customer();
  //   $this->customerService->update($request,$customer);
  //   return redirect('/customer');
  // }

  // public function sendVerificationEmail($customer)
  // {
  //   $token = Str::random(40);
  //   $customer->gmail_verification_token = $token;
  //   $customer->save();

  //   Mail::to($customer->email)->send(new VerificationEmail($customer));

  //   return $token;
  // }

  public function sendEmailVerificationCode(Request $request)
  {
    $email = $request->input('email');
    $token = Str::random(6);

    // Lưu token vào database
    $customer = Customer::where('email', $email)->first();
    if ($customer) {
      $customer->gmail_verification_token = $token;
      $customer->save();
    }

    // Gửi email xác nhận
    $data = array(
      'name' => 'demophongvu00',
      'token' => $token
    );
    Mail::send('emails.email-verification-code', $data, function ($message) use ($email) {
      $message->to($email, 'Receiver Name')->subject('Email Verification Code');
      $message->from('demophongvu00@gmail.com', 'demophongvu00');
    });

    return response()->json(['message' => 'Mã xác nhận đã được gửi đến email của bạn.']);
  }

  public function register(Request $request)
  {
    $cities = City::all();
    $provinces = Province::all();
    // Kiểm tra dữ liệu đầu vào
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
      'phone' => 'required|max:20',
      'housenumber' => 'required|max:255',
      'city_id' => 'required|exists:cities,id',
      'province_id' => 'required|exists:provinces,id',
      'email' => 'required|email|unique:customers,email',
      'password' => 'required|min:6',
      'gmail_verification_token' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect('/register')
        ->withErrors($validator)
        ->withInput();
    }

    // Tạo khách hàng mới
    $customer = new Customer([
      'name' => $request->input('name'),
      'phone' => $request->input('phone'),
      'housenumber' => $request->input('housenumber'),
      'city_id' => $request->input('city_id'),
      'province_id' => $request->input('province_id'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password')),
      'gmail_verification_token' => $request->input('gmail_verification_token')
    ]);

    $customer->save();

    Mail::to($customer->email)->send(new VerifyEmail($customer));

    return redirect('/login')->with('success', 'Đăng ký thành công. Vui lòng kiểm tra email để xác nhận tài khoản.');
  }

  public function verify($token)
  {
    $customer = Customer::where('gmail_verification_token', $token)->first();

    if ($customer) {
      $customer->gmail_verification_token = null;
      $customer->is_verified = true;
      $customer->save();

      // Chuyển hướng về trang thông báo xác nhận thành công
      return redirect('/login'); //redirect('/verify-success');
    } else {
      // Chuyển hướng về trang thông báo xác nhận không thành công
      return redirect('/login'); //redirect('/verify-failed');
    }
  }
}
