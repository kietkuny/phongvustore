@extends('admin.main')

@section('content')
<form action="" method="post">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-6">
        <label>Tên mã giảm giá</label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên mã giảm giá">
      </div>
      <div class="form-group col-md-6">
        <label>Mã giảm giá</label>
        <input type="text" class="form-control" name="token" placeholder="Nhập mã giảm giá">
      </div>
      <div class="form-group col-md-6">
        <label>Số lượng mã giảm giá</label>
        <input type="number" class="form-control" name="quantity" placeholder="Nhập số lượng mã giảm giá">
      </div>
      <div class="form-group col-md-6">
        <label>Số giảm giá</label>
        <input type="text" class="form-control" name="sale" placeholder="Nhập số mã giảm giá">
      </div>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-success">Tạo mã giảm giá</button>
    <a href="/admin/sales/list" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>
@endsection
