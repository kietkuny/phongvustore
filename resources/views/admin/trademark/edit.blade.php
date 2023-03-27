@extends('admin.main')

@section('content')
<form action="" method="post">
  <div class="card-body">

    <div class="form-group">
      <label for="name">Tên thương hiệu</label>
      <input type="text" class="form-control" name="name" value="{{ $trademark->name }}"  placeholder="Nhập tên thương hiệu">
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Cập Nhật thương hiệu</button>
    <a href="/admin/trademarks/list" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>

@endsection

