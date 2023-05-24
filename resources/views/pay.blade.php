@extends('layout.main')
@section('main')
<section class="main-pay">
  <div class="container">
    <div>
      @if (count($products) != 0)
      <h2 class="mb-3">Thanh toán đơn hàng</h2>
      <form method="post" action="/addpay">
        @csrf
        <div class="left">
          <div class="makecolor"></div>
          <div class="pay-customer">
            <h6 class="mb-3"><i class="fa-solid fa-location-dot"></i> Địa chỉ nhận hàng</h6>
            <p class="mb-1"><b>Họ và tên:</b> {{ Auth::guard('cus')->user()->name }}</p>
            <p class="mb-1"><b>Số điện thoại:</b> {{ Auth::guard('cus')->user()->phone }}</p>
            <p class="mb-1"><b>Địa chỉ:</b> {{ Auth::guard('cus')->user()->housenumber }}, {{ Auth::guard('cus')->user()->city->name }}, {{ Auth::guard('cus')->user()->province->name }}</p>
            <div class="d-flex pay-customer-change align-items-center mt-3">
              <p class="m-0"><small>Mặc định</small></p>
              <a href="/info" class="ms-4"><small>Thay đổi</small></a>
            </div>
            <input type="hidden" name="customer_id" value="{{ Auth::guard('cus')->user()->id }}">
          </div>
          <div class="pay-hr"></div>
          <div class="pay-product">
            <table class="w-100">
              <thead class="text-center">
                <tr>
                  <th style="width: 50%;">Sản phẩm</th>
                  <th style="width: 20%;">Đơn giá</th>
                  <th style="width: 10%;">Số lượng</th>
                  <th style="width: 20%;">Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                @php $total = 0; $qtt = 0; @endphp
                @foreach ($products as $key => $product)
                @php
                $price = $product->price - $product->price * $product->promotion->sale;
                $priceSum = $price * $carts[$product->id];
                $qtt += $carts[$product->id];
                $total += $priceSum;
                @endphp
                <tr>
                  <td colspan="4">
                    <div class="my-4 pay-hr"></div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ $product->thumb }}" alt="{{ $product->name }}" class="img-fluid">
                      <p class="ms-3">{{ $product->name }}</p>
                    </div>
                  </td>
                  <td class="text-center">
                    @if($product->promotion->sale != 0)
                    <p class="mb-1"><small><del>{{ number_format($product->price, 0, '.', '.') }}đ</del></small></p>
                    @endif
                    <p class="mb-0">{{ number_format($price, 0, '.', '.') }}đ</p>
                  </td>
                  <td class="text-center">
                    x{{ $carts[$product->id] }}
                  </td>
                  <td class="text-center">{{ number_format($priceSum, 0, '.', '.') }}đ</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="right">
          <h6 class="mb-3"><b>Thanh toán hóa đơn</b></h6>
          <div class="d-flex justify-content-between mb-3">
            <p>Tổng sản phẩm</p>
            <p class="main-pay-quantity">x{{ $qtt }}</p>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <p>Tổng tiền sản phẩm</p>
            <p class="main-pay-sum">{{ number_format($total, 0, '.', '.') }}đ</p>
          </div>
          <button type="submit" class="btn w-100 mb-4">Đặt hàng</button>
        </div>
      </form>
      @else
      <h2 class="mb-5">Chưa có sản phẩm nào để thanh toán</h2>
      @endif
    </div>
  </div>
</section>
@endsection
