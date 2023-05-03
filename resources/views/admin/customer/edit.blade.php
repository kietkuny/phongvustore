@extends('admin.main')

@section('content')
<form action="" method="post">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-12">
        <label for="name">Tên khách hàng</label>
        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Nhập tên nhân viên">
      </div>
      <div class="form-group col-md-6">
        <label for="name">Số điện thoại</label>
        <input type="text" class="form-control" name="cccd" value="{{ $customer->cccd }}" placeholder="Nhập CCCD nhân viên">
      </div>
      <div class="form-group col-md-6">
        <label for="name">Số nhà</label>
        <input type="text" class="form-control" name="cccd" value="{{ $customer->cccd }}" placeholder="Nhập CCCD nhân viên">
      </div>
      <div class="form-group col-md-6">
        <label>Thành phố ( Quận, Huyện )</label>
        <select name="city_id" class="form-control form-select">
          @foreach ($cities as $city)
          <option value="{{ $city->id }}" {{ $customer->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label>Tỉnh thành</label>
        <select name="usertype_id" class="form-control form-select">
          @foreach ($usertypes as $usertype)
          <option value="{{ $usertype->id }}" {{ $user->usertype_id == $usertype->id ? 'selected' : '' }}>{{ $usertype->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="name">CCCD</label>
        <input type="text" class="form-control" name="cccd" value="{{ $user->cccd }}" placeholder="Nhập CCCD nhân viên">
      </div>
      <div class="form-group col-md-6">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Nhập sđt nhân viên">
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Nhập email nhân viên">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Mật khẩu</label>
        <input type="text" class="form-control" name="password" value="{{ $user->password }}" placeholder="Nhập mật khẩu nhân viên">
      </div>
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

