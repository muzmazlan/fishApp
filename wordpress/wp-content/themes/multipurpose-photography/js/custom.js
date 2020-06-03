// NAVIGATION CALLBACK
jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});
});

function multipurpose_photography_resMenu_open() {
  document.getElementById("sidelong-menu").style.top = "63px";
}
function multipurpose_photography_resMenu_close() {
  document.getElementById("sidelong-menu").style.top = "110%";
}

jQuery(function($){
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 100) {
	        $('#header').addClass('sticky');
	    }
	    else {
	        $('#header').removeClass('sticky');
	    }
	});

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

	$(window).load(function() {
		$(".tg-loader").delay(2000).fadeOut("slow");
	    $("#overlayer").delay(2000).fadeOut("slow");
	});

	// back to top.
	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 200 );
		return false;
	});
});