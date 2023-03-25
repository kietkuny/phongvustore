<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
  <style>
    .login-admin{
      background: -webkit-linear-gradient( #DFFFD8, #B4E4FF)!important;
      -webkit-background-clip: text!important;;
      -webkit-text-fill-color: transparent!important;;
    }

    body {
      background: linear-gradient(to right, #06283D, #06283D);
    }

    .card-body {
      background: linear-gradient(to right, #DFFFD8, #B4E4FF);
    }

    .btn-login {
      border-radius: 5px;
      border: none;
      background-image: linear-gradient(to right, #00dfc4, #00fc97, #08bff1);
      cursor: pointer;
      color: #fff;
      background-size: 200%;
      transition: .5s;
    }

    .btn-login:hover {
      color: #e9e9e9;
      background-position: right;
    }

  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <h1><b class="login-admin">Admin</b></h1>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        @include('admin.alert')
        <form action="/admin/login/store" method="post" class="mt-3">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text bg-white">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
            <div class="input-group-append">
              <div class="input-group-text bg-white">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-7">
              <div class="icheck-info">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                  Nhớ tài khoản
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-5">
              <button type="submit" class="btn btn-login btn-block">Đăng nhập</button>
            </div>
            <!-- /.col -->
          </div>
          @csrf
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  @include('admin.footer')
</body>

</html>
