@extends('admin.main')

@section('content')
<div class="text-right m-2">
  <a href="/admin/products/add" class="btn-sm btn btn-success text-decoration-none">
    <div class="p-1">
      <i class="fa-solid fa-plus"></i> Thêm sản phẩm
    </div>
  </a>
</div>
<table class="table table-hover table-bordered table-responsive-md">
  <thead>
    <th style="width: 50px">ID</th>
    <th>Tên sản phẩm</th>
    <th>Loại sản phẩm</th>
    <th>Thương hiệu</th>
    <th>Số lượng</th>
    <th>Ảnh</th>
    <th>Giá gốc</th>
    <th>Giá giảm</th>
    <th>Cập nhật</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\Product\ProductHelper::product($products) !!}
  </tbody>
</table>
{!! $products->links('pagination::bootstrap-5') !!}
@endsection
