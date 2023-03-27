@extends('admin.main')

@section('content')
<div class="text-right m-2">
  <a href="/admin/sliders/add" class="btn-sm btn btn-success text-decoration-none">
    <div class="p-1">
      <i class="fa-solid fa-plus"></i> Thêm slider
    </div>
  </a>
</div>
<table class="table table-hover table-bordered">
  <thead>
    <th style="width: 50px">ID</th>
    <th>Tên</th>
    <th>Đường dẫn</th>
    <th>Ảnh</th>
    <th>Sắp xếp</th>
    <th>Kích hoạt</th>
    <th>Cập nhật</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\Slider\SliderHelper::slider($sliders) !!}
  </tbody>
</table>
{!! $sliders->links('pagination::bootstrap-5') !!}
@endsection
