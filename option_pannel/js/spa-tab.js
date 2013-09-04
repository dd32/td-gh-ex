jQuery(document).ready(function() {
jQuery('#ui-id-1').click(function(){
	jQuery('#option_general').show();
	
	jQuery('#option_footer').hide();
	jQuery('#option_home').hide();
	jQuery('#option_typography').hide();
});
jQuery('#ui-id-2').click(function(){
	jQuery('#option_typography').show();
	jQuery('#option_general').hide();

	jQuery('#option_footer').hide();
	jQuery('#option_home').hide();
});
/* jQuery('#ui-id-3').click(function(){
	jQuery('#option_logo_header').show();
	jQuery('#option_general').hide();
	jQuery('#option_typography').hide();
	jQuery('#option_footer').hide();
	jQuery('#option_home').hide();
}); */
jQuery('#ui-id-4').click(function(){
	jQuery('#option_footer').show();
	jQuery('#option_general').hide();
	jQuery('#option_typography').hide();

	jQuery('#option_home').hide();
});
jQuery('#ui-id-5').click(function(){
	jQuery('#option_home').show();
	jQuery('#option_general').hide();
	jQuery('#option_typography').hide();

	jQuery('#option_footer').hide();
});
});

// js to active the link of option pannel
  jQuery(document).ready(function() {
	   jQuery('ul.options_tabs li ').click(function() {
			jQuery('ul.options_tabs li ').removeClass('active');
		    jQuery(this).addClass('active');
	   });
	});
	
//js to for tabs..
/* jQuery(function() {
    jQuery( "#tabs" ).tabs();
  }); */
