<!DOCTYPE html>
<html lang="en">

<head>
  @include('head')
</head>

<body>
  <div id="loading"><span class="loader"></span></div>
  @include('header')
  <main>
    <section class="slide overflow-hidden">
      {{-- <div class="slide-banner">
        <div class="slide-item">
          <div class="slide-item-img d-flex align-items-center justify-content-center">
            <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            <div class="opacity-img"></div>
          </div>
          <div class="slide-item-content" data-aos="fade-down">
            <div class="container">
              <div class="px-5">
                <h1>Máy Tính</h1>
                <p>Máy tính Acer Nitro 5</p>
                <div>
                  <a href="#">
                    Xem thêm
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="slide-item">
          <div class="slide-item-img d-flex align-items-center justify-content-center">
            <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=8E4SsR4DpJEAX8oa-un&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDWj13_2Rv2iJrV99Ubc2aoOwmTVlQ7ospQ7vzNPBC5Iw&oe=643C577D" alt="">
            <div class="opacity-img"></div>
          </div>
          <div class="slide-item-content" data-aos="fade-down">
            <div class="container">
              <div class="px-5">
                <h1>Điện thoại</h1>
                <p>Điện thoại ip 14 promax</p>
                <div>
                  <a href="#">
                    Xem thêm
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <div class="slide-banner">
        {!! App\Helpers\Slider\SliderHelper::sliders($sliders) !!}
      </div>
    </section>
    <section class="main-menu">
      <div class="container">
        <h2 class="mb-5"><b>Các sản phẩm bán chạy</b></h2>
        <div class="menu-product">
          <div class="menu-product-shop" data-aos="fade-up">
            <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            <div class="menu-product-info">
              <h3 style="color: #FFF;">Máy tính
              </h3>
              <div class="my-4">
                <a href="#">Xem thêm</a>
              </div>
            </div>
          </div>
          <div class="menu-product-shop" data-aos="fade-up">
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
          </div>
        </div>
      </div>
    </section>
    <section class="main-trademark">
      <div class="container">
        <h2 class="mb-5"><b>Thương hiệu nổi tiếng</b></h2>
        <div class="slide-trademark" data-aos="fade-up">
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad3-4.fna.fbcdn.net/v/t39.30808-6/317303056_1497120020807357_513397513687826842_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=-PFC080otcUAX-a_1xN&_nc_ht=scontent.fdad3-4.fna&oh=00_AfDzX4NVl-PfmmABzMi168xHKwrY6CliAbS6RT0h8qzdEA&oe=64325C40" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=sfcJcWj8T0YAX8xOj0d&_nc_ht=scontent.fdad3-1.fna&oh=00_AfCCQTuOogewdEL7wijdi_VTxtqQ3rQGAicgSHyXQK8NuA&oe=6432743D" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad3-5.fna.fbcdn.net/v/t39.30808-6/335136877_916041216269531_799706221786857461_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=bfT53TXTBq4AX-9ekkb&_nc_ht=scontent.fdad3-5.fna&oh=00_AfAf5lLhFI9qMXQYEY38G-hPHJqeBm55uBhxy39jHF1YYA&oe=6433D5BD" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad3-5.fna.fbcdn.net/v/t39.30808-6/335136877_916041216269531_799706221786857461_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=bfT53TXTBq4AX-9ekkb&_nc_ht=scontent.fdad3-5.fna&oh=00_AfAf5lLhFI9qMXQYEY38G-hPHJqeBm55uBhxy39jHF1YYA&oe=6433D5BD" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad3-4.fna.fbcdn.net/v/t39.30808-6/317303056_1497120020807357_513397513687826842_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=-PFC080otcUAX-a_1xN&_nc_ht=scontent.fdad3-4.fna&oh=00_AfDzX4NVl-PfmmABzMi168xHKwrY6CliAbS6RT0h8qzdEA&oe=64325C40" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=sfcJcWj8T0YAX8xOj0d&_nc_ht=scontent.fdad3-1.fna&oh=00_AfCCQTuOogewdEL7wijdi_VTxtqQ3rQGAicgSHyXQK8NuA&oe=6432743D" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
          <div class="trademark">
            <a href="#" class="text-center">
              <div class="trademark-img">
                <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
              </div>
              <p>Asus</p>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="main-product">
      <div class="container">
        <h2 class="mb-5"><b>Sản phẩm cửa hàng</b></h2>
        {{-- <div class="product">
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">
                  Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)
                </div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=8E4SsR4DpJEAX8oa-un&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDWj13_2Rv2iJrV99Ubc2aoOwmTVlQ7ospQ7vzNPBC5Iw&oe=643C577D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>ASUS</b></div>
                <div class="name">
                  Laptop ASUS TUF Gaming FA506ICB-HN355W (Ryzen 5 4600H/RAM 8GB/RTX 3050/512GB SSD/ Windows)
                </div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=8E4SsR4DpJEAX8oa-un&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDWj13_2Rv2iJrV99Ubc2aoOwmTVlQ7ospQ7vzNPBC5Iw&oe=643C577D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>ASUS</b></div>
                <div class="name">
                  Laptop ASUS TUF Gaming FA506ICB-HN355W (Ryzen 5 4600H/RAM 8GB/RTX 3050/512GB SSD/ Windows)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=8E4SsR4DpJEAX8oa-un&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDWj13_2Rv2iJrV99Ubc2aoOwmTVlQ7ospQ7vzNPBC5Iw&oe=643C577D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>ASUS</b></div>
                <div class="name">
                  Laptop ASUS TUF Gaming FA506ICB-HN355W (Ryzen 5 4600H/RAM 8GB/RTX 3050/512GB SSD/ Windows)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/317235528_1497119990807360_2360806660621200035_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=8E4SsR4DpJEAX8oa-un&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDWj13_2Rv2iJrV99Ubc2aoOwmTVlQ7ospQ7vzNPBC5Iw&oe=643C577D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>ASUS</b></div>
                <div class="name">
                  Laptop ASUS TUF Gaming FA506ICB-HN355W (Ryzen 5 4600H/RAM 8GB/RTX 3050/512GB SSD/ Windows)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
          <a href="#" class="product-card" data-aos="fade-up">
            <div class="product-card-sale">
              <div class="me-2 new">Mới</div>
              <div class="sale">Giảm 10%</div>
            </div>
            <div class="product-card-img">
              <img src="https://scontent.fdad8-1.fna.fbcdn.net/v/t39.30808-6/273467229_1291949857991042_2032164724948883457_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vy7klBKiNhIAX9iThH6&_nc_ht=scontent.fdad8-1.fna&oh=00_AfDKJR4nHzxe9mF4rBR9otI1yZg9-JkYoEDnj-WughtuUQ&oe=643C206D" alt="">
            </div>
            <div class="product-card-content mt-2">
              <div>
                <div class="trademark"><b>HP</b></div>
                <div class="name">Laptop HP Pavilion X360 14-ek0059TU (i3-1215U/RAM 8GB/256GB SSD/ Windows 11)</div>
              </div>
              <div class="price mt-2">
                <h6><del>16.590.000 ₫</del></h6>
                <h5>14.890.000 ₫</h5>
              </div>
            </div>
          </a>
        </div> --}}
        <div class="product">
          {!! App\Helpers\Product\ProductHelper::products($products) !!}
        </div>
        <div class="text-center mt-3">
          <button class="showMore">Xem thêm sản phẩm</button>
        </div>
      </div>
    </section>
  </main>
  @include('footer')
</body>

</html>
