jQuery(document).ready(function($){
	$('#menu-primary-items').slicknav({
		prependTo:'#menu-primary'
	});

	var $window = $(window),
	width = $window.width();
   
   $window.on( 'load', function () {
   
	if (width <= '768') {
	 $('.site-navigation ').removeClass('primary-navigation');
	}else{
	 $('.site-navigation ').addClass('primary-navigation');
	}
	
   });
});