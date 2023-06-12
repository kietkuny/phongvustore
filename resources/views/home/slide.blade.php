<section class="slide overflow-hidden">
  <div class="slide-banner">
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
