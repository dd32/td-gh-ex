/* ---------------------------------------------- /*
 * Preloader
 /* ---------------------------------------------- */
 jQuery(document).ready(function() {
  jQuery('.nav li.dropdown').hover(function() {
		   	if( jQuery(window).width() > 1100) {
		   	jQuery('.dropdown-menu').removeAttr("style");
		   }
             jQuery(this).addClass('open');
               }, function() {
			   jQuery(this).removeClass('open');
		   }); 
		   jQuery('.nav li.dropdown-submenu').hover(function() {
			   jQuery(this).addClass('open');
		   }, function() {
			   jQuery(this).removeClass('open');
		   }); 
		
		 jQuery('li.dropdown').find('a').each(function (){
          var link = jQuery(this).attr('href');
              if (link==='' || link==="#") {
                jQuery(this).on('click', function(){
                if( jQuery(window).width() < 1100) {
                	jQuery('li.dropdown,li.dropdown-submenu').removeClass('open');
                    jQuery(this).next().slideToggle();
                }
                return false;
                }); 
              }
    });
		
		jQuery('li.dropdown').find('.caret').each(function(){
			jQuery(this).on('click', function(){
				if( jQuery(window).width() <= 1100) {
			      jQuery('li.dropdown,li.dropdown-submenu').removeClass('open');
		          jQuery(this).parent().next().slideToggle();
				}
			 return false;
			});
		});
});