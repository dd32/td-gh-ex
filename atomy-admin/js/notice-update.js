/**
 * notice-update.js
 *
 * author    Denis Franchi
 * package   Atomy
 */


jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.atomy-2-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'atomy_2_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajax_url, data, function() {
		});
	})
});