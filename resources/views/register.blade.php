@extends('layout.main')
@section('main')
<section class="main-register">
  <div class="container">
    <h2 class="mb-3 text-center">Đăng ký</h2>
    <form action="/register" method="POST" class="mx-auto">
      @include('alert')
      @csrf
      <div class="input-box">
        <input type="text" name="name" required='required' autocomplete="off">
        <span>Họ và tên</span>
      </div>
      <div class="input-box">
        <input type="number" name="phone" required='required' autocomplete="off">
        <span>Điện thoại</span>
      </div>
      <div class="input-box">
        <input type="text" name="housenumber" required='required' autocomplete="off">
        <span>Số nhà</span>
      </div>
      <div class="input-box">
        <select class="form-select" id="province-select" name="province_id" required>
          <option value="">Tỉnh</option>
          @foreach ($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="input-box">
        <select name="city_id" class="form-select" id="city-select" required>
          <option value="">Thành phố</option>
        </select>
      </div>
      <div class="input-box">
        <input type="text" name="email" required='required' autocomplete="off">
        <span>Email</span>
      </div>
      <div class="input-box">
        <input type="password" name="password" required='required' autocomplete="off">
        <span>Mật khẩu</span>
        <div class="show-password" style="position: absolute; cursor: pointer; ; right: 14px; bottom: 10px;">
          <i class="fa-regular fa-eye-slash"></i>
        </div>
      </div>
      <div class="input-box">
        <input type="password" name="confirm_password" required='required' autocomplete="off">
        <span>Nhập lại mật khẩu</span>
        <div class="show-password" style="position: absolute; cursor: pointer; ; right: 14px; bottom: 10px;">
          <i class="fa-regular fa-eye-slash"></i>
        </div>
      </div>
      <button type="submit" class="btn-submit submit-register" id="send-verification-code">Đăng ký</button>
    </form>
  </div>
</section>
@endsection
