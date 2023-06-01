@extends('admin.main')

@section('content')
<div class="text-right m-2">
  <a href="/admin/sales/add" class="btn-sm btn btn-success text-decoration-none">
    <div class="p-1">
      <i class="fa-solid fa-plus"></i> Thêm giảm giá
    </div>
  </a>
</div>
<table class="table table-hover table-bordered table-responsive-xl">
  <thead>
    <th style="width: 50px">STT</th>
    <th>Tên mã giảm giá</th>
    <th>Mã giảm giá</th>
    <th>Số lượng</th>
    <th>Số giảm giá</th>
    <th>Cập nhật</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\Sale\SaleHelper::sale($sales) !!}
  </tbody>
</table>
{!! $sales->links('pagination::bootstrap-5') !!}
@endsection
