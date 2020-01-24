jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.avik-1-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'avik_1_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajaxurl, data, function() {
		});
	})
});