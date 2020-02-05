jQuery(document).ready(function(){ 'use strict';
	jQuery(".page_item_has_children").addClass("menu-item-has-children");
	jQuery( "#main-menu-con .menu-item-has-children" ).focusout(function() { jQuery(this).removeClass("focusmenu"); });			 
	jQuery( "#main-menu-con .menu-item-has-children" ).focusin(function() { jQuery(this).addClass("focusmenu"); });			  
								  
	//jQuery('.go-top').click(function(event) { event.preventDefault(); jQuery('html, body').animate({scrollTop: 0}, 500); }); 
	jQuery(window).scroll(function() { if (jQuery(this).scrollTop() > jQuery('#header').outerHeight(true)) { jQuery('.go-top').fadeIn(150); } else { jQuery('.go-top').fadeOut(150); } });
	jQuery("#main-menu-con .menu-item-home").removeClass("current-menu-item current_page_item");
	jQuery('#respond .comment-form-author, #respond .comment-form-email, #respond .comment-form-url').addClass('flexboxitem');	
								  
	//var scroll = new SmoothScroll('a[href*="#"]', { ignore: 'a[href="#"]' });
	var scroll = new SmoothScroll('a.smscroll[href*="#"]', { ignore: 'a[href="#"]' });

	var PageclsName = jQuery('#pagename').attr('class');
	jQuery( '#pagename' ).removeClass( PageclsName );
	jQuery('#site-con').addClass(PageclsName);
	jQuery( '.sinpagepostcon .post-container' ).removeClass( 'ribboncon' );							  
	jQuery('.sinpagepostcon #content').addClass('ribboncon');
								  
	jQuery('#flinkitemsul li').addClass('flinkitem flinkmenuitem');
	jQuery('#flinkitemsul li a').addClass('flinkitem-title flinktxtpart');
	jQuery('#flinkitemsul li .menu-description').addClass('flinktxtpart');								  
					  
	jQuery('#fsearchicon').click(function(event){ 
		jQuery('#fsearchbox').slideToggle();
		jQuery( '#fsearchbox  .search-form input[type="search"].search-field' ).focus(); event.stopPropagation(); 
	});
	jQuery('#fsearchbox .search-form').click(function (event) { jQuery('#fsearchbox').show(); event.stopPropagation(); });
	jQuery(document).click(function () {  jQuery('#fsearchbox').hide(); });
	
	jQuery('#mobile-menu').click(function(){ 
		jQuery('#main-menu-con').toggleClass('mmenumobile'); jQuery(this).toggleClass('mmenuclose'); jQuery('#mobilemenuclose').toggleClass('mmenuclose');		 
	});
								  
	jQuery( "#mobilemenuclose" ).focusin(function() { jQuery('#main-menu-con').toggleClass('mmenumobile'); jQuery("#mobile-menu").toggleClass('mmenuclose').focus(); jQuery('#mobilemenuclose').toggleClass('mmenuclose'); });		
								  
});		

jQuery(window).on('load resize', function () { 	'use strict';
	var resMwdtx = jQuery('#resmwdt').width();
	if( resMwdtx < 10 ){  jQuery('#main-menu-con').addClass('mmenumobile'); jQuery('#mobilemenuclose').removeClass('mmenuclose'); }
	jQuery('#mobile-menu').removeClass('mmenuclose');
	jQuery('#mobilemenuclose').addClass('mmenuclose');
											  
	var docW = jQuery("#site-container").width();
	//var t = jQuery("#site-container").offset().left;	
	var fSCbottom = parseInt( jQuery("#site-container").css("marginBottom") );										  
	jQuery('#header, #footer').css({'width':docW });
		
	var wHeight = jQuery(window).height();										  
	var fHeight = jQuery('#footer').outerHeight(true);
	var calHeight = wHeight - fSCbottom;
	if ( calHeight > fHeight ) {										  
		jQuery('#bottomspace').css({ 'height':fHeight - 1 });
		jQuery('#footer').css({ 'position':'fixed', 'bottom': fSCbottom });
	}												  
});
	
jQuery(window).on('load resize', function () { 	'use strict';
    jQuery(".menu-item-has-children, .page_item_has_children").on('mouseenter mouseleave focusin focusout', function () { 
        if (jQuery('ul', this).length) {
            var elm = jQuery('ul:first', this);
            var off = elm.offset();
            var l = off.left;
            var w = elm.width();
            var docW = jQuery("#site-container").width();
			var t = jQuery("#site-container").offset().left;
            var isEntirelyVisible = (l + w <= docW + t);
            if (!isEntirelyVisible) {
                jQuery(this).addClass('smedge');
            } else {
                jQuery(this).removeClass('smedge');
            }
        }
    });
});