<?php
/**
 * Order tracking form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/form-tracking.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

?>

<form action="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" method="post" class="track_order well">

	<p><?php _e( 'To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.', 'basicstore' ); ?></p>

	<div class="form-group form-row-first">
		<label for="orderid"><?php _e( 'Order ID', 'basicstore' ); ?></label>
		<input class="form-control" type="text" name="orderid" id="orderid" placeholder="<?php esc_attr_e( 'Found in your order confirmation email.', 'basicstore' ); ?>" />
	</div>

	<div class="form-group form-row-last">
		<label for="order_email"><?php _e( 'Billing Email', 'basicstore' ); ?></label>
		<input class="form-control" type="text" name="order_email" id="order_email" placeholder="<?php esc_attr_e( 'Email you used during checkout.', 'basicstore' ); ?>" />
	</div>
	<div class="clear"></div>

	<div class="form-row">
		<input type="submit" class="btn btn-primary" name="track" value="<?php esc_attr_e( 'Track', 'basicstore' ); ?>" />
	</div>
	<?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>

</form>
