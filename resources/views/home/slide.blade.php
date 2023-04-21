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
    {{-- {!! App\Helpers\Slider\SliderHelper::sliders($sliders) !!} --}}
    @foreach ($sliders as $key => $slider)
    <div class="slide-item">
      <div class="slide-item-img d-flex align-items-center justify-content-center">
        <img src="{{ $slider->thumb }}" alt="{{ $slider->name }}">
        <div class="opacity-img"></div>
      </div>
      <div class="slide-item-content" data-aos="fade-down">
        <div class="container">
          <div class="px-5">
            <h1>{{ $slider->name }}</h1>
            <p>{{ $slider->description }}</p>
            <div>
              <a href="{{ $slider->url }}">
                Xem thêm
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
