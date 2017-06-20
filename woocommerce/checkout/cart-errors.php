<?php
/**
 * Cart errors page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/cart-errors.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<p class="alert alert-warning" role="alert">
	<?php _e( 'There are some issues with the items in your cart (shown above). Please go back to the cart page and resolve these issues before checking out.', 'basicstore' ) ?>
</p>

<?php do_action( 'woocommerce_cart_has_errors' ); ?>

<p><a class="btn btn-warning wc-backward" href="<?php echo esc_url( wc_get_page_permalink( 'cart' ) ); ?>">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	<?php _e( 'Return To Cart', 'basicstore' ) ?></a></p>
