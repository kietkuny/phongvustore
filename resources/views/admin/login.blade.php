<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
</head>

<body>
  <section class="login-admin">
    <div class="form-box">
      <div class="form-value">
        
        <form action="/admin/login/store" method="post">
          <h2>Admin Login</h2>
          {{-- <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="email" required>
            <label for="">Password</label>
          </div> --}}
          @include('admin.alert')
          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" name="email" required>
            <label for="">Email</label>
          </div>
          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" required>
            <label for="">Password</label>
          </div>
          <div class="forget">
            <label>Remember Me
              <input type="checkbox">
              <span class="checkmark"></span>
            </label>
            <a href="#">Forget Password</a>
          </div>
          <button type="submit">Log in</button>
          <div class="register">
            <p>Don't have a account <a href="#">Register</a></p>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  @include('admin.footer')
</body>

</html>
