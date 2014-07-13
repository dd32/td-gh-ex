jQuery(document).ready(function(){ jQuery("#selfie-main-menu ul ul").css({display: "none"}); jQuery('#selfie-main-menu ul li').hover( function() { jQuery(this).find('ul:first').slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').slideUp(200); jQuery(this).removeClass('selected'); }); });

		jQuery(document).ready(function() { 
		
		jQuery('.headerheight').css('marginTop', jQuery('#header').outerHeight(true) );
		
			jQuery(window).scroll(function() {
				if (jQuery(this).scrollTop() > jQuery('#header').outerHeight(true)) {
					jQuery("#selfie-top-menu").hide();
					jQuery("#selfie-main-menu").addClass("gobottom");
					jQuery('.go-top').fadeIn(150);

				} else {
					jQuery("#selfie-top-menu").show();;
					jQuery("#selfie-main-menu").removeClass("gobottom");
					jQuery('.go-top').fadeOut(150);
				}
			});
			
			// Animate the scroll to top
			jQuery('.go-top').click(function(event) {
				event.preventDefault();
				
				jQuery('html, body').animate({scrollTop: 0}, 500);
			})
		
		});
		
