<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\Province;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
  use RegistersUsers;

  protected $redirectTo = '/';

  public function __construct()
  {
    $this->middleware('guest:customer');
  }

  public function showRegistrationForm()
  {
    $provinces = Province::all();

    return view('auth.register_customer', compact('provinces'));
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'phone' => ['required', 'string', 'max:20'],
      'housenumber' => ['required', 'string', 'max:255'],
      'city_id' => ['required', 'string', 'max:255'],
      'province_id' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
  }

  protected function create(array $data)
  {
    $customer = new Customer();
    $customer->name = $data['name'];
    $customer->phone = $data['phone'];
    $customer->housenumber = $data['housenumber'];

    $city = City::find($data['city_id']);

    $customer->city = $city->name;
    $customer->city_id = $data['city_id'];

    $province = Province::find($data['province_id']);

    $customer->province = $province->name;
    $customer->province_id = $data['province_id'];

    $customer->email = $data['email'];
    $customer->password = bcrypt($data['password']);
    $customer->gmail_verification_token = Str::random(32);
    $customer->save();

    return $customer;
  }
}
