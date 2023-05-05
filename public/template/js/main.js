(function ($) {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#province-select').change(function () {
    let provinceId = $(this).val();
    if (provinceId) {
      // Gửi request AJAX để lấy danh sách thành phố
      $.get('/api/provinces/' + provinceId + '/cities', function (cities) {
        // Xóa danh sách thành phố cũ
        $('#city-select').find('option').remove();

        // Thêm các option mới vào danh sách thành phố
        $.each(cities, function (i, city) {
          let option = $('<option>');
          option.attr('value', city.id).text(city.name);
          $('#city-select').append(option);
        });
      });
    } else {
      // Nếu không chọn tỉnh, xóa danh sách thành phố
      $('#city-select').find('option').remove();
    }
  });


//   $('#send-verification-code').click(function(e) {
//     e.preventDefault();
//     var email = $('input[name=email]').val();
//     $.ajax({
//         url: "{{ route('send-email-verification-code') }}",
//         type: "POST",
//         dataType: "json",
//         data: {
//             email: email,
//             _token: "{{ csrf_token() }}"
//         },
//         success: function(data) {
//             alert(data.message);
//         },
//         error: function(xhr, status, error) {
//             console.log(xhr.responseText);
//         }
//     });
// });

  $(`.hamburger-menu`).on("click", function () {
    $(`.hamburger-menu`).toggleClass('change');
    $(`.menu-header`).toggleClass('menu-header-close');
  })


  $('.slide-banner').slick({
    prevArrow: '<button type="button" class="slick-left"><i class="fa-solid fa-caret-left"></i></button>',
    nextArrow: '<button type="button" class="slick-right"><i class="fa-solid fa-caret-right"></i></button>',
    pauseOnHover: false,
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true,
    cssEase: 'linear'
  });


  $('.slide-trademark').slick({
    prevArrow: '<button type="button" class="slick-left"><i class="fa-solid fa-caret-left"></i></button>',
    nextArrow: '<button type="button" class="slick-right"><i class="fa-solid fa-caret-right"></i></button>',
    autoplay: true,
    autoplaySpeed: 1500,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });



  window.onscroll = function () { scrollFunction() };

  function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      $('header').addClass('bg-light border-bottom border-dark');
      $('.scroll-top').addClass('d-flex')
    } else {
      $('header').removeClass('bg-light border-bottom border-dark');
      $('.scroll-top').removeClass('d-flex')
    }
  }

  $(window).on('beforeunload', function () {
    $(window).scrollTop(0);
  });

  $(`.scroll-top`).on("click", function () {
    $('html, body').animate({ scrollTop: (0) }, '5000')
  })

  $(".menu-header-item li").on("click", function () {
    $(this).toggleClass("show")
  });


  const showMore = ".showMore";
  const card = ".product-card";

  if ($(showMore).length === 0) {
    $(card).css("display", "block");
  } else {
    let n = 8;
    $(card).slice(0, n).show();
    $(showMore).on("click", (e) => {
      e.preventDefault();
      $(`${card}:hidden`).slice(0, 4).slideDown();
      if ($(`${card}:hidden`).length === 0) {
        $(showMore).fadeOut("slow");
      }
      $("html,body").animate(
        {
          scrollTop: $(`${card}:nth-child(${n + 1})`).offset().top,
        },
        1500
      );
      n = n + 4;
    });
  }

  const btnSearch = ".btn-search";
  const inputSearch = ".input-search";
  $(btnSearch).on("click", function () {
    $(inputSearch).toggleClass('search-active')
  })


  $('.input-search-ajax').keyup(function () {
    let _text = $(this).val();
    if (_text != '') {
      $.ajax({
        url: window.location.origin + "/api/ajax-search-product?key=" + _text,
        type: "GET",
        success: function (res) {
          let _html = '';
          let count = 0;
          for (let pro of res) {
            if (count === 3) { break; }
            _html += '<a href="/product/id=' + pro.id + '">'
            _html += '<div class="card mx-2 my-2">';
            _html += '<div class="row g-0">';
            _html += '<div class="col-3 list-search-img">';
            _html += '<img src="' + pro.thumb + '" class="img-fluid rounded-start" alt="' + pro.name + '">';
            _html += '</div>';
            _html += '<div class="col-9">';
            _html += '<div class="card-body">';
            _html += '<p class="card-text"><small>' + pro.name + '</small></p>';
            _html += '</div>';
            _html += '</div>';
            _html += '</div>';
            _html += '</div>';
            _html += '</a>';
            count++;
          }
          $('.list-search').show(200);
          $('.list-search').html(_html);
        }
      });
    } else {
      $('.list-search').html('');
      $('.list-search').hide();
    }

  })

  $('.add-to-cart-button').click(function (e) {
    e.preventDefault(); // Ngăn chặn chuyển trang khi submit form
    let form = $(this).closest('form'); // Tìm form gần nhất
    let data = form.serialize(); // Lấy dữ liệu của form
    let quantityInput = form.find('input[name=num_product]');
    if (quantityInput.val() <= 0) {
      return;
    }
    $.ajax({
      type: "POST",
      url: form.attr('action'),
      data: data,
      success: function (response) {
        console.log(xhr.responseText); 
      },
      error: function (xhr) {
        $('#addToCartModal').modal('show');
      }
    });
  });

  $('.add-to-cart-form input[type=number]').on('change', function () {
    if ($(this).val() <= 0) {
      $('#addToCartModal').modal('hide');
    }
  });

  $('.btn-delete-all').on('click', function () {
    $.ajax({
      url: "/carts/delete/all",
      type: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (response) {
        location.reload(); // Reload trang web
      },
      error: function (xhr) {
        console.log(xhr.responseText);
      }
    });
  });


  $('.btn-delete').on('click', function () {
    let productId = $(this).data('id');

    $.ajax({
      url: "/carts/" + productId,
      type: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (response) {
        location.reload(); // Reload trang web
      },
      error: function (xhr) {
        console.log(xhr.responseText);
      }
    });
  });

  if ($('li.menu-header-shop-product').length > 0) {
    $('li.empty-product').addClass('d-none');
    $('li.menu-header-shop-bill').removeClass('d-none');
  }


  $(".nav-item.menu-header-item-menu").each(function () {
    if ($(this).find("ul.menu-drop").length) {
      $(this).find("a.nav-link").append("<i class='ms-2 fa-solid fa-chevron-down'></i>");
      $(this).find("ul.menu-drop i").addClass('d-none');
    }
  });


  $(".btn-qtt-minus").click(function () {
    let input = $(this).siblings('input[type="number"]');
    let val = parseInt(input.val());
    if (val > 1) {
      input.val(val - 1);
    }
  });

  $(".btn-qtt-plus").click(function () {
    let input = $(this).siblings('input[type="number"]');
    let val = parseInt(input.val());
    let max = parseInt(input.attr("max"));
    if (val < max) {
      input.val(val + 1);
    }
  });

  $(".btn-quantity-minus").click(function () {
    let input = $(this).siblings('input[type="number"]');
    let val = parseInt(input.val());
    if (val > 1) {
      input.val(val - 1);
    }
  });

  $(".btn-quantity-plus").click(function () {
    let input = $(this).siblings('input[type="number"]');
    let val = parseInt(input.val());
    let max = parseInt(input.attr("max"));
    if (val < max) {
      input.val(val + 1);
    }
  });

  //  

  //   // Tìm giá trị giá mặc định và định dạng nó thành giá tiền hiển thị
  //   var price = parseInt($(this).find('.cart-shop-price p').text().replace(/\D+/g, ''));
  //   var formattedPrice = new Intl.NumberFormat().format(price) + '₫';
  //   $(this).find('.cart-shop-price p').text(formattedPrice);

  //   // Tìm giá trị số lượng sản phẩm và tính tổng cộng giá trị
  //   var quantity = parseInt($(this).find('.cart-shop-quantity input').val());
  //   var formattedQuantity = new Intl.NumberFormat().format(quantity);
  //   var sum = quantity * price;
  //   var formattedSum = new Intl.NumberFormat().format(sum) + '₫';
  //   // Cập nhật giá trị cho các phần tử liên quan đến sản phẩm đó
  //   $(this).find('.cart-shop-quantity input').val(formattedQuantity);
  //   $(this).find('.cart-shop-sum p').text(formattedSum);

  //   // Bắt sự kiện cho input số lượng và cập nhật lại giá trị tổng
  //   $(this).find('.cart-shop-quantity input').on('input', function () {
  //     var quantity = parseInt($(this).val().replace(/\D+/g, ''));
  //     var sum = quantity * price;
  //     var formattedSum = new Intl.NumberFormat().format(sum) + '₫';
  //     $(this).siblings('.btn-quantity-minus').prop('disabled', quantity <= 1);
  //     $(this).siblings('.btn-quantity-plus').prop('disabled', quantity >= $(this).attr('max'));
  //     $(this).closest('.cart-shop li').find('.cart-shop-sum p').text(formattedSum);
  //   });

  // });


  // $('.cart-shop li .cart-shop-input input[type="checkbox"]').change(function () {
  //   var quantity = 0;
  //   var sum = 0;
  //   $('.cart-shop li').each(function () {
  //     if ($(this).find('.cart-shop-input input[type="checkbox"]').prop('checked')) {
  //       var itemQuantity = parseInt($(this).find('.cart-shop-quantity input').val().replace(/\D+/g, ''));
  //       quantity += itemQuantity;
  //       var itemSum = parseInt($(this).find('.cart-shop-sum p').text().replace(/\D+/g, ''));
  //       sum += itemSum;
  //     }
  //   });
  //   var formattedQuantity = new Intl.NumberFormat().format(quantity);
  //   $('.main-cart-quantity').text('x' + formattedQuantity);
  //   var formattedSum = new Intl.NumberFormat().format(sum) + '₫';
  //   $('.main-cart-sum').text(formattedSum);
  // });

  // $('.cart-shop li .cart-shop-quantity-input').on('input', function () {
  //   var quantity = 0;
  //   var sum = 0;
  //   $('.cart-shop li').each(function () {
  //     var itemQuantity = parseInt($(this).find('.cart-shop-quantity input').val().replace(/\D+/g, ''));
  //     quantity += itemQuantity;
  //     var itemPrice = parseInt($(this).find('.cart-shop-price p').text().replace(/\D+/g, ''));
  //     var itemSum = itemQuantity * itemPrice;
  //     sum += itemSum;
  //   });
  //   var formattedQuantity = new Intl.NumberFormat().format(quantity);
  //   $('.main-cart-quantity').text('x' + formattedQuantity);
  //   var formattedSum = new Intl.NumberFormat().format(sum) + '₫';
  //   $('.main-cart-sum').text(formattedSum);
  // });


  // $('.btn-quantity-minus').click(function () {
  //   var input = $(this).siblings('input[type="number"]');
  //   var val = parseInt(input.val().replace(/\D+/g, ''));
  //   if (val > 1) {
  //     var price = parseInt(input.closest('.cart-shop li').find('.cart-shop-price p').text().replace(/\D+/g, ''));
  //     var quantity = val - 1;
  //     var sum = quantity * price;
  //     var formattedSum = new Intl.NumberFormat().format(sum) + '₫';
  //     input.val(quantity);
  //     input.closest('.cart-shop li').find('.cart-shop-sum p').text(formattedSum);
  //   }
  // });

  // $('.btn-quantity-plus').click(function () {
  //   var input = $(this).siblings('input[type="number"]');
  //   var val = parseInt(input.val().replace(/\D+/g, ''));
  //   var max = parseInt(input.attr('max'));
  //   if (val < max) {
  //     var price = parseInt(input.closest('.cart-shop li').find('.cart-shop-price p').text().replace(/\D+/g, ''));
  //     var quantity = val + 1;
  //     var sum = quantity * price;
  //     var formattedSum = new Intl.NumberFormat().format(sum) + '₫';
  //     input.val(quantity);
  //     input.closest('.cart-shop li').find('.cart-shop-sum p').text(formattedSum);
  //   }
  // });

  setTimeout(function () {
    $("#loading").hide();
  }, 1500);
})(jQuery);
