<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')
  <style>
    .active-sidebar {
      border-radius: 50px 0 0 50px !important;
      background: #DFFFD8 !important;
      min-width: 268px !important;
      color: black !important;
      position: relative !important;
      display: flex !important;
      align-items: center !important;
    }

    /* .active-sidebar::before{
      content: ''!important;
      position: absolute!important;
      background: #DFFFD8!important;
      width: 50px!important;
      height: 50px!important;
      right: 0!important;
      transform: rotate(45deg)!important;
      z-index: -1!important;
    } */

    .content-img {
      background: linear-gradient(to right, #DFFFD8, #B4E4FF)
    }

    .main-sidebar {
      transition: 0.5s;
    }

    .avatar {
      position: relative;
      margin-right: 60px;
      margin-left: auto;
    }

    .avatar .avatar-link {
      text-decoration: none;
      color: white;
      transition: 0.2s;
    }

    .avatar .avatar-link:hover {
      color: lightblue;
    }

    .avatar ul {
      padding: 0;
      display: none;
      list-style: none;
      position: absolute;
      left: 10px;
      width: 130px;
      top: 40px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      background: #06283D;
    }

    .avatar ul li {
      padding: 10px;
    }

    .avatar ul a {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: white;
    }

    .avatar ul a:hover {
      color: lightblue;
    }

    .avatar ul i {
      width: 30px;
      text-align: center;
    }

    .avatar i {
      transform: rotate(0);
      transition: all 0.3s;
    }

    .avatar.show .fa-chevron-down {
      transform: rotate(-180deg);
      transition: all 0.3s;
    }

    .avatar.show .avatar-link {
      color: lightblue;
    }

    .avatar.show ul {
      display: block;
    }
    
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top" style="background:#06283D">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="text-light nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
      <!-- Sidebar user (optional) -->
      <div class="avatar ms-auto">
        <div class="avatar-link user-panel d-flex align-items-center" role="button">
          <div class="image mr-2 d-flex align-items-center">
            <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            <b class="ml-2">{{ Auth::user()->name }}</b>
          </div>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <ul class="avatar-detail">
          <li><a href="#"><i class="fa-solid fa-info"></i> Chi tiết</a></li>
          <li>
            <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
          </li>
        </ul>
      </div>



      {{-- <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul> --}}
    </nav>
    <!-- /.navbar -->

    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper content-img" style="min-height: 92.5vh">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @include('admin.alert')
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-info border-info mt-3">
                <div class="card-header">
                  <h3 class="card-title pt-2">{{ $title }}</h3>
                </div>

                <div class="p-3">
                  @yield('content')
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  @include('admin.footer')
</body>

</html>
