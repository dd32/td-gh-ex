// JavaScript Document

jQuery(document).ready(function(e) {
	jQuery(window).scroll(function(){
	var e=jQuery(window).width();
	//alert (e);

		if(jQuery(this).scrollTop()>50)
		{	
			jQuery('header .margin-top-bottom-2').css({'margin':'0px 0px'});
		}
		if(jQuery(this).scrollTop()<50)
		{
			jQuery('header .margin-top-bottom-2').css({'margin':'50px 0px 0px 0px'});
		}
		
		if(jQuery(this).scrollTop()>50)
		{	
			jQuery('header .margin-top-bottom-3').css({'margin':'32px 0px'});
		}
		if(jQuery(this).scrollTop()<50)
		{
			jQuery('header .margin-top-bottom-3').css({'margin':'82px 0px 0px 0px'});
		}
	
	});
});