jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.avik-6-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'avik_6_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajax_url, data, function() {
		});
	})
});