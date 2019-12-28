<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */
defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
 
<li <?php wc_product_class(); ?>>

<figure class="snip1418 item" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_category_product_shop'));?>" data-aos-duration="<?php echo esc_attr(get_theme_mod( 'at_d_effect_category_product_shop'));?>">

<?php
       // Check if ti-woocommerce-wishlist is active 
      if ( in_array( 'ti-woocommerce-wishlist/ti-woocommerce-wishlist.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				// Put your plugin code here
      echo do_shortcode("[ti_wishlists_addtowishlist loop=yes]");
			}
    ?>
<div class="at-captur-img-product">
	<?php
/**
 * Hook: woocommerce_before_shop_loop_item_title.
 *
 * @hooked woocommerce_show_product_loop_sale_flash - 10
 * @hooked woocommerce_template_loop_product_thumbnail - 10
 */
do_action( 'woocommerce_before_shop_loop_item_title' );?>
</div>

<div class="add-to-cart">
<?Php
		/**
	 * Hook: woocommerce_after_shop_loop_item.
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
do_action( 'woocommerce_after_shop_loop_item' );?>
</div>

  <figcaption>
  <?php

/**
 * Hook: woocommerce_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_product_title - 10
 */
do_action( 'woocommerce_shop_loop_item_title' );?>
  
    <div class="price">
		<?php
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	?>
  </div>
</figcaption>
<a href="<?php esc_url(the_permalink());?>"></a>

</figure>

</li>






