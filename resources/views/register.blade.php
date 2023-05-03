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
        <select name="province_id" class="form-select" id="province-select" required>
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
      {{-- <div class="d-flex justify-content-between align-items-center w-100">
        <div class="input-box" style="min-width: 250px;">
          <input type="text" name="gmail_verification_token" id="gmail_verification_token" required='required'>
          <span>Nhập mã xác thực</span>
        </div>
        <button class="btn btn-secondary" style="height: fit-content;" id="send-verification-code">Nhận mã</button>
      </div> --}}
      <div class="input-box">
        <input type="password" name="password" required='required' autocomplete="off">
        <span>Mật khẩu</span>
      </div>
      <button type="submit" class="btn-submit" id="send-verification-code">Đăng ký</button>
    </form>
  </div>
</section>
@endsection
