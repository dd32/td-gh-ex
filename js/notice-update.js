jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.avik-9-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'avik_9_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajaxurl, data, function() {
		});
	})
});



jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.avik-10-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'avik_10_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajaxurl, data, function() {
		});
	})
});