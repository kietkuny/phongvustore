@extends('layout.main')
@section('main')
<section class="main-info">
  <div class="container">
    <h2 class="mb-3">Thông tin người dùng</h2>
    @include('alert')
    <form action="" method="POST">
      @csrf
      <div class="row">
        <div class="col-lg-6">
          <table>
            <tr>
              <td>Email:</td>
              <td>
                <div class="input-box">
                  <input type="text" value="{{ $customer->email }}" disabled class="mb-0 alert alert-info">
                </div>
              </td>
            </tr>
            <tr>
              <td>Mật khẩu:</td>
              <td>
                <div class="input-box">
                  <input type="password" name="password" value="{{ $customer->password }}">
                </div>
              </td>
            </tr>
            <tr>
              <td>Họ và tên:</td>
              <td>
                <div class="input-box">
                  <input type="text" name="name" value="{{ $customer->name }}">
                </div>
              </td>
            </tr>
            <tr>
              <td>Số điện thoại:</td>
              <td>
                <div class="input-box">
                  <input type="text" name="phone" value="{{ $customer->phone }}">
                </div>
              </td>
            </tr>
            <tr>
              <td>Số nhà:</td>
              <td>
                <div class="input-box">
                  <input type="text" name="housenumber" value="{{ $customer->housenumber }}">
                </div>
              </td>
            </tr>
            <tr>
              <td>Tỉnh:</td>
              <td>
                <div class="input-box">
                  <select name="province_id" class="form-control form-select" id="province-select">
                    <option value="">Tỉnh</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->id }}" {{ $customer->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                    @endforeach
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <td>Thành phố:</td>
              <td>
                <div class="input-box">
                  <select name="city_id" class="form-control form-select" id="city-select">
                    <option value="">Thành phố</option>
                    <option value="{{ $customer->city_id }}" selected style="display:none">{{ $customer->city->name }}</option>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <div class="mt-3">
                  <button type="submit" class="ms-4 btn btn-primary">Cập nhật</button>
                  <a onclick="history.back(-1)" class="btn btn-secondary">Quay lại</a>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-6 d-lg-flex align-items-center justify-content-end d-none info-img">
          <img class="img-fluid" src="/template/img/info.svg" width="90%" alt="">
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
