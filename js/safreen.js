
//safreen JavaScript 


jQuery(window).ready(function() {
	
	/*CHECK IF TOUCH ENABLED DEVICE*/
	function is_touch_device() {
	 return (('ontouchstart' in window)
		  || (navigator.MaxTouchPoints > 0)
		  || (navigator.msMaxTouchPoints > 0));
	}
 

	if (is_touch_device()) {
		jQuery('body').addClass('onlytouch');
	}


	// Set options
        var options = {
            offset: '#showHere',
            offsetSide: 'top',
            classes: {
                clone:   'branding--clone',
                stick:   'branding--stick',
                unstick: 'branding--unstick'
            }
        };

        // Initialise with options
        var banner = new Headhesive('.branding,.branding-single', options);

        // Headhesive destroy
        // banner.destroy();
	
	//MENU Animation
	if (jQuery(window).width() > 768) {
	jQuery('#navmenu ul > li').hoverIntent(function(){
	jQuery(this).find('.sub-menu:first, ul.children:first').slideDown({ duration: 200});
		jQuery(this).find('a').not('.sub-menu a').stop().animate({"color":'#0000'}, 200);
	}, function(){
	jQuery(this).find('.sub-menu:first, ul.children:first').slideUp({ duration: 200});	
		jQuery(this).find('a').not('.sub-menu a').stop().animate({"color":'#ffff'}, 200);
	
	});

	jQuery('#navmenu ul li').not('#navmenu ul li ul li').hover(function(){
	jQuery(this).addClass('menu_hover');
	}, function(){
	jQuery(this).removeClass('menu_hover');	
	});
	jQuery('#navmenu li').has("ul").addClass('zn_parent_menu');
	jQuery('.zn_parent_menu > a').append('<span class="menu_arrow"><i class="fa fa-angle-down"></i></span>');	}
	
	  - - - - - - - - - - - - - - - - - - - - - - 
    // show / hide slider navigation
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 	
    
    jQuery('.nivo-directionNav').hide();
    jQuery('#nivo').on("mouseenter", function () {
        jQuery('.nivo-directionNav').stop().animate({
            opacity: 1
        }, 200);
    }).on("mouseleave", function () {
        jQuery('.nivo-directionNav').stop().animate({
            opacity: 0
        
    }, 200);});




	//Comment Form
jQuery('.comment-form-author, .comment-form-email, .comment-form-url').wrapAll('<div class="field_wrap" />');

jQuery(".comment-reply-link").click(function () {
      jQuery('#respond_wrap .single_skew_comm, #respond_wrap .single_skew').hide();
    });
jQuery("#cancel-comment-reply-link").click(function () {
      jQuery('#respond_wrap .single_skew_comm, #respond_wrap .single_skew').show();
    });	
	

	
// scrollup
	jQuery(window).bind("scroll", function() {
		if (jQuery(this).scrollTop() > 800) {
			jQuery(".scrollup").fadeIn('slow');
		} else {
			jQuery(".scrollup").fadeOut('fast');
		}
	});
	jQuery(".scrollup").click(function() {
	  jQuery("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});





// WOW
 new WOW().init(); 
 
var docHeight = jQuery(window).height();
   var footerHeight = jQuery('#footer').height();
   var footerTop = jQuery('#footer').position().top + footerHeight;

   if (footerTop < docHeight) {
    jQuery('#footer').css('margin-top', 1+ (docHeight - footerTop) + 'px');
   }
	
 
    jQuery('.matchhe').matchHeight(options);


//TOP Header Search

	
	  
	  
jQuery( ".social-safreen a i" ).click(function() {
  jQuery( "#navmenu .search-form .search-field ,#navmenu .search-form .search-submit" ).slideToggle( "fade" );
});
	  
	  	
	
});



/* Side responsive menu	 */
jQuery(document).ready(function($){
	$('.menu-toggle').sidr({
      	name: 'sidr-left',
      	side: 'left',
		source: '#navmenu',
			onOpen: function() {
				$('.menu-toggle').animate({
					marginLeft: "260px"
				}, 200);
			},
			onClose: function() {
				$('.menu-toggle').animate({
					marginLeft: "0px"
				}, 200);
			}
    }); });

jQuery(document).ready(function($){
  jQuery('a[href*=#]').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
var $targetId = $(this.hash),
  $targetAnchor = $('[name=' + this.hash.slice(1) +']');
var $target = $targetId.length ? $targetId
  : $targetAnchor.length ? $targetAnchor
    : false;
if ($target) { var targetOffset = $target.offset().top-80;
        $('html,body')
        .animate({scrollTop: targetOffset}, 1000);
       return false;
      }
    }
  });
});


   
  
  
  