jQuery(document).ready(function($){
  
	$('.carousel').carousel({
	  interval: big_blue_slider_speed.vars
	});
	
	$("#search-icon").click(function () {
	   $('.search-form-container').slideToggle();
	   $( ".serch-form-coantainer .search-top" ).focus();
	});
	
	$("#site-navigation").click(function () {
	   $('.main-navigation ul').slideToggle();
	});
	
	jQuery('a[href*=".png"]:has(img), a[href*=".gif"]:has(img), a[href*=".jpg"]:has(img)').prettyPhoto({ social_tools: false});

});