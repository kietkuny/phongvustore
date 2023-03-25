@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="name">Tên nhân viên</label>
        <input type="text" class="form-control" name="name" disabled value="{{ $user->name }}">
      </div>
      <div class="form-group col-md-6">
        <label for="usertype_id">Loại nhân viên</label>
        <input type="text" class="form-control" disabled value="{{ $user->userType->name }}">
      </div>
      <div class="form-group col-md-6">
        <label for="name">CCCD</label>
        <input type="text" class="form-control" name="cccd" disabled value="{{ $user->cccd }}">
      </div>
      <div class="form-group col-md-6">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" disabled value="{{ $user->phone }}">
      </div>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" disabled value="{{ $user->email }}">
    </div>
    <div class="form-group">
      <label for="password">Mật khẩu</label>
      <input type="text" class="form-control" name="password" disabled value="{{ $user->password }}">
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <a href="/admin" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>
@endsection


@section('footer')
<script>
  CKEDITOR.replace('content')

</script>
@endsection
