@extends('admin.main')

@section('content')

{{-- <form method="get" action="/admin" autocomplete="off">
  <div class="row align-items-end">
    <div class="form-group col-md-3">
      <label for="month">Chọn tháng:</label>
      <select class="form-control form-select" id="month" name="month">
          @foreach ($months as $month)
              <option value="{{ $month }}" {{ $selectedMonth == $month ? 'selected' : '' }}>{{ $month }}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="month">Năm: </label>
      <input type="year" class="form-control">
    </div>
    <div class="col-md-3" style="margin-bottom: 1rem;">
      <button type="submit" class="btn btn-primary" id="btn-dashboard-filter">Lọc kết quả</button>
    </div>
  </div>
  @csrf
</form> --}}

<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box alert alert-info">
      <div class="inner">
        <h5>{{ $sumOrders }}</h5>
        <p>Đơn hàng</p>
      </div>
      <div class="icon">
        <i class="fa-sharp fa-regular fa-bag-shopping"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box alert alert-success">
      <div class="inner">
        <h5>{{ $sumProducts }}</h5>
        <p>Tổng sản phẩm</p>
      </div>
      <div class="icon">
        <i class="fa-solid fa-laptop-mobile"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box alert alert-danger">
      <div class="inner">
        <h5>{{ number_format($sumRevenue, 0, '.', '.') }}₫</h5>
        <p>Doanh thu</p>
      </div>
      <div class="icon">
        <i class="fa-sharp fa-solid fa-chart-simple"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box alert alert-warning">
      <div class="inner">
        <h5>{{ $sumCustomers }}</h5>
        <p>Tài khoản đăng kí</p>
      </div>
      <div class="icon">
        <i class="fa-regular fa-user-plus"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="row">

  <div class="col-12 mb-3">
    <canvas id="salesChart" width="300" height="300"></canvas>
  </div>
  <p class="text-center mb-5">Biểu đồ: Doanh thu bán được trong tháng {{ $selectedMonth }}, năm {{ $selectedYear }}</p>

  {{-- <div class="col-12 mb-5">
    <table class="text-center table table-bordered">
      <thead>
        <tr>
          <th colspan="3">Doanh thu tháng {{ $selectedMonth }}</th>
        </tr>
        <tr>
          <th style="font-weight: 500;">Tổng đơn hàng</th>
          <th style="font-weight: 500;">Tổng sản phẩm</th>
          <th style="font-weight: 500;">Tổng doanh thu</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $totalOrders }}</td>
          <td>{{ $totalProducts }}</td>
          <td>{{ number_format($totalRevenue, 0, '.', '.') }}₫</td>
        </tr>
      </tbody>
    </table>
  </div> --}}
  
  <div class="col-md-6 mb-5">
    <canvas width="300" height="200" id="productsChart"></canvas>
    <p class="text-center mt-5">Biểu đồ: Loại sản phẩm bán được trong tháng {{ $selectedMonth }}, năm {{ $selectedYear }}</p>
  </div>

  <div class="col-md-6 mb-5">
    <canvas width="300" height="200" id="revenueChart"></canvas>
    <p class="text-center mt-5">Biểu đồ: Doanh thu theo từng tháng, năm {{ $selectedYear }}</p>
  </div>

</div>

<script src="/template/vendor/numeraljs/numeral.min.js"></script>
<script>
  // Đăng ký tiền tệ VNĐ
  numeral.register('locale', 'vi', {
    delimiters: {
      thousands: ',', 
      decimal: '.'
    }, 
    abbreviations: {
      thousand: 'k', 
      million: 'm', 
      billion: 'b',
      trillion: 't'
    }, 
    ordinal: function(number) {
      return number === 1 ? 'một' : 'không';
    }, 
    currency: {
      symbol: 'vnđ'
    }
  });

  // Sử dụng locate vi (Việt nam)
  numeral.locale('vi');

</script>

<script>
  var currentDate = new Date(); // Tạo đối tượng Date hiện tại
  var currentMonth = currentDate.getMonth() + 1; // Lấy tháng hiện tại (giá trị trả về từ 0 - 11 nên cần cộng thêm 1)
  var currentYear = currentDate.getFullYear(); // Lấy năm hiện tại
  var ctx = document.getElementById('salesChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'line', 
    data: {
      labels: {!!json_encode($orderDetails->pluck('date')->toArray())!!}, 
      datasets: [{
        label: 'Doanh thu bán được', 
        data: {!!json_encode($orderDetails->pluck('total_sales')->toArray())!!}, 
        backgroundColor: '#c7e8ca8e',
        borderColor: '#5e9c59b3', 
        borderWidth: 1
      }]
    }, 
    options: {
      legend: {
        display: false
      }, 
      title: {
        display: true, 
        text: "Báo cáo đơn hàng tháng " + currentMonth + ", năm " + currentYear 
      }, 
      scales: {
        xAxes: [{
          scaleLabel: {
            display: true, 
            labelString: 'Ngày nhận đơn hàng'
          }
        }], 
        yAxes: [{
          ticks: {
            callback: function(value) {
              return numeral(value).format('0,0 $')
            }
          }, 
          scaleLabel: {
            display: true, 
            labelString: 'Tổng thành tiền'
          }
        }]
      }, 
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            return numeral(tooltipItem.value).format('0,0 $')
          }
        }
      }, 
      responsive: true, 
      maintainAspectRatio: false, 
    }
  });
</script>

<script>
var chartData = {!! json_encode($chartData)!!};

var ctx = document.getElementById('productsChart').getContext('2d');

var labels = [];
var values = [];
chartData.forEach(function (item) {
  labels.push(item.label);
  values.push(item.value);
});

var chart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: labels,
    datasets: [{
      data: values,
      backgroundColor: [
        'rgba(255, 99, 132, 0.7)',
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 99, 132, 0.7)',     
        'rgba(54, 162, 235, 0.7)',     
        'rgba(255, 206, 86, 0.7)',     
        'rgba(75, 192, 192, 0.7)',    
        'rgba(153, 102, 255, 0.7)',  
        'rgba(255, 159, 64, 0.7)',   
        'rgba(255, 0, 0, 0.7)',        
        'rgba(0, 255, 0, 0.7)',   
        'rgba(0, 0, 255, 0.7)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true
  }
});
</script>

<script>
var months = {!!json_encode($months)!!};
var revenue = {!!json_encode($revenue)!!};
// Tạo biểu đồ cột
var ctx = document.getElementById('revenueChart').getContext('2d');

var chart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: months,
    datasets: [{
      label: 'Tiền theo tháng',
      data: revenue,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgb(54, 162, 235)',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          stepSize: 1000000,
          callback: function(value, index, values) {
            return value.toLocaleString() + ' VNĐ';
          }
        }
      }
    }
  }
});
</script>

@endsection
