@extends('admin.main')

@section('content')
<div class="text-right m-2">
  <a href="/admin/product_types/add" class="btn-sm btn btn-success text-decoration-none">
    <div class="p-1">
      <i class="fa-solid fa-plus"></i> Thêm loại sản phẩm
    </div>
  </a>
</div>
<table class="table table-hover table-bordered">
  <thead>
    <th style="width: 50px">ID</th>
    <th>Tên loại sản phẩm</th>
    <th>Khuyến mãi</th>
    <th>Cập nhật</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\ProductType\ProductTypeHelper::product_type($product_types) !!}
  </tbody>
</table>
{!! $product_types->links('pagination::bootstrap-5') !!}
@endsection
