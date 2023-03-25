<script>
  $('.button').on('click', function () {
    $('.login').addClass('loading').delay(2200).queue(function () {
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
  window.addEventListener('beforeunload', function(event) {
    // Gọi API đăng xuất trong Laravel
    axios.post('/logout').then(response => {
      console.log(response);
    }).catch(error => {
      console.log(error);
    });
  });
</script>
<script>
  function hideBox() {
    let element = $(".dislay-success");
    element.addClass("d-none");
  }
  setTimeout(hideBox, 3000);
</script>

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
