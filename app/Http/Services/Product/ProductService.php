<?php

namespace App\HTTP\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{
  public function get(){
    return Product::orderbyDesc('id')->paginate(5);
  }

  public function create($request)
  {
    try {
      Product::create([
        'name' => (string) $request->input('name'),
        'content' => (string) $request->input('content'),
        'producttype_id' => (string) $request->input('producttype_id'),
        'trademark_id' => (string) $request->input('trademark_id'),
        'thumb' => (string) $request->input('thumb'),
        'price' => (string) $request->input('price'),
      ]);

      Session::flash('success', 'Tạo sản phẩm thành công');

    } catch (\Exception $err) {
      Session::flash('error', $err->getMessage());
      return false;
    }

    return true;
  }

  public function update($request, $product) : bool{
    $product->name = (string) $request->input('name');
    $product->content = (string) $request->input('content');
    $product->producttype_id = (string) $request->input('producttype_id');
    $product->trademark_id = (string) $request->input('trademark_id');
    $product->thumb = (string) $request->input('thumb');
    $product->price = (string) $request->input('price');
    $product->save();

    Session::flash('success', 'Cập nhật sản phẩm thành công');
    return true;
  }

  public function destroy($request){
    $id = (int) $request->input('id');
    $product = Product::where('id', $id)->first();
    if($product){
      return Product::where('id', $id)->delete();
    }

    return false;
  }
}
