<?php

namespace App\HTTP\Services\ProductType;

use App\Models\ProductType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductTypeService
{
  public function get(){
    return ProductType::orderbyDesc('id')->paginate(5);
  }

  public function create($request)
  {
    try {
      ProductType::create([
        'name' => (string) $request->input('name'),
        'promotion_id' => (string) $request->input('promotion_id'),
      ]);

      Session::flash('success', 'Tạo loại sản phẩm thành công');

    } catch (\Exception $err) {
      Session::flash('error', $err->getMessage());
      return false;
    }

    return true;
  }

  public function update($request, $productType) : bool{
    $productType->name = (string) $request->input('name');
    $productType->promotion_id = (string) $request->input('promotion_id');
    $productType->save();

    Session::flash('success', 'Cập nhật loại sản phẩm thành công');
    return true;
  }

  public function destroy($request){
    $id = (int) $request->input('id');
    $productType = ProductType::where('id', $id)->first();
    if($productType){
      return ProductType::where('id', $id)->delete();
    }

    return false;
  }
}
