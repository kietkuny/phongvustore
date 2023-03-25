@extends('admin.main')

@section('content')
<div class="text-right m-2">
  <a href="/admin/menus/add" class="btn-sm btn btn-success text-decoration-none">
    <div class="p-1">
      <i class="fa-solid fa-plus"></i> Thêm Danh Mục
    </div>
  </a>
</div>
<table class="table table-hover table-bordered">
  <thead>
    <th style="width: 50px">ID</th>
    <th>Name</th>
    <th style="">Active</th>
    <th>Update</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\Helper::menu($menus) !!}
  </tbody>
</table>
@endsection
