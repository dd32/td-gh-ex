jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.avik-9-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'avik_9_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajax_url, data, function() {
		});
	})
});