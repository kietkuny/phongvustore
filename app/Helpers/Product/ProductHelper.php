<?php

namespace App\Helpers\Product;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductHelper
{

  public static function product($products)
  {
    $products = Product::with('producttype','promotion','trademark')
      ->select('products.*', 'product_types.name as producttype_name', 'trademarks.name as trademark_name' ,'promotions.name as promotion_name')
      ->join('product_types', 'product_types.id', '=', 'products.producttype_id')
      ->join('trademarks', 'trademarks.id', '=', 'products.trademark_id')
      ->join('promotions', 'promotions.id', '=', 'products.promotion_id')
      ->get();
    $html = '';
    foreach ($products as $key => $product) {
      $product->price_sale = $product->price - $product->price * $product->promotion->sale;
      $html .= '
        <tr>
          <td>' . $product->id . '</td>
          <td>' . $product->name . '</td>
          <td>' . $product->producttype_name . '</td>
          <td>' . $product->trademark_name . '</td>
          <td>' . $product->quantity .'</td>
          <td><img src="' . $product->thumb . '" width=80px></td>
          <td>' . $product->price . '</td>
          <td>' . $product->price_sale . '</td>
          <td>' . $product->updated_at . '</td>
          <td>
            <a href="/admin/products/edit/id=' . $product->id . '" class="btn btn-primary btn-sm">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal' . $product->id . '">
              <i class="fa-regular fa-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="Modal' . $product->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Bạn có chắc xóa sản phẩm <b>' . $product->name . '</b> không ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="removeRow(' . $product->id . ',\'/admin/products/destroy\')">Xóa</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        ';

      unset($products[$key]);
    }

    return $html;
  }
}
