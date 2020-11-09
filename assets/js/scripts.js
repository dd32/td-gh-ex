( function( $ ) {
	
	$('.mini-toggle').on('click', function(){
	   $(this).parent().toggleClass('menushow');
	});
	$('.header-top-search i').on('click', function(){
	   $('.header-top-search form').toggleClass('sbar-show');

	});

	$('#masthead').on('click', function(){
	   $('.header-top-search form').removeClass('sbar-show');
	});
	$('.mmenu-hide').on('click', function(){
	   $('#site-navigation').removeClass('toggled');
	});

	$.fn.asthirAccessibleDropDown = function () {
		 var el = $(this);

			    /* Make dropdown menus keyboard accessible */

			  $("button.mini-toggle", el).focus(function() {
			        $(this).parents("li").addClass("befocus");
			  })/*.blur(function() {
			        $(this).parents("li").removeClass("befocus");
			  });*/
	}
	 $("#primary-menu").asthirAccessibleDropDown();
	
}( jQuery ) );