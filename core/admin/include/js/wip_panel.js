jQuery(document).ready(function($){ 

	jQuery('#post-formats-select input[type="radio"]').click(function() { 	
	
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
	
	jQuery('#post-formats-select input[type="radio"]:checked').each(function() { 
		
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

	jQuery( "#tabs.metaboxes" ).tabs();
	
});