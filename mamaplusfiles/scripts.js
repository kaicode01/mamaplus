$(document).ready(function () {
  var timestamp = new Date().getTime();
  $('.main').attr('src', '/sodan/wp-content/themes/kikotto/images/top/main.gif' + '?' + timestamp);
});

// table-scroll

$(function () {
  $(window).scroll(function () {
    $(".table-scroll").each(function () {
      var arrowPos = $(this).offset().top; // 矢印の位置
      var scrollPos = $(window).scrollTop(); // スクロールの上位置
      var windowHeight = $(window).height(); // 画面の高さを取得
      if ($(".table-scroll").scrollLeft() == 0) { // .table-scrollが左に寄っているか判別
        if (scrollPos > arrowPos - windowHeight / 2) { //矢印付近まで来て、画面の半分に差し掛かった辺りで
          $(".table-scroll").addClass("show"); //.showを追加
        } else {
          $(".table-scroll").removeClass("show"); //.showを削除
        }
      } else {
        $(".table-scroll").removeClass("show"); //.showを削除
      }
    });
  });
  $(".table-scroll").on('touchmove', function () { // .table-scrollに触れたら2度目は出さない処理
    if ($(this).scrollLeft() != 0) { // 動かしてない状態のタップは除外
      $(this).addClass("del");
    }
  });
});

// page-top

$(function () {
  var px_change = 500;
  window.addEventListener('scroll', function (e) {
    if ($(window).scrollTop() > px_change) {
      $("#lift").addClass("lift-on");
    } else if ($("#lift").hasClass("lift-on")) {
      $("#lift").removeClass("lift-on");
    }
  });
});


// btn-footer

$(function () {
  var px_change = 500;
  window.addEventListener('scroll', function (e) {
    if ($(window).scrollTop() > px_change) {
      $("#btn-footer").addClass("btn-footer-on");
    } else if ($("#btn-footer").hasClass("btn-footer-on")) {
      $("#btn-footer").removeClass("btn-footer-on");
    }
  });
});

//最下部から-220pxでイベント実行
$(function () {
  window.addEventListener('scroll', function (e) {
    var doch = $(document).innerHeight();
    var winh = $(window).innerHeight();
    var bottom = doch - winh;
    if (bottom - 220 <= $(window).scrollTop()) {
      if ($("#btn-footer").hasClass("btn-footer-on")) {
        $("#btn-footer").removeClass("btn-footer-on");
      }
    }
  });
});

// page scroll

$(function () {
  $('a[href^="#"]').click(function () {
    var adjust = 120;
    var speed = 1000;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top - adjust;
    $("html, body").animate({
      scrollTop: position
    }, speed, "easeInOutExpo");
    return false;
  });
});

//slick

$('.carousel').slick({
  centerMode: true,
  dots: false,
  arrows: false,
  autoplay: true,
  autoplaySpeed: 2000,
  speed: 1000,
  centerPadding: '90px',
  slidesToShow: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        centerPadding: '40px',
        slidesToShow: 3
      }
        },
    {
      breakpoint: 768,
      settings: {
        centerPadding: '40px',
        slidesToShow: 3
      }
        },
    {
      breakpoint: 480,
      settings: {
        centerPadding: '25px',
        slidesToShow: 2
      }
        }]
});

//tab

$(function () {
  $('#tab-menu li').on('click', function () {
    if ($(this).not('active')) {
      $(this).addClass('active').siblings('li').removeClass('active');
      var index = $('#tab-menu li').index(this);
      $('#tab-box div').eq(index).addClass('active').siblings('div').removeClass('active');
    }
  });
});

//accordion

$(function () {
  $("#accordion dt").on("click", function () {
    $(this).next().slideToggle(100);
    $(this).toggleClass("active");
  });
});

//Luminous

new LuminousGallery(document.querySelectorAll(".luminous"));
