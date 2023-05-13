@extends('admin.main')

@section('content')
<div class="row d-flex justify-content-md-between mb-3">
  <form method="GET" action="/admin/customers/list" class="input-group rounded col-md-8 w-auto align-items-center">
    <div class="form-outline">
      <input type="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" name="search" id="search-customer"/>
    </div>
    <button type="submit" type="button" class="btn btn-dark">
        <i class="fas fa-search"></i>
    </button>
  </form>
</div>
<table class="table table-hover table-bordered table-responsive-md">
  <thead>
    <th style="width: 50px">ID</th>
    <th>Tên khách hàng</th>
    <th>SĐT</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Cập nhật</th>
    <th style="width: 100px;"></th>
  </thead>
  <tbody>
    {!! \App\Helpers\customer\CustomerHelper::customer($customers) !!}
  </tbody>
</table>
{!! $customers->links('pagination::bootstrap-5') !!}
@endsection
