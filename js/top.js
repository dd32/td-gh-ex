jQuery(function() {
	jQuery(window).scroll(function() {

var x=jQuery(this).scrollTop();
		if(x != 0) {
			jQuery('#toTop').fadeIn(3000);	
		} else {
			jQuery('#toTop').fadeOut();
		}
	});
 
	jQuery('#toTop').click(function() {
		jQuery('body,html').animate({scrollTop:0},800);
	});	


});
