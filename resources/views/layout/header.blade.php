<header class="w-100">
  <div class="container">
    <nav class="header-menu d-flex justify-content-between align-items-center">
      <a href="/" class="nav-link d-flex align-items-center header-menu-logo">
        <div><img src="/template/img/logoPV.svg" alt=""> </div>
        <h4 class="mb-0 ms-1 d-block d-md-none"><b>Phong Vũ</b></h4>
      </a>
      <div class="d-md-none d-block hamburger-menu">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3 d-md-none d-block"></div>
        <div class="bar4"></div>
      </div>
      <div class="menu-header d-md-flex  menu-header-close align-items-center">
        <ul class="menu-header-item d-md-flex align-items-center d-block me-auto mb-2 mb-md-0">
          {!! App\Helpers\Helper::menus($menus) !!}
        </ul>
        <div class="d-md-flex d-block align-items-center">
          <form class="menu-header-form d-flex mb-4 mb-md-0" role="search" action="/product">
            <div class="w-100">
              <div class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></div>
              <input type="search" class="input-search input-search-ajax" id="search-menu" placeholder="Tìm kiếm" name="search" autocomplete="off">
            </div>
            <div class="list-search"></div>
            {{-- {{ csrf_field() }} --}}
          </form>
          <div class="menu-header-shop ms-md-4 mt-md-0 mt-3">
            <a href="/carts" style="position: relative; z-index: 10;" class="d-flex align-items-center">
              <i class="fa-sharp fa-regular fa-cart-shopping"></i> <span class="ms-3">Giỏ
                hàng</span>
              <div class="menu-header-shop-num">3</div>
            </a>
            {{-- @include('layout.cart') --}}
          </div>
          <a href="#" class="menu-header-login ms-md-4 ms-2 d-flex align-items-center mt-md-0 mt-3">
            <i class="fa-solid fa-user"></i> <span class="ms-3"> Đăng nhập</span>
          </a>
        </div>
      </div>
    </nav>
  </div>
</header>
