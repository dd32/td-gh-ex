
jQuery(document).on('ready',function() {
	
"use strict";

	var tabs = jQuery('.admela_cdtabs');
	
	tabs.each(function(){
		var tab = jQuery(this),
			tabItems = tab.find('ul.admela_cdtabsnavigation'),
			tabContentWrapper = tab.children('ul.admela_cdtabscontent'),
			tabNavigation = tab.find('nav');

		tabItems.on('click', 'a', function(event){
			event.preventDefault();
			var selectedItem = jQuery(this);
			if( !selectedItem.hasClass('selected') ) {
				var selectedTab = selectedItem.data('content'),
					selectedContent = tabContentWrapper.find('li[data-content="'+selectedTab+'"]'),
					slectedContentHeight = selectedContent.innerHeight();
				
				tabItems.find('a.selected').removeClass('selected');
				selectedItem.addClass('selected');
				selectedContent.addClass('selected').siblings('li').removeClass('selected');
				//animate tabContentWrapper height when content changes 
				tabContentWrapper.animate({
					'height': slectedContentHeight
				}, 200);
			}
		});

		//hide the .admela_cdtabs::after element when tabbed navigation has scrolled to the end (mobile version)
		checkScrolling(tabNavigation);
		tabNavigation.on('scroll', function(){ 
			checkScrolling(jQuery(this));
		});
	});
	
	jQuery(window).on('resize', function(){
		tabs.each(function(){
			var tab = jQuery(this);
			checkScrolling(tab.find('nav'));
			tab.find('.admela_cdtabscontent').css('height', 'auto');
		});
	});

	function checkScrolling(tabs){
		var totalTabWidth = parseInt(tabs.children('.admela_cdtabsnavigation').width()),
		 	tabsViewport = parseInt(tabs.width());
		if( tabs.scrollLeft() >= totalTabWidth - tabsViewport) {
			tabs.parent('.admela_cdtabs').addClass('is-ended');
		} else {
			tabs.parent('.admela_cdtabs').removeClass('is-ended');
		}
	}
		 
jQuery('.admela_customlogo_media_upload').on('click',function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var jQueryadmela_logoimg = jQuery('.admela_custom_logo_image').attr('src', attachment.url);
        jQuery('.admela_custom_logo_url').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if(jQueryadmela_logoimg != '') {
	 jQuery('.admelabklogo_image').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});
jQuery('.admela_ftr_customlogomediaupload').on('click',function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var jQueryadmela_logoimg = jQuery('.admela_ftrcustom_image').attr('src', attachment.url);
        jQuery('.admela_ftrcustomlogo').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if(jQueryadmela_logoimg != '') {
	 jQuery('.admelabkftrlogo_image').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
		 
    return false;
});

	jQuery('.admela_color,#admela_color').wpColorPicker();
	 	 	
	jQuery('.admelapanel-submit').on('click', function() { 
    
	jQuery('#admela_savealert').addClass('admela_savealertload');
	
    });
		
		var admela_bksvtout;
		
		 jQuery('form#admelathemesupport').submit(function() {
		  
			  var data = jQuery(this).serialize();
			  
			  jQuery.post(admelabk_ajaxobject.admela_bkajaxurl, data, function(response) {				
							 				
			  if(response == 1) {
			  jQuery('#admela_savealert').removeClass('admela_savealertload');
			  jQuery('#admela_savealert').addClass('admela_savedone');
			  admela_bksvtout = setTimeout(admela_bkfademessage, 1000);
			  
			  }
			  else if( response == 2 ){
			  
			  location.reload();
			  
			  }
			  
			  else {
				  return false;
			  }
			  
			  });
			  return false;
		  });
		  
		
		function admela_bkfademessage() {
			jQuery('#admela_savealert').fadeOut(function() { 
			jQuery('#admela_savealert').removeClass('admela_savedone');
			jQuery('#admela_savealert').removeClass('admela_savealertload');
			});
			clearTimeout(admela_bksvtout);
		}
		
       jQuery('body').on("click",".admela_optsettings_title",function(event){
	var thisval = jQuery(this);
	thisval.next().slideToggle('slow');		
	thisval.toggleClass("admela_optsetgclose");
	return false;
}); 	 
});
