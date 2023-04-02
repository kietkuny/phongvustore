<script>
  $('.button').on('click', function() {
    $('.login').addClass('loading').delay(2200).queue(function() {
      $(this).addClass('active')
    });
  });

</script>
<script>
  $(document).ready(function() {
    $(".avatar").on("click", function() {
      $(this).toggleClass("show")
    });
  });

</script>
<script>
  $(".inpw").on("click", function() {
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
      $(this).html("<i class='fa-regular fa-eye'></i>").prev("input").attr("type", "text");
    } else {
      $(this).html("<i class='fa-regular fa-eye-slash'></i>").prev("input").attr("type", "password");
    }
  });

</script>
<script>
  window.addEventListener('beforeunload', function(event) {
    // Gọi API đăng xuất trong Laravel
    axios.post('/logout').then(response => {
      console.log(response);
    }).catch(error => {
      console.log(error);
    });
  });

</script>


{{-- <script>
  function hideBox() {
    let element = $(".dislay-success");
    element.addClass("d-none");
  }
  setTimeout(hideBox, 3000);

</script> --}}
{{-- <script>
  $(document).ready(function() {
    $('.loading').hide();
    $("#data").empty(); // Xóa dữ liệu hiện tại của phần từ #data

    $.ajax({
      type: 'POST'
      , url: '/list-data'
      , beforeSend: function() {
        // Hiển thị thanh Loading khi dữ liệu đang được tải 
        $('.loading').show();
        $('.loading').css('display', 'flex');
      }
      , success: function(data) {
        // Ẩn thanh Loading khi tải dữ liệu hoàn tất 
        $('.loading').hide();
        $("#data").html(data);
      }
    });
  });

</script> --}}

<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
{{-- <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>

<script src="/template/admin/js/main.js"></script>

{{-- <script src="/template/admin/plugins/chart.js/chart.bundle.min.js"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


@yield('footer')
