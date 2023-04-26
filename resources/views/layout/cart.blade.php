<ul>
  <li class="empty-product">
    <!-- Sản phẩm chưa thêm -->
    <img src="/template/img/empty_cart.png" alt="empty_cart">
    <p>Giỏ hàng chưa có sản phẩm nào</p>
    <a href="product" class="empty-product-link">Mua hàng ngay</a>
  </li>
  @foreach ($products as $key => $productcart)
  <li class="menu-header-shop-product d-flex justify-content-between mb-4">
    <div class="product-img">
      <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
    </div>
    <div class="product-info ms-2" style="width:200px">
      <h6 class="mb-0">{{ $product->name }}</h6>
      <div class="d-flex justify-content-between">
        <p class="mb-0">x{{ $carts[$product->id] }}</p>
        <p class="mb-0">{{ number_format($product->price - $product->price * $product->promotion->sale, 0, '.', '.') }}đ</p>
      </div>
    </div>
  </li>
  @endforeach
  {{-- <!-- <li class="menu-header-shop-product d-flex justify-content-between mb-4">
    <div class="product-img">
      <img
        src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D"
        alt="">
    </div>
    <div class="product-info ms-2">
      <h6 class="mb-0">Laptop HP Pavilion X360 14-ek0059TU</h6>
      <div class="d-flex justify-content-between">
        <p class="mb-0">x1</p>
        <p class="mb-0">2000000đ</p>
      </div>
    </div>
  </li>
  <li class="menu-header-shop-product d-flex justify-content-between mb-4">
    <div class="product-img">
      <img
        src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D"
        alt="">
    </div>
    <div class="product-info ms-2">
      <h6 class="mb-0">Laptop HP Pavilion X360 14-ek0059TU</h6>
      <div class="d-flex justify-content-between">
        <p class="mb-0">x1</p>
        <p class="mb-0">2000000đ</p>
      </div>
    </div>
  </li>
  <li class="menu-header-shop-product d-flex justify-content-between mb-4">
    <div class="product-img">
      <img
        src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D"
        alt="">
    </div>
    <div class="product-info ms-2">
      <h6 class="mb-0">Laptop HP Pavilion X360 14-ek0059TU</h6>
      <div class="d-flex justify-content-between">
        <p class="mb-0">x1</p>
        <p class="mb-0">2000000đ</p>
      </div>
    </div>
  </li>
  <li class="menu-header-shop-product d-flex justify-content-between mb-4">
    <div class="product-img">
      <img
        src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D"
        alt="">
    </div>
    <div class="product-info ms-2">
      <h6 class="mb-0">Laptop HP Pavilion X360 14-ek0059TU</h6>
      <div class="d-flex justify-content-between">
        <p class="mb-0">x1</p>
        <p class="mb-0">2000000đ</p>
      </div>
    </div>
  </li> --> --}}

  <li class="sticky-bottom bg-white menu-header-shop-bill border-top border-1 d-none">
    <div class=" d-flex justify-content-between mb-3">
      <h6 class="mb-0 mt-1">Tổng tiền: </h6>
      <p class="mb-0 mt-1">6000000đ</p>
    </div>
    <a href="cart">Xem giỏ hàng</a>
  </li>
</ul>
