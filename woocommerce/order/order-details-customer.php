<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="woocommerce-customer-details">

	<h2><?php _e( 'Customer details', 'basicstore' ); ?></h2>

	<div class="table-responsive">

		<table class="table table-bordered woocommerce-table woocommerce-table--customer-details shop_table customer_details">

			<?php if ( $order->get_customer_note() ) : ?>
				<tr>
					<th><?php _e( 'Note:', 'basicstore' ); ?></th>
					<td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
				</tr>
			<?php endif; ?>

			<?php if ( $order->get_billing_email() ) : ?>
				<tr>
					<th><?php _e( 'Email:', 'basicstore' ); ?></th>
					<td><?php echo esc_html( $order->get_billing_email() ); ?></td>
				</tr>
			<?php endif; ?>

			<?php if ( $order->get_billing_phone() ) : ?>
				<tr>
					<th><?php _e( 'Phone:', 'basicstore' ); ?></th>
					<td><?php echo esc_html( $order->get_billing_phone() ); ?></td>
				</tr>
			<?php endif; ?>

			<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

		</table>

	</div><!-- .table-responsive -->

	<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

	<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">

		<div class="row">
			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>
			<div class="col-sm-6">
			<?php else : ?>
			<div class="col-md-12">
			<?php endif; ?>
				<div class="panel panel-default addresses">
				  <div class="panel-heading">
				    <h3 class="panel-title"><?php _e( 'Billing Address', 'basicstore' ); ?></h3>
				  </div>
				  <div class="panel-body">
						<address>
							<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'basicstore' ); ?>
						</address>
				  </div>
				</div>
			</div>
			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>
			<div class="col-sm-6">
				<div class="panel panel-default addresses">
				  <div class="panel-heading">
				    <h3 class="panel-title"><?php _e( 'Billing Address', 'basicstore' ); ?></h3>
				  </div>
				  <div class="panel-body">
						<address>
							<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'basicstore' ); ?>
						</address>
				  </div>
				</div>
			</div>
			<?php endif; ?>
		</div>

	</section><!-- /.col2-set -->

	<?php endif; ?>

</section>
