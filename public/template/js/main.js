
// (function ($) {
//   "use strict";

//   /*[ Load page ]
//   ===========================================================*/
//   $(".animsition").animsition({
//     inClass: 'fade-in',
//     outClass: 'fade-out',
//     inDuration: 1500,
//     outDuration: 800,
//     linkElement: '.animsition-link',
//     loading: true,
//     loadingParentElement: 'html',
//     loadingClass: 'animsition-loading-1',
//     loadingInner: '<div class="loader05"></div>',
//     timeout: false,
//     timeoutCountdown: 5000,
//     onLoadEvent: true,
//     browser: ['animation-duration', '-webkit-animation-duration'],
//     overlay: false,
//     overlayClass: 'animsition-overlay-slide',
//     overlayParentElement: 'html',
//     transition: function (url) { window.location.href = url; }
//   });
  
// })(jQuery);

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
  autoplaySpeed: 3000,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
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

$(`.scroll-top`).on("click", function () {
  $('html, body').animate({ scrollTop: (0) }, '5000')
})

$(".menu-header-item li").on("click", function () {
  $(this).toggleClass("show")
});


const showMore = ".showMore";
const card = ".product-card";

$(document).ready(function () {
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
});


const btnSearch = ".btn-search";
const inputSearch = ".input-search";
$(btnSearch).on("click", function () {
  $(inputSearch).toggleClass('search-active')
})

$(document).ready(function () {
  if ($('li.menu-header-shop-product').length > 0) {
    $('li.empty-product').addClass('d-none');
  }
});


$(document).ready(function() {
  $(".nav-item.menu-header-item-menu").each(function() {
    if ($(this).find("ul.menu-drop").length) {
      $(this).find("a.nav-link").append("<i class='ms-2 fa-solid fa-chevron-down'></i>");
      $(this).find("ul.menu-drop i").addClass('d-none');
    } 
  });
});
