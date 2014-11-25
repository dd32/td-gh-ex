// JavaScript Document
jQuery(document).ready(function(e) {    
	jQuery('.besty-tooltip').tooltip();	
	
	
	if(jQuery('div').hasClass("scrollbar")){
	jQuery('.scrollbar').enscroll({
		showOnHover: false,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});
	}	
	jQuery(window).resize(function(){	
   		jQuery('.mini-content').css({'min-height':(jQuery(document).height())});
	});
	/*jQuery('.enscroll-track').parent().css({'left':jQuery('.slider-content').width()+18});	*/
	
	jQuery('.slider-details-control').click(function() {
		if (jQuery('.slider-content').is(':visible')) {			
			jQuery('.slider-details-control').animate({left:'0%'});
			jQuery('.slider-details-control').css({'background-position':'center -124px'});			
		} else {
			if(jQuery(window).width()< 768)
			jQuery('.slider-details-control').animate({left:'1%'});
			else
			jQuery('.slider-details-control').animate({left:'100%'});
			jQuery('.slider-details-control').css({'background-position':'center -24px'});	
		}
		jQuery('.slider-content').toggle( "slide" );
	});
	/** Sidebar Toggal */
	jQuery('.shidebar-control').click(function() {
		var $container = jQuery('.masonry-container');
		if (jQuery('.besty-sidebar').is(':visible')) {			
			jQuery('.shidebar-control').animate({left:'96%'});
			jQuery('.mini-content > div.col-md-9').attr('class', 'col-md-12');
			jQuery('.shidebar-control').css({'background-position':'center -124px'});
			jQuery('.mini-content').css({'min-height':(jQuery(document).height())}); 			
		} else {
			if(jQuery(window).width()< 768)
			jQuery('.shidebar-control').animate({left:'1%'});
			else
			jQuery('.shidebar-control').animate({left:'76%'});
			jQuery('.shidebar-control').css({'background-position':'center -24px'});
			jQuery('.mini-content > div.col-md-12').attr('class', 'col-md-9');			
		}
		jQuery('.besty-sidebar').toggle( "slide" );
		$container.masonry();
	});
		
	//alert(jQuery(window).height());
	jQuery('.comment-form-author #author').attr("placeholder", "Name");
	jQuery('.comment-form-email #email').attr("placeholder", "E-Mail");
	jQuery('.comment-form-url #url').attr("placeholder", "Website");
	jQuery('.comment-form-comment #comment').attr("placeholder", "Message");
	jQuery('.form-submit #submit').val('Send');
	
	jQuery('.search-form .search-submit').val('');
	
	var count = jQuery(".besty-menu > ul > li").children().length;        
	if(count > 6){
		jQuery('.content').append("<div class='menu-sidebar-more'></div>");
		jQuery('.menu-sidebar').css({'position':'relative'});
		jQuery('.mini-content').css({'margin-left':'0px'});
	}
        jQuery('.mini-content').css({'min-height':(jQuery(document).height())});
	
});
