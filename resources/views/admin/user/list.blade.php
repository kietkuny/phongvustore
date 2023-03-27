@extends('admin.main')

@section('content')
<div class="text-right m-2">
  <a href="/admin/users/add" class="btn-sm btn btn-success text-decoration-none">
    <div class="p-1">
      <i class="fa-solid fa-plus"></i> Thêm nhân viên
    </div>
  </a>
</div>
<table class="table table-hover table-bordered">
  <thead>
    <th style="width: 50px">ID</th>
    <th>Tên nhân viên</th>
    <th>Loại nhân viên</th>
    <th>CCCD</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Ảnh</th>
    <th>Cập nhật</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\User\UserHelper::user($users) !!}
  </tbody>
</table>
{!! $users->links('pagination::bootstrap-5') !!}
@endsection
