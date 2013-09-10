(function($) {
	//Easy tabs
	$(document).ready( function() {
		$('#body').easytabs();
	});
	setTimeout(function () {
		$(".options-updated").fadeOut('slow');
	},1500);
	setTimeout(function () {
		$(".options-error").fadeOut('slow');
	},3000);
 	//Show and Hide help
	$(document).ready(function(){
		//Show help for carousel
		$(".carousel_help").hide();
		$(".show_carousel_help").show();
		$(".show_carousel_help").click(function(){
			$(".carousel_help").slideToggle();
		});
		//Show help for social icons
		$(".social-icons_help").hide();
		$(".show_social-icons_help").show();
		$(".show_social-icons_help").click(function(){
			$(".social-icons_help").slideToggle();
		});	
	});
	//Upload media
	jQuery(document).ready(function() {
		var formfield;
		jQuery('.upload').click(function() {
			jQuery('html').addClass('Image');
			formfield = jQuery(this).prev().attr('name');
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			return false;
		});
		window.original_send_to_editor = window.send_to_editor;
		window.send_to_editor = function(html){
			if (formfield) {
				fileurl = jQuery('img',html).attr('src');
				jQuery('#'+formfield).val(fileurl);
				tb_remove();
				jQuery('html').removeClass('Image');
			} else {
				window.original_send_to_editor(html);
			}
		};
	});
	//Fade a div after showing for couple of seconds
	setTimeout(function () {
    	$(".settings-saved").fadeOut('slow');
}, 1000 /* Time to wait in milliseconds */);
})(jQuery);