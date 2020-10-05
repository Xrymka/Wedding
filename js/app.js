$(function () {
  $('.photos__slider').slick({
    prevArrow: '<button type="button" class="slick-btn slick-prev"><img src="img/arrow-prev.svg" alt="arrow-prev"></button>',
    nextArrow: '<button type="button" class="slick-btn slick-next"><img src="img/arrow-next.svg" alt="arrow-next"></button>',
    autoplay: 3000,
    fade: true,

    responsive: [
      {
        breakpoint: 601,
        settings: {
          arrows: false
        }
      }
    ]
  });

  $(".nav").on("click", "a", function(event) {
    event.preventDefault();
    var id = $(this).attr('href'),
    top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 1500);
  });
});