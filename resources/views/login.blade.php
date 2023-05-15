@extends('layout.main')
@section('main')

<section class="main-login">
  <div class="container">
    <h2 class="mb-3 text-center">Đăng nhập</h2>
    <form action="/login" method="POST" class="mx-auto">
      @csrf
      @include('alert')
      <div class="input-box">
        <input type="text" name="email" required='required'>
        <span>Email</span>
      </div>
      <div class="input-box">
        <input type="password" name="password" required='required'>
        <span>Mật khẩu</span>
      </div>
      <div class="w-100 d-flex justify-content-between my-2">
        <div>
          <input type="checkbox" name="remember"> Nhớ tài khoản
        </div>
        <a href="/forget-password">Quên mật khẩu ?</a>
      </div>
      <button type="submit" class="btn-submit">Đăng nhập</button>
      <div class="my-2">Bạn chưa có tài khoản ? <a href="/register">Đăng ký</a></div>
    </form>
  </div>
</section>

@endsection