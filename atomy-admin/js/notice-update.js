/**
 * notice-update.js
 *
 * author    Denis Franchi
 * package   Atomy
 */


jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.atomy-4-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'atomy_4_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajax_url, data, function() {
		});
	})
});