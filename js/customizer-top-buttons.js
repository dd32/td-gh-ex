jQuery(document).ready(function($) {
	$('.wp-full-overlay-sidebar-content').prepend('<a style="width: 85%; margin: 10px auto; display: block; text-align: center;" href="https://tishonator.com/demo/tkidd" class="button" target="_blank">{premium-demo}</a>'.replace( '{premium-demo}', customBtns.prodemo ) );
 	$('.wp-full-overlay-sidebar-content').prepend('<a style="width: 85%; margin: 10px auto; display: block; text-align: center;" href="https://tishonator.com/product/tkidd" class="button-primary" target="_blank">{premium-get}</a>'.replace( '{premium-get}', customBtns.proget ) );
});