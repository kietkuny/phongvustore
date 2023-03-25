<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
      'content'=>'required',
      'thumb'=>'required',
      'price'=>'required',
    ];
  }
  public function messages(){
    return [
      'name.required' => 'Vui lòng nhập tên sản phẩm',
      'content.required' => 'Vui lòng nhập mô tả sản phẩm',
      'thumb.required' => 'Vui lòng nhập file ảnh sản phẩm',
      'price.required' => 'Vui lòng nhập giá tiền sản phẩm',
    ];
  }
}
