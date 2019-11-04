	// OWL SLIDER CUSTOM JS

	jQuery(document).ready(function() {	
				
         /* ---------------------------------------------- /*
         * Header Sticky
         /* ---------------------------------------------- */
        
        jQuery(window).scroll(function(){
            if (jQuery(window).scrollTop() >= 100) {
                jQuery('.header-sticky').addClass('header-fixed-top');
				jQuery('.header-sticky').removeClass('not-sticky');
            }
            else {
                jQuery('.header-sticky').removeClass('header-fixed-top');
				jQuery('.header-sticky').addClass('not-sticky');
            }
        });
		
		
		/* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.page-scroll-up').fadeIn();
            } else {
                jQuery('.page-scroll-up').fadeOut();
            }
        });

        jQuery('a[href="#totop"]').click(function() {
            jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
            return false;
        });
		
	
		// Accodian Js
		function toggleIcon(e) {
			jQuery(e.target)
			.prev('.panel-heading')
			.find(".more-less")
			.toggleClass('fa-plus-square-o fa-minus-square-o');
		}
		jQuery('.panel-group').on('hidden.bs.collapse', toggleIcon);
		jQuery('.panel-group').on('shown.bs.collapse', toggleIcon);
		
		
		//Search Popup Box
		
		jQuery(function () {
			jQuery('a[href="#search-popup"]').on('click', function(event) {
				event.preventDefault();
				jQuery('#search-popup').addClass('open');
				jQuery('#search-popup > form > input[type="search-popup"]').focus();
			});
			
			jQuery('#search-popup, #search-popup button.close').on('click keyup', function(event) {
				if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
					jQuery(this).removeClass('open');
				}
			});
		});
		
		 
	});
	