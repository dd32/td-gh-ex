<?php
/**
 * Loop Rating
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $pinnacle;
if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' ) {
	return;
}	
	if(isset($pinnacle['shop_rating'])) { $show_rating = $pinnacle['shop_rating'];} else {$show_rating = 1;} 
	if($show_rating == 1) {
			if ( version_compare( WC_VERSION, '2.7', '>' ) ) {
				$rating_html = wc_get_rating_html($product->get_average_rating());
			} else	{
				$rating_html = $product->get_rating_html();
			}
		 	if ( $rating_html ) { ?>
				<a href="<?php the_permalink(); ?>"><?php echo $rating_html; ?></a>
	<?php } else { 
			echo '<span class="notrated">'.__('not rated', 'pinnacle').'</span>'; 
		} 
	} 
