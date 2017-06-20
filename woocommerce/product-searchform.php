<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<div class="form-group">

		<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'basicstore' ); ?></label>

		<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field form-control" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'basicstore' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

		<button class="btn btn-link" type="submit" aria-label="<?php echo esc_attr_x( 'Search', 'submit button', 'basicstore' ); ?>" title="<?php echo esc_attr_x( 'Search', 'submit button', 'basicstore' ); ?>">
			 <i class="glyphicon glyphicon-search"></i>
		</button>

	</div>

	<input type="hidden" name="post_type" value="product" />

</form>
