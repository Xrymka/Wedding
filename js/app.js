$(function () {
  /* slider */
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

  /* smooth scroll */
  $(".nav").on("click", "a", function(event) {
    event.preventDefault();
    var id = $(this).attr('href'),
    top = $(id).offset().top - 50;
    $('body,html').animate({scrollTop: top}, 1500);
  });

  /* hidden info */
$('.info__select').on('change', function() {
  if ($(this).val() == 1) {
    $('#spb').show();
  } else {
    $('#spb').hide();
  }

  if ($(this).val() == 2) {
    $('#perm').show();
  } else {
    $('#perm').hide();
  }
  });

  $(document).ready(function(){
    $(".ask__form").submit(function(){
      if ($('input:checkbox:checked').length < 1){
        alert("Один из пунктов должен быть выбран!");
      }
    });
  });

  $('#together, #alone').on('click', function() {
    var radio = document.getElementById("together");

    var label_name = document.getElementById("quest_name");
    var input_name = document.getElementById("quest");

    if (radio.checked === true){
      label_name.style.display = "block";
      input_name.style.display = "block";
    } else {
      label_name.style.display = "none";
      input_name.style.display = "none";
    }
  });

  $('#yes, #no').on('click', function() {
    var radio = document.getElementById("no");

    var interview = document.getElementById("interview");
    var drinks = document.getElementById("drinks");
    var text = document.getElementById("sorry");

    if (radio.checked === true){
      interview.style.display = "none";
      drinks.style.display = "none";
      text.style.display = "block";
    } else {
      interview.style.display = "block";
      drinks.style.display = "block";
      text.style.display = "none";
    }
  });

  /* mobile nav */
  const navToggle = $("#navToggle");
    const nav = $("#nav");

    navToggle.on("click", function(event) {
        event.preventDefault();

        $(this).toggleClass("active");
        nav.toggleClass("show");
    });

    $("body").on("click", function(event) {

        if (! navToggle.is(event.target) && navToggle.has(event.target).length === 0 &&
            ! nav.is(event.target) && nav.has(event.target).length === 0)
            {
                navToggle.removeClass("active");
                nav.removeClass("show");
            };
    });

  /* send messages */
	$(document).ready(function () {
    $('form').submit(function () {
        var formID = $(this).attr('id');
        var formNm = $('#' + formID);
        $.ajax({
            type: 'POST',
            url: 'mail.php',
            data: formNm.serialize(),
            success: function (data) {
                $(formNm).html(data);
            }
        });
        return false;
    });
});

});


