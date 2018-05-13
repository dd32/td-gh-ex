jQuery(document).ready(function(){ 
	jQuery("#main-menu-con ul ul").css({display: "none"}); jQuery('#main-menu-con ul li').hover( function() { jQuery(this).find('ul:first').slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').slideUp(200); jQuery(this).removeClass('selected'); }); 
	});


		jQuery(document).ready(function() {
			// Show or hide the sticky footer button
			jQuery(window).scroll(function() {
				if (jQuery(this).scrollTop() > 200) {
					jQuery('.go-top').fadeIn(200);
				} else {
					jQuery('.go-top').fadeOut(200);
				}
			});
			
			jQuery('.mobile-menu').click(function(){  jQuery('#main-menu-con').toggle(); });
			
			// Animate the scroll to top
			jQuery('.go-top').click(function(event) {
				event.preventDefault();
				
				jQuery('html, body').animate({scrollTop: 0}, 500);
			})
			
			if(jQuery(".mobile-menu").css('display') === 'none') {
				jQuery("#main-menu-con li").on('mouseenter mouseleave', function () {
        			if (jQuery('ul', this).length) {
            			var elm = jQuery('ul:first', this);
            			var off = elm.offset();
            			var l = off.left;
            			var w = elm.width();
            			//var docH = jQuery("#header-content").height();
            			var docW = jQuery("#header-content").width();
            			var isEntirelyVisible = (l + w <= docW);
						if (!isEntirelyVisible) { jQuery(this).addClass('smedge'); } else { jQuery(this).removeClass('smedge'); }
        			}
    			});
			}
		});