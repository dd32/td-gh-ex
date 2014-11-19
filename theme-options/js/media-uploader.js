(function($) {
	$(document).ready(function() {
		function photoshoot_add_file(event, selector) {
		
			var upload = $(".uploaded-file"), frame;
			var $el = $(this);

			event.preventDefault();

			// If the media frame already exists, reopen it.
			if ( frame ) {
				frame.open();
				return;
			}

			// Create the media frame.
			frame = wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			frame.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = frame.state().get('selection').first();
				frame.close();
				selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				selector.find('.upload-button').unbind().addClass('remove-file').removeClass('upload-button');
				selector.find('.of-background-properties').slideDown();
				selector.find('.remove-image, .remove-file').on('click', function() {
					photoshoot_remove_file( $(this).parents('.section') );
				});
			});

			// Finally, open the modal.
			frame.open();
		}
        
		function photoshoot_remove_file(selector) {
			selector.find('.remove-image').hide();
			selector.find('.upload').val('');
			selector.find('.of-background-properties').hide();
			selector.find('.screenshot').slideUp();
			selector.find('.remove-file').unbind().addClass('upload-button').removeClass('remove-file');
			// We don't display the upload button if .upload-notice is present
			// This means the user doesn't have the WordPress 3.5 Media Library Support
			if ( $('.section-upload .upload-notice').length > 0 ) {
				$('.upload-button').remove();
			}
			selector.find('.upload-button').live('click', function() {
				photoshoot_add_file(event, $(this).parents('.section'));
			});
		}
		
		$('.remove-image, .remove-file').live('click', function() {
			photoshoot_remove_file( $(this).parents('.section') );
        });
        
        $('.upload-button').live('click', function( event ) {
        	photoshoot_add_file(event, $(this).parents('.section'));
        });
        
    });
	
})(jQuery);

jQuery(document).ready( function(){
 function media_upload( button_class) {
    var _custom_media = true,
    _orig_send_attachment = wp.media.editor.send.attachment;
    jQuery('body').on('click',button_class, function(e) {
        var button_id ='#'+jQuery(this).attr('id');
        /* console.log(button_id); */
        var self = jQuery(button_id);
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = jQuery(button_id);
        var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
            if ( _custom_media  ) { 
               jQuery('.photoshoot_media_url').val(attachment.url);
            } else {
                return _orig_send_attachment.apply( button_id, [props, attachment] );
            }
        }
        wp.media.editor.open(button);
        return false;
    });
}
media_upload( '.photoshoot_media_upload');
});
