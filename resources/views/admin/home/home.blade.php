@extends('admin.main')

@section('content')

{{-- <form method="get" action="/admin" autocomplete="off">
  <div class="row align-items-end">
    <div class="form-group col-md-3">
      <label for="month">Chọn tháng:</label>
      <select class="form-control" id="month" name="month">
          @foreach ($months as $month)
              <option value="{{ $month }}" {{ $selectedMonth == $month ? 'selected' : '' }}>{{ $month }}</option>
          @endforeach
      </select>
    </div>
    <div class="col-md-3" style="margin-bottom: 1rem;">
      <button type="submit" class="btn btn-primary" id="btn-dashboard-filter">Lọc kết quả</button>
    </div>
  </div>
  @csrf
</form> --}}
<div class="col-md-12">
  <canvas id="salesChart" width="400" height="400"></canvas>
</div>

{{-- <canvas width="500" height="300" id="productsChart"></canvas> --}}

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
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

$.ajax({
  url: '{{ route("admin") }}',
  dataType: 'json',
  success: function (data) {
    var ctx = document.getElementById('productsChart').getContext('2d');

    var labels = [];
    var values = [];
    data.forEach(function (item) {
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
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true
      }
    });
  }
});
</script>

@endsection
