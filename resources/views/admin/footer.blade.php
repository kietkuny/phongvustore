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
  $('input[type="search"]').attr('autocomplete', 'off');

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
  //  type="text/javascipt"

  $('#search-user').typeahead({
    source: function(query, process) {
      return $.get('{{ route("admin.users.search") }}', {
        query: query
      }, function(data) {
        return process(data);
      });
    }
  });

  $('#search-producttype').typeahead({
    source: function(query, process) {
      return $.get('{{ route("admin.producttypes.search") }}', {
        query: query
      }, function(data) {
        return process(data);
      });
    }
  });

  $('#search-trademark').typeahead({
    source: function(query, process) {
      return $.get('{{ route("admin.trademarks.search") }}', {
        query: query
      }, function(data) {
        return process(data);
      });
    }
  });

  $('#search-product').typeahead({
    source: function(query, process) {
      return $.get('{{ route("admin.products.search") }}', {
        query: query
      }, function(data) {
        return process(data);
      });
    }
  });

</script>

<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>

<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>

<script src="/template/admin/js/main.js"></script>

{{-- <script src="/template/admin/plugins/chart.js/chart.bundle.min.js"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


@yield('footer')
