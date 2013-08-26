jQuery(document).ready(function(){
jQuery('.cat_menu ul li:first').addClass('current_page_item');
jQuery('#ajaxprogress').hide();
    jQuery('.cat_menu ul li').click(function() {
	
	         jQuery('.cat_menu ul li').removeClass('current_page_item');
	        jQuery(this).addClass('current_page_item');
	   
	
	});

jQuery('a#cat_ajax_trigger').click(function(){
jQuery('#ajaxprogress').show();

 var categoryname= jQuery(this).text();
   jQuery("#cat-container1").hide();
     
    
	     var ajaxurl = jQuery('#ajax-script-url').val();
		
	    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,		 
		data: {action: "load-filter1", term: categoryname },
        success: function(response) {       jQuery("#cat-container").html(response);       },
		complete:function(){jQuery('#ajaxprogress').hide(); }
		});
	});
 });