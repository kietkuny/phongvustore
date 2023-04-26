<!DOCTYPE html>
<html lang="en">

<head>
  @include('login.head')
</head>

<body>
  @include('layout.header')
  <main>
    @yield('login')
  </main>
  @include('login.footer')
</body>

</html>