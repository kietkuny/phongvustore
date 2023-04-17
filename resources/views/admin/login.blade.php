<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
</head>

<body>
  <div id="loading"><span class="loader"></span></div>
  <section class="login-admin">
    <div class="form-box">
      <div class="form-value">
        <form action="/admin/login/store" method="post" class="form-admin">
          <h2>Admin Login</h2>
          {{-- <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="email" required>
            <label for="">Password</label>
          </div> --}}
          @include('admin.alert')
          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" name="email" required autocomplete="off">
            <label for="">Email</label>
          </div>
          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" required autocomplete="off">
            <label for="">Password</label>
          </div>
          <div class="forget">
            <label>Remember Me
              <input type="checkbox">
              <span class="checkmark"></span>
            </label>
            <a href="#">Forget Password</a>
          </div>
          <button type="submit" class="submit-admin">Log in</button>
          <div class="register">
            <p>Don't have a account <a href="#">Register</a></p>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </section>
  {{-- <div id="loading">
    <div class="spinner-border text-info" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <p>Đang đăng nhập...</p>
  </div> --}}
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    $(function() {
      $('#loading').hide();
      $('.submit-admin').click(function() {
        let email = $('input[name="email"]').val().trim();
        let password = $('input[name="password"]').val().trim();
        if (email == '') {
          alert('Email không được để trống!');
          return false;
        }
        if (password == '') {
          alert('Password không được để trống!');
          return false;
        }
        $('#loading').show();
      });
    });

  </script>
  @include('admin.footer')
</body>

</html>
