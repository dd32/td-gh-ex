<?php
/**
 * Agama WooCommerc Support
 *
 * @since Agama v1.0
 */
if( class_exists( 'Woocommerce' ) ):
	class Agama_WC
	{
		function __construct() {
			// Unhook WooCommerce Wrappers
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
			
			// Hook Agama Wrappers
			add_action('woocommerce_before_main_content', array( $this, 'agama_wrapper_start' ), 10);
			add_action('woocommerce_after_main_content', array( $this, 'agama_wrapper_end' ), 10);
			
			// Products per Page
			$per_page = get_theme_mod('products_per_page', '12');
			add_filter( 'loop_shop_per_page', create_function( '$cols', "return {$per_page};" ), 20 );
		}
		
		function agama_wrapper_start() {
			echo '<div id="primary" class="site-content col-md-9">';
				echo '<div id="content" role="main">';
		}
		
		function agama_wrapper_end() {
				echo '</div>';
			echo '</div>';
		}
	}
new Agama_WC;
endif;