

function yoga_studio_gb_Menu_open() {
	jQuery(".side_gb_nav").addClass('show');
}
function yoga_studio_gb_Menu_close() {
	jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
	$('.gb_toggle').click(function () {
        yoga_studio_Keyboard_loop($('.side_gb_nav'));
    });
});


jQuery('document').ready(function(){
    var owl = jQuery('#slider .owl-carousel');
        owl.owlCarousel({
        loop:true,
        margin:10,
        autoplay :false,
        lazyLoad: true,
        autoplayTimeout: 5000,
        dots:false,
        navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
        items:1,
        nav:false,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            1000:{
                items:1,
            },
            1200:{
                items:1,
            },
        }
    });
});


jQuery(window).scroll(function(){
	if (jQuery(this).scrollTop() > 50) {
		jQuery('.scrollup').addClass('is-active');
	} else {
  		jQuery('.scrollup').removeClass('is-active');
	}
});

jQuery( document ).ready(function() {
	jQuery('#yoga-studio-scroll-to-top').click(function (argument) {
		jQuery("html, body").animate({
		       scrollTop: 0
		   }, 600);
	})
})
// sticky header
jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 120) {
        jQuery('.fixed_header').addClass('fixed');
    } else {
            jQuery('.fixed_header').removeClass('fixed');
    }
});

/* Custom Cursor
 **-----------------------------------------------------*/
// Add this in custom-cursor.js
jQuery(document).ready(function($) {
  var cursor = $(".custom-cursor");
  var follower = $(".custom-cursor-follower");
  var offsetX = 15; // Set your desired horizontal offset
  var offsetY = 15; // Set your desired vertical offset

  $(document).mousemove(function(e) {
    cursor.css({
      top: e.clientY - offsetY + "px",
      left: e.clientX - offsetX + "px"
    });
    follower.css({
      top: e.clientY + "px",
      left: e.clientX + "px"
    });
  });

  $("a, button").hover(
    function() {
      cursor.addClass("active");
      follower.addClass("active");
    },
    function() {
      cursor.removeClass("active");
      follower.removeClass("active");
    }
  );
});

/*preloader*/
jQuery(document).ready(function($) {

  // Function to hide preloader
  function hidePreloader() {
    $("#preloader ").delay(2000).fadeOut("slow");
  }

  // Check if all resources have been loaded
  if (document.readyState === "complete") {
    hidePreloader();
  } else {
    window.onload = hidePreloader;
  }
});

// SEARCH POPUP

jQuery(document).ready(function($) {
    $('.header-search-wrapper .search-main').click(function() {
        $('.search-form-main').toggleClass('active-search');
        $('.search-form-main .search-field').focus();
        $('.header-search-wrapper').toggleClass('icon-toggle');
    });

    $('.search-close-icon').click(function() {
        $('.search-form-main').removeClass('active-search');
        $('.header-search-wrapper').removeClass('icon-toggle');
    });
});