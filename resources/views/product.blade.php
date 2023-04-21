@extends('layout.main')
@section('main')
<section class="main-product">
  <div class="container">
    <div class="product" style="padding-top: 100px;">
      {!! App\Helpers\Product\ProductHelper::products($products) !!}
    </div>
    {!! $products->links('pagination::bootstrap-5') !!}
  </div>
</section>
@endsection