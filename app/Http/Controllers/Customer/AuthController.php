<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  public function verify($token)
  {
    $customer = Customer::where('gmail_verification_token', $token)->firstOrFail();
    $customer->update(['gmail_verification_token' => null]);

    Auth::guard('customer')->login($customer);

    return redirect()->route('home')->with(['success' => 'Email của bạn đã được xác thực thành công.']);
  }

  public function resend()
  {
    $customer = Auth::guard('customer')->user();

    $customer->update(['gmail_verification_token' => Str::random(32)]);

    $customer->sendGmailVerificationNotification();

    return redirect()->back()->with(['success' => 'Một email xác thực mới đã được gửi đến email của bạn.']);
  }
}
