<?php

namespace App\HTTP\Services\Customer;

use App\Mail\CustomerRegistered;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomerService
{
  public function get()
  {
    return Customer::orderbyDesc('id')->paginate(5);
  }

  // public function create($request)
  // {
  //   try {
  //     $customer = Customer::create([
  //       'name' => (string) $request->input('name'),
  //       'phone' => (string) $request->input('phone'),
  //       'housenumber' => (string) $request->input('housenumber'),
  //       'city_id' => (string) $request->input('city'),
  //       'province' => (string) $request->input('province_id'),
  //       'email' => (string) $request->input('email'),
  //       'password' => Hash::make($request->input('password')),
  //       'gmail_verification_token' => Str::random(60),
  //     ]);

  //     Mail::to($customer->email)->send(new CustomerRegistered($customer));

  //     Session::flash('success', 'Đăng kí khách hàng thành công');
  //   } catch (\Exception $err) {
  //     Session::flash('error', $err->getMessage());
  //     return false;
  //   }

  //   return true;
  // }

  public function update($request, $customer): bool
  {
    $customer->name = (string) $request->input('name');
    $customer->phone = (string) $request->input('phone');
    $customer->housenumber = (string) $request->input('housenumber');
    $customer->city_id = (string) $request->input('city_id');
    $customer->province_id = (string) $request->input('province_id');
    $customer->email = (string) $request->input('email');
    $customer->password = (string) $request->input('password');
    $newPassword = $request->input('password');
    if (!empty($newPassword) && $newPassword !== $customer->password) {
      $customer->password = Hash::make($newPassword);
    }
    $customer->save();

    // if (Auth::guard('cus')->check()) {
    //   $updatedCustomer = Customer::find($customer->id);
    //   Auth::guard('cus')->once([
    //     'name' => $updatedCustomer->name, 
    //     'phone' => $updatedCustomer->phone, 
    //     'housenumber' => $updatedCustomer->housenumber, 
    //     'city_id' => $updatedCustomer->city_id, 
    //     'province_id' => $updatedCustomer->province_id, 
    //     'email' => $updatedCustomer->email, 
    //     'password' => $updatedCustomer->password
    //   ]);
    // }

    Session::flash('success', 'Cập nhật khách hàng thành công');
    return true;
  }

  public function destroy($request)
  {
    $id = (int) $request->input('id');
    $customer = Customer::where('id', $id)->first();
    if ($customer) {
      return Customer::where('id', $id)->delete();
    }

    return false;
  }
}
