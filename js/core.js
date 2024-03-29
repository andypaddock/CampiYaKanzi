//@prepros-prepend fslightbox.js
//@prepros-prepend slick.min.js
//@prepros-prepend scrollreveal.js

jQuery(document).ready(function($) {


  
 
  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });

  // ========== Controller for lightbox elements



 // ========== NAVBAR SCROLL AWAY


   $(document).ready(function () {
    "use strict";

    var c,
      currentScrollTop = 0,
      navbar = $("#navbar");

    $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();

      currentScrollTop = a;

      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollUp");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollUp");
      }
      c = currentScrollTop;
    });
  });







  //=========== Slick Slider

$('.testimonial-carousel').slick({
  centerMode: false,
  centerPadding: '125px',
  slidesToShow: 1,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
  // responsive: [
  //   {
  //     breakpoint: 768,
  //     settings: {
  //       arrows: false,
  //       centerMode: true,
  //       centerPadding: '40px',
  //       slidesToShow: 1
  //     }
  //   },
  //   {
  //     breakpoint: 480,
  //     settings: {
  //       arrows: false,
  //       centerMode: true,
  //       centerPadding: '40px',
  //       slidesToShow: 1
  //     }
  //   }
  // ]
});

$('.hero-slider').slick({
   centerMode: false,
  centerPadding: '125px',
  slidesToShow: 1,
  arrows:false,
  autoplay: true,
  autoplaySpeed: 4000,
});

$('.awards-wrapper').slick({
  centerMode: false,
  centerPadding: '125px',
  slidesToShow: 3,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
  autoplay: true,
  autoplaySpeed: 7000,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
});



$(document).ready(function () {
    $(".block__title").click(function (event) {
      if ($(".block").hasClass("one")) {
        $(".block__title").not($(this)).removeClass("active");
        $(".block__text").not($(this).next()).slideUp(300);
      }
      $(this).toggleClass("active").next().slideToggle(300);
    });
  });


  //=========== Scroll Reveal






var slideLeft = {
    distance: "40px",
    origin: "left",
    opacity: 0.0,
    duration: 1000,
    delay: 250,
    mobile: false,
  };
  var slideRight = {
    distance: "40px",
    origin: "right",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideUp = {
    distance: "40px",
    origin: "bottom",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var tileDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1500,
    mobile: false,
    interval: 40,
  };

  ScrollReveal().reveal(".fmleft", slideLeft);
  ScrollReveal().reveal(".fmtop", slideDown);
  ScrollReveal().reveal(".fmbottom", slideUp);
  ScrollReveal().reveal(".fmright", slideRight);
  ScrollReveal().reveal(".tile", tileDown);
  ScrollReveal().reveal(".row-default", slideRight);
  ScrollReveal().reveal(".row-reverse", slideLeft);



// Show the first tab and hide the rest
$('#tabs-nav li:first-child').addClass('active');
$('.tab-content').hide();
$('.tab-content:first').show();

// Click function
$('#tabs-nav li').click(function(){
  $('#tabs-nav li').removeClass('active');
  $(this).addClass('active');
  $('.tab-content').hide();
  
  var activeTab = $(this).find('a').attr('href');
  $(activeTab).fadeIn();
  return false;
});


// NAV BAR

$('.burger').click(function(){
  $('.mobile-header').toggleClass('is--active');
  $('.mobile-nav').toggleClass('is--active');
});





//==============BLOG READ MORE AJAX CALL


var ppp = 6; // Post per page
var pageNumber = 1;


function load_posts(){
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#ajax-posts").append($data);
                //$("#more_posts").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
                $("#more_posts").hide(); // This will hide the button once all posts have been loaded
            } else{
                $("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_posts").on("click",function(){ // When btn is pressed.
    $("#more_posts").attr("disabled",true); // Disable the button, temp.
    load_posts();
    $(this).insertAfter('#ajax-posts'); // Move the 'Load More' button to the end of the the newly added posts.
});


$('.hamburger-menu, .link').click(function () {
	$('body').hasClass('menu-open') ? ($('body').removeClass('menu-open')) : ($('body').addClass('menu-open'));
});



  $(document).ready(function() {
  $('.footer-accordian--heading').click(function() {
    $(this).siblings('.footer-accordian--content').slideToggle();
    $(this).toggleClass('active');
  });
});

$(".toggle-block label").click(function () {
    var otherLabels = $(this).parent().siblings(".item").find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });


  $(".timeline-event__details .label").click(function () {
    var otherLabels = $(this).parent().siblings(".timeline-event__details").find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });



 $(document).ready(function () {
    "use strict";

    var c,
      currentScrollTop = 0,
      navbar = $("#header");

    $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();

      currentScrollTop = a;

      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollUp");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollUp");
      }
      c = currentScrollTop;
    });
  });


}); //Don't remove ---- end of jQuery wrapper


// ==============================
// Nav
// ========================================


document.addEventListener("DOMContentLoaded", function () {
    var videoContainer = document.getElementById("video-container");
    var video = document.getElementById("video");
    var content = document.getElementById("camp-content");
    var fadeDelayInSeconds = parseInt(videoContainer.dataset.fadeDelay, 10) || 5; // Set the delay in seconds before the fade effect starts, defaults to 5 seconds

    video.play(); // Start playing the video

    setTimeout(function () {
        fadeOut(video, 1000);
    }, fadeDelayInSeconds * 1000); // Convert seconds to milliseconds

    // Function to fade out the video
    function fadeOut(videoElement, duration) {
        var interval = 50;
        var step = interval / duration;
        var fadeInterval = setInterval(function () {
            videoElement.style.opacity -= step;
            if (videoElement.style.opacity <= 0) {
                clearInterval(fadeInterval);
                videoElement.style.display = "none";
                content.style.opacity = 1; // Make the content fully visible
            }
        }, interval);
    }

  // Function to fade out an element
  function fadeOut(element, duration, callback) {
    element.style.opacity = 1;

    var interval = 50;
    var step = interval / duration;
    var fadeOutInterval = setInterval(function () {
      element.style.opacity -= step;
      if (element.style.opacity <= 0) {
        clearInterval(fadeOutInterval);
        element.style.display = "none";
        callback();
      }
    }, interval);
  }

  // Function to fade in an element
  function fadeIn(element, duration) {
    element.style.opacity = 0;
    element.style.display = "block";

    var interval = 50;
    var step = interval / duration;
    var fadeInInterval = setInterval(function () {
      element.style.opacity = Number(element.style.opacity) + step;
      if (element.style.opacity >= 1) {
        clearInterval(fadeInInterval);
      }
    }, interval);
  }

  // Rest of the code...
});