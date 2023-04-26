<section class="main-menu">
  <div class="container">
    <h2 class="mb-5"><b>Các sản phẩm bán chạy</b></h2>
    <div class="menu-product">
      @foreach ($product_types as $key => $product_type) 
      <div class="menu-product-shop" data-aos="fade-up">
        <img src="{{ $product_type->thumb }}" alt="{{ $product_type->name }}">
        <div class="menu-product-info">
          <h3 style="color: #FFF;">{{ $product_type->name }}
          </h3>
          <div class="my-4">
            <form action="/product" role="search">
              <input type="hidden" name="search" value="{{ $product_type->name }}">
              <button type="submit">Xem thêm</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      
      {{-- <div class="menu-product-shop" data-aos="fade-up">
        <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=8E4SsR4DpJEAX8oa-un&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDWj13_2Rv2iJrV99Ubc2aoOwmTVlQ7ospQ7vzNPBC5Iw&oe=643C577D" alt="">
        <div class="menu-product-info">
          <h3 style="color: #FFF;">Điện thoại
          </h3>
          <div class="my-4">
            <a href="#">Xem thêm</a>
          </div>
        </div>
      </div>
      <div class="menu-product-shop" data-aos="fade-up">
        <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/274240042_1300022553850439_3655262230298493384_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=1pJjCVbEsVcAX-ezmtW&_nc_ht=scontent.fdad8-1.fna&oh=00_AfB8DLvSJ086MCRd0GwrTp3BLnfuX36D859zWme0HJdbPw&oe=6431EDED" alt="">
        <div class="menu-product-info">
          <h3 style="color: #FFF;">Tai nghe
          </h3>
          <div class="my-4">
            <a href="#">Xem thêm</a>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</section>