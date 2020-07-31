<?php
/**
* section-category.php
* @author    Denis Franchi
* @package   Atomy
* 
*/
?>

<!-- Section Category -->
<section class="<?php if ( false == get_theme_mod('atomy_enable_full_width_category', true) ):?>container-fluid pr-2<?php endif;?> <?php if ( true == get_theme_mod('atomy_enable_full_width_category', true) ):?><?php echo esc_html( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?> at-content-woocommerce-page-single-product">
<h2 class="mb-5 mr-2 <?php echo esc_attr(get_theme_mod('at_text_align_title_category'));?> at_contr_title_category_shop" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_title_category_section','no-effect'));?>" data-aos-duration="500">
<?php echo esc_html(get_theme_mod( 'at_category_shop_title'));?>	
</h2> 
<div class="row ml-0 mr-0">
<?php
                      // Check if WooCommerce is active 
                      if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'atomy_active_plugins', get_option( 'active_plugins' ) ) ) ) {
                      // Put your plugin code here
                     
     if ( woocommerce_product_loop() ) {
	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	
	woocommerce_product_loop_start();
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();
			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );
			wc_get_template_part( 'content', 'product' );
		}
	}
	woocommerce_product_loop_end();
	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
}

?>
</div>
</section>


