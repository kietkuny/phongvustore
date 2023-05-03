<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required',
      'phone' => 'required',
      'housenumber' => 'required',
      'city_id' => 'required',
      'province_id' => 'required',
      'email' => 'required',
      'password' => 'required',
    ];
  }
  public function messages(){
    return [
      'name.required' => 'Vui lòng nhập tên',
      'phone.required' => 'VUi lòng điền số điện thoại',
      'housenumber.required' => 'Vui lòng nhập số nhà',
      'city.required' => 'Vui lòng chọn thành phố',
      'province.required' => 'VUi lòng chọn tỉnh',
      'email.required' => 'Vui lòng nhập email',
      'password.required' => 'Vui lòng nhập mật khẩu',
    ];
  }
}
