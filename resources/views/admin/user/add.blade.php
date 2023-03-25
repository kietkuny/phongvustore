@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
  <div class="card-body">

    <div class="form-group">
      <label for="name">Tên nhân viên</label>
      <input type="text" class="form-control" name="name" placeholder="Nhập tên loại nhân viên">
    </div>
    <div class="form-group">
      <label for="usertype_id">Loại nhân viên</label>
      <select name="usertype_id" class="form-control form-select">
        @foreach ($usertypes as $usertype)
          <option value="{{ $usertype->id }}">{{ $usertype->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="name">CCCD</label>
      <input type="text" class="form-control" name="cccd" placeholder="Nhập CCCD nhân viên">
    </div>
    <div class="form-group">
      <label for="phone">Số điện thoại</label>
      <input type="text" class="form-control" name="phone" placeholder="Nhập sđt nhân viên">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Nhập email nhân viên">
    </div>
    <div class="form-group">
      <label for="password">Mật khẩu</label>
      <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu nhân viên">
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-success">Tạo loại nhân viên</button>
    <a href="/admin/users/list" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>
@endsection


@section('footer')
<script>
  CKEDITOR.replace('content')

</script>
@endsection
