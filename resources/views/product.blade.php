<!DOCTYPE html>
<html lang="en">

<head>
  @include('head')
</head>

<body>
  <div id="loading"><span class="loader"></span></div>
  @include('header')
  <main>
    <section class="main-product">
      <div class="container">
        <div class="product" style="padding-top: 100px;">
          {!! App\Helpers\Product\ProductHelper::products($products) !!}
        </div>
        {!! $products->links('pagination::bootstrap-5') !!}
      </div>
    </section>
  </main>
  @include('footer')
</body>

</html>
