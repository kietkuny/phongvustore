@extends('admin.main')

@section('content')
<form action="" method="post">
  <div class="card-body">

    <div class="form-group">
      <label for="name">Tên loại sản phẩm</label>
      <input type="text" class="form-control" name="name" placeholder="Nhập tên loại sản phẩm">
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-success">Tạo loại sản phẩm</button>
    <a href="/admin/product_types/list" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>
@endsection
