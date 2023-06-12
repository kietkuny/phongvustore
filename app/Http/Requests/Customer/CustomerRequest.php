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
      'email' => 'required|email|unique:customers,email',
      'password' => 'required',
    ];
  }
  public function messages()
  {
    return [
      'name.required' => 'Vui lòng nhập tên',
      'phone.required' => 'Vui lòng điền số điện thoại',
      'housenumber.required' => 'Vui lòng nhập số nhà',
      'city_id.required' => 'Vui lòng chọn thành phố',
      'email.required' => 'Vui lòng nhập email',
      'email.email' => 'Email không hợp lệ',
      'email.unique' => 'Email đã tồn tại trong hệ thống. Vui lòng sử dụng email khác.',
      'password.required' => 'Vui lòng nhập mật khẩu',
    ];
  }
}
