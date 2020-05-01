jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.avik-8-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'avik_8_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajax_url, data, function() {
		});
	})
});