@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
  <div class="card-body">

    <div class="form-group">
      <label for="name">Tên nhân viên</label>
      <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nhập tên nhân viên">
    </div>
    <div class="form-group">
      <label for="usertype_id">Loại nhân viên</label>
      <select name="usertype_id" class="form-control form-select">
        @foreach ($usertypes as $usertype)
        <option value="{{ $usertype->id }}" {{ $user->usertype_id == $usertype->id ? 'selected' : '' }}>{{ $usertype->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="name">CCCD</label>
      <input type="text" class="form-control" name="cccd" value="{{ $user->cccd }}" placeholder="Nhập CCCD nhân viên">
    </div>
    <div class="form-group">
      <label for="phone">Số điện thoại</label>
      <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Nhập sđt nhân viên">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Nhập email nhân viên">
    </div>
    <div class="form-group">
      <label for="password">Mật khẩu</label>
      <input type="text" class="form-control" name="password" value="{{ $user->password }}" placeholder="Nhập mật khẩu nhân viên">
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Cập Nhật nhân viên</button>
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
