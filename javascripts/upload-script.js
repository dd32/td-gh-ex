jQuery(document).ready(function() {
	// loads for theme options default thumbnail
	jQuery('#upload_post_default').click(function() {
		formfield = jQuery('#post-default-image');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true'); 
		window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#post-default-image').val(imgurl);
		tb_remove();
		}
		return false;
	});
	
	jQuery('#upload_bartleby_logo').click(function() {
		// loads for site logo
		formfield = jQuery('#bartleby_site_logo');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true'); 
		window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#bartleby_site_logo').val(imgurl);
		tb_remove();
		}
		return false;
	});
});