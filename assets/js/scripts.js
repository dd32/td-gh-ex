( function( $ ) {
	"use strict";

	jQuery(document).ready(function($){

	$('#primary-menu li.menu-item').addClass('menuhide');
	$('#primary-menu li.menu-item').on('click', function(){
	$(this).removeClass('menuhide');
	});

	$('.mini-toggle').on('click', function(){
	   $(this).parent().toggleClass('menushow');
	});
	$('input.qty').each(function () {
	  $(this).number();
	});

	

	}); // document ready

	$.fn.beShopAccessibleDropDown = function () {
		 var el = $(this);

			    /* Make dropdown menus keyboard accessible */

			  $("button.mini-toggle", el).focus(function() {
			        $(this).parents("li").addClass("befocus");
			  })/*.blur(function() {
			        $(this).parents("li").removeClass("befocus");
			  });*/
	}
	 $("#primary-menu").beShopAccessibleDropDown();
	
}( jQuery ) );