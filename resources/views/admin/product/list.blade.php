@extends('admin.main')

@section('content')
<div class="row d-flex justify-content-md-between mb-3">
  <form method="GET" action="/admin/products/list" class="input-group rounded col-md-8 w-auto align-items-center">
    <div class="form-outline">
      <input type="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" name="search" 
      id="search-product"/>
    </div>
    <button type="submit" type="button" class="btn btn-dark">
        <i class="fas fa-search"></i>
    </button>
  </form>
  <div class="text-md-right col-md-4">
    <a href="/admin/products/add" class="btn-sm btn btn-success text-decoration-none">
      <div class="p-1">
        <i class="fa-solid fa-plus"></i> Thêm sản phẩm
      </div>
    </a>
  </div>
</div>
<table class="table table-hover table-bordered table-responsive-xl">
  <thead>
    <th style="width: 50px">STT</th>
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
