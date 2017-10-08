jQuery(document).ready(function() {

	jQuery( "#sortable" ).sortable();
	
	jQuery( "#sortable" ).disableSelection();
	

	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://www.insertcart.com/contact-us/" class="button" target="_blank">{support}</a>'.replace('{support}',scatmanjhon.support));
	
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://www.insertcart.com/product/promax-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',scatmanjhon.pro));
	
	jQuery( '.ui-state-default' ).on( 'mousedown', function() {

		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});
	
});
