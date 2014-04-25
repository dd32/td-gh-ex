// JavaScript Document
jQuery(document).ready(function ($) {

	$(".rwd-container").hide();

	$("h3.rwd-toggle").click(function () {
		$(this).toggleClass("active").next().slideToggle("fast");
		return false; //Prevent the browser jump to the link anchor
	});

});
jQuery(document).ready(function ($) {
	setTimeout(function () {
		$(".fade").fadeOut("slow", function () {
			$(".fade").remove();
		});

	}, 2000);
});

jQuery(document).ready(function($){ 
 
    var custom_uploader;
 
    $('.upload_image_button').click(function(e) {
 	$t = $(this)
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $t.parent().find('.upload_image').val(attachment.url);
			$t.parent().find('.upload_img').attr('src',attachment.url);
			
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
	

 
	$('.regular-color').wpColorPicker({defaultColor:'#000'});
 
 
});