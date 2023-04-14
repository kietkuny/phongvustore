<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#06283D; position: fixed;">
  <!-- Brand Logo -->
  <a href="/admin/" class="text-decoration-none brand-link">
    <img src="/template/admin/dist/img/logoPV.svg" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Phong Vũ</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- <li class="nav-item pagination">
          <a href="/admin/menus/list" class="nav-link {{ request()->is('admin/menus/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fas fa-bars"></i>
            <p>Danh mục</p>
          </a>
        </li> --}}
        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li> --}}
        <li class="nav-item pagination">
          <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-solid fa-house-chimney"></i>
            <p>Trang chủ</p>
          </a>
        </li>
        <li class="nav-item pagination">
          <a href="/admin/trademarks/list" class="nav-link {{ request()->is('admin/trademarks/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-solid fa-trademark"></i>
            <p>Thương hiệu</p>
          </a>
        </li>
        <li class="nav-item pagination">
          <a href="/admin/promotions/list" class="nav-link {{ request()->is('admin/promotions/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-solid fa-percent"></i>
            <p>Khuyến mãi</p>
          </a>
        </li>
        <li class="nav-item pagination">
          <a href="/admin/product_types/list" class="nav-link {{ request()->is('admin/product_types/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-brands fa-shopify"></i>
            <p>Loại sản phẩm</p>
          </a>
        </li>
        <li class="nav-item pagination">
          <a href="/admin/products/list" class="nav-link {{ request()->is('admin/products/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-solid fa-laptop-mobile"></i>
            <p>Sản phẩm</p>
          </a>
        </li>
        <li class="nav-item pagination">
          <a href="/admin/customers/list" class="nav-link {{ request()->is('admin/customers/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>Khách hàng</p>
          </a>
        </li>
        <li class="nav-item pagination">
          <a href="/admin/orders/list" class="nav-link {{ request()->is('admin/orders/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-sharp fa-regular fa-cart-shopping"></i>
            <p>Đơn hàng</p>
          </a>
        </li>
        <li class="nav-item pagination">
          <a href="/admin/messages/list" class="nav-link {{ request()->is('admin/messages/*') ? 'active-sidebar' : '' }}">
            <i class="nav-icon fa-regular fa-comments"></i>
            <p>Tin nhắn</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
</aside>
