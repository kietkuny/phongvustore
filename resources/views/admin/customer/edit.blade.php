@extends('admin.main')

@section('content')
<form action="" method="post">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-12">
        <label for="name">Tên khách hàng</label>
        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Nhập tên khách hàng">
      </div>
      <div class="form-group col-md-6">
        <label for="name">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" placeholder="Nhập số điện thoại khách hàng">
      </div>
      <div class="form-group col-md-6">
        <label for="name">Số nhà</label>
        <input type="text" class="form-control" name="housenumber" value="{{ $customer->housenumber }}" placeholder="Nhập số nhà khách hàng">
      </div>
      <div class="form-group col-md-6">
        <label>Tỉnh thành</label>
        <select name="province_id" class="form-control form-select" id="province-select">
          <option value="">Tỉnh</option>
          @foreach ($provinces as $province)
          <option value="{{ $province->id }}" {{ $customer->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label>Thành phố ( Quận, Huyện )</label>
        <select name="city_id" class="form-control form-select" id="city-select">
          <option value="">Thành phố</option>
          @foreach ($cities as $city)
          <option value="{{ $city->id }}" {{ $customer->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $customer->email }}" placeholder="Nhập email khách hàng">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Mật khẩu</label>
        <input type="text" class="form-control" name="password" value="{{ $customer->password }}" placeholder="Nhập mật khẩu khách hàng">
      </div>
      <div class="form-group col-12 d-flex align-items-center">
        <label for="password" class="mb-0">Hiển thị thêm</label>
        <input class="ms-3" type="checkbox" id="checkCus">
      </div>
      <div class="form-group col-md-6" id="status">
        <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="1" type="radio" id="active" name="status" {{ $customer->status == 1 ? 'checked' : '' }}>
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="0" type="radio" id="no_active" name="status" {{ $customer->status == 0 ? 'checked' : '' }}>
          <label for="no_active" class="custom-control-label">Không</label>
        </div>
      </div>
      
      <div class="form-group col-md-6" id="token">
        <label>Token</label>
        <input type="text" class="form-control" name="token" value="{{ $customer->token }}">
      </div>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Cập Nhật khách hàng</button>
    <a href="/admin/customers/list" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>

@endsection

