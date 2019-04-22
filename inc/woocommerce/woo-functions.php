<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WooCommerce Functions
 */

 
/* View Product Button */
add_action('woocommerce_after_shop_loop_item','baw_replace_add_to_cart');

function baw_replace_add_to_cart() {
	
		global $product;
		$link = $product->get_permalink();
		echo do_shortcode('<a href="'.$link.'" class="button viewbutton">'. __( "View Product", 'baw' ) .'</a>');
	
}

/* WooCommerce Pagination */
function woocommerce_pagination() { ?>

			<div class="nextpage">
			
				<div class="pagination">
				
					<?php echo paginate_links(); ?>
					
				</div> 
				
			</div>   

  <?php  }