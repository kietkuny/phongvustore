<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:customer')->except('logout');
  }

  public function showLoginForm()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->intended('/home');
    }

    return back()->withInput($request->only('email'));
  }

  public function logout()
  {
    Auth::guard('customer')->logout();

    return redirect('/');
  }
}
