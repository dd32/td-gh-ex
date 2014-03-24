jQuery(document).ready(function($){ 

jQuery('#post-formats-select input[type="radio"]').click(function() 
{ 	
	var postformat = jQuery(this).val();
	jQuery(".postformat").css({'display':'none'});
	jQuery(".postformat#" + postformat ).css({'display':'block'});
	if   ((postformat == 'link') || (postformat == 'quote') ) {
				jQuery("#postdivrich").css({'display':'none'});
		 }
	else {
				jQuery("#postdivrich").css({'display':'block'});
		 }
	if   ((postformat == '0' ) || (postformat == 'aside') ) {
				jQuery(".postformats").css({'display':'none'});
		 }
	else {
				jQuery(".postformats").css({'display':'block'});
		 }
		
}); 

jQuery('#post-formats-select input[type="radio"]:checked').each(function() 
{ 	
	var postformats = jQuery(this).val();
	jQuery(".postformat").css({'display':'none'});
	jQuery(".postformat#" + postformats ).css({'display':'block'});
	
	if ( (postformats == 'link') || (postformats == 'quote') )  
	
		{
				jQuery("#postdivrich").css({'display':'none'});
		}
	else 
	
		{
				jQuery("#postdivrich").css({'display':'block'});
		}
		
	if (  (postformats == '0' ) || (postformats == 'aside') )  
	
		{
				jQuery(".postformats").css({'display':'none'});
		}
	else 
	
		{
				jQuery(".postformats").css({'display':'block'});
		}
		

}); 

jQuery('.voobis_message').delay(1000).fadeOut(1000);

jQuery('.on-off').live("change",function() {
	
	if (jQuery(this).val() == "on" ) { 
		jQuery('.hidden-element').css({'display':'none'});
		alert("ca");
	} 
	else { 
		jQuery('.hidden-element').slideDown("slow");
	} 

}); 

jQuery('input[type="checkbox"].on_off').live("change",function() { 

	if (!this.checked) { 
		jQuery(this).parent('.iPhoneCheckContainer').parent('.wip_inputbox').next('.hidden-element').slideUp("slow");
	} else { 
		jQuery(this).parent('.iPhoneCheckContainer').parent('.wip_inputbox').next('.hidden-element').slideDown("slow");
	} 

}); 


									
var url = jQuery(".template_directory").val();

jQuery('.select-background').each(function() {
	
	var sel = jQuery(this).val();
    jQuery(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});
	
}); 

jQuery('.select-background').live("click",function() { 
	
	var sel = jQuery(this).val();
	jQuery(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});
	
}); 

jQuery('.wip_inputbox input[type="button"]').live("click", function(){
	var upField = jQuery(this).parent().find('input[type="text"]');
	var upId = jQuery(this).parent().find('input.idattachment');
		
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');    
	
	window.send_to_editor = function(html) {
			
		imgurl = jQuery('a', '<div>' + html + '</div>').attr('href');
		upField.val(imgurl);
        jQuery(this).parent('.idattachment').val(imgurl);
		$image_preview = upField.parents('.sortItem').find('.ss-ImageSample');
		if( $image_preview.length > 0 ) $image_preview.attr('src',imgurl);
			
		tb_remove();
	}          
		
	return false;
});

	jQuery('.wip_mainbox').css({'display':'none'});
	jQuery('.inactive').next('.wip_mainbox').css({'display':'block'});

	jQuery('.wip_container h5.element').each(function(){
	
		if(jQuery(this).next('.wip_mainbox').css('display')=='none') {	
			jQuery(this).next('input[name="element-opened"]').remove();	
		}
						
		else {	
			jQuery(this).next().append('<input type="hidden" name="element-opened" value="'+jQuery(this).attr('id')+'" />');
				
		}
						
	});

	jQuery('.wip_container h5.element').live("click", function(){
	
		if(jQuery(this).next('.wip_mainbox').css('display')=='none') {	
		
			jQuery(this).addClass('inactive');
			jQuery(this).children('img').addClass('inactive');
			jQuery('input[name="element-opened"]').remove();	
			jQuery(this).next().append('<input type="hidden" name="element-opened" value="'+jQuery(this).attr('id')+'" />');
		}
						
		else {	
		
			jQuery(this).removeClass('inactive');
			jQuery(this).children('img').removeClass('inactive');
			jQuery(this).next('input[name="element-opened"]').remove();	
				
		}
						
		jQuery(this).next('.wip_mainbox').stop(true,false).slideToggle('slow');
	
	});
		
});          

jQuery(document).ready(function($){ 

	var counter = jQuery('#elements').val();

	jQuery('.button.delete').live("click", function(){ 
		var deletes = jQuery(this).attr('rel');
		jQuery('.wip_container.' + deletes).remove();
	}); 

	jQuery('#add_gallery').live("click", function(){ 
		counter++;
		jQuery('.orders').append('<div class="wip_container slide' + counter + '"><h5 class="element">Untitle slide</h5><div class="wip_mainbox" style="display: none;"><div class="wip_inputbox"><label for="wip_skins">Title</label><input type="text" name="galleries[slide' + counter + '][title]" value=""></div><div class="wip_inputbox"><label for="wip_skins">Description</label><textarea name="galleries[slide' + counter + '][description]" type="textarea"> </textarea></div><div class="wip_inputbox"><label for="wip_skins">Image</label><input type="text" name="galleries[slide' + counter + '][url]" class="idattachment" /><input type="button" name="just_button" class="button" value="Upload" /></div><div class="wip_inputbox"><a class="button delete" rel="slide' + counter + '">Delete</a></div></div></div>' );

	}); 
	
	jQuery( "#tabs.metaboxes" ).tabs();
	jQuery( "#tabs.metaboxes .orders" ).sortable({ revert: true });

}); 

