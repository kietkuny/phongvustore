@extends('admin.main')

@section('content')
<div class="text-right m-2">
  <a href="/admin/promotions/add" class="btn-sm btn btn-success text-decoration-none">
    <div class="p-1">
      <i class="fa-solid fa-plus"></i> Thêm thương hiệu
    </div>
  </a>
</div>
<table class="table table-hover table-bordered">
  <thead>
    <th style="width: 50px">ID</th>
    <th>Tên khuyến mãi</th>
    <th>Số Khuyến mãi</th>
    <th>Cập nhật</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\Promotion\PromotionHelper::promotion($promotions) !!}
  </tbody>
</table>
{!! $promotions->links('pagination::bootstrap-5') !!}
@endsection
