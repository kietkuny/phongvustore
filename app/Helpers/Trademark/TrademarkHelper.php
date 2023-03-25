<?php

namespace App\Helpers\Trademark;

use Illuminate\Support\Str;

class TrademarkHelper
{
  public static function trademark($trademarks)
  {
    $html = '';
    foreach ($trademarks as $key => $trademark) {
      $html .= '
        <tr>
          <td>' . $trademark->id . '</td>
          <td>' . $trademark->name . '</td>
          <td>' . $trademark->updated_at . '</td>
          <td>
            <a href="/admin/trademarks/edit/id=' . $trademark->id . '" class="btn btn-primary btn-sm">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal' . $trademark->id . '">
              <i class="fa-regular fa-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="Modal' . $trademark->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa thương hiệu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Bạn có chắc xóa thương hiệu <b>' . $trademark->name . '</b> không ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="removeRow(' . $trademark->id . ',\'/admin/trademarks/destroy\')">Xóa</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        ';

      unset($trademarks[$key]);
    }

    return $html;
  }
}
