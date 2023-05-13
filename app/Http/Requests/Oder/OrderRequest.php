<?php

namespace App\Http\Requests\Oder;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
      'status_id' => 'required',
    ];
  }

  public function messages(){
    return [
      'status_id.required' => 'Vui lòng chọn trạng thái đơn hàng',
    ];
  }
}