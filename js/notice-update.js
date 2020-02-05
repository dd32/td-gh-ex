jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.avik-4-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'avik_4_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajax_url, data, function() {
		});
	})
});