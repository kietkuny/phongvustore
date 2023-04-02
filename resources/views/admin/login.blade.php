<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
  <style>
    #loading {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .loader {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      display: inline-block;
      position: relative;
      border: 3px solid;
      border-color: #FFF #FFF transparent transparent;
      box-sizing: border-box;
      animation: rotation 1s linear infinite;
    }

    .loader::after,
    .loader::before {
      content: '';
      box-sizing: border-box;
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      margin: auto;
      border: 3px solid;
      border-color: transparent transparent #A5F1E9 #A5F1E9;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      box-sizing: border-box;
      animation: rotationBack 0.5s linear infinite;
      transform-origin: center center;
    }

    .loader::before {
      width: 32px;
      height: 32px;
      border-color: #FFF #FFF transparent transparent;
      animation: rotation 1.5s linear infinite;
    }

    @keyframes rotation {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    @keyframes rotationBack {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(-360deg);
      }
    }

  </style>
</head>

<body>
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
  <div id="loading"><span class="loader"></span></div>
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
