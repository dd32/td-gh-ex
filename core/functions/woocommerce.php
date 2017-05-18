<?php


/*-----------------------------------------------------------------------------------*/
/* Woocommerce Hooks */
/*-----------------------------------------------------------------------------------*/ 
	
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

/*-----------------------------------------------------------------------------------*/
/* Woocommerce remove breadcrumbs */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhenalite_remove_breadcrumbs' ) ) {

	function alhenalite_remove_breadcrumbs() {
    	
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	
	}

	add_action( 'init', 'alhenalite_remove_breadcrumbs' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce header cart */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhenalite_header_cart' ) ) {

	function alhenalite_header_cart() { ?>

        <section class="header-cart">
        
            <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart','alhena-lite' ); ?>">
                
                <i class="fa fa-shopping-cart"></i> 
                <span class="cart-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->cart_contents_count, 'alhena-lite' ), WC()->cart->cart_contents_count ); ?></span>
    
            </a>
                        
            <div class="header-cart-widget">
            
                <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
            
            </div>
            
        </section>
    
<?php

	}
	
}

if ( ! function_exists( 'alhenalite_cart_link_fragment' ) ) {

	function alhenalite_cart_link_fragment( $fragments ) {
	
		ob_start();

?>
		<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart','alhena-lite' ); ?>">
            
			<i class="fa fa-shopping-cart"></i> 
			<span class="cart-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->cart_contents_count, 'alhena-lite' ), WC()->cart->cart_contents_count ); ?></span>

		</a>
        
<?php

		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'alhenalite_cart_link_fragment' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_woocommerce_before_main_content')) {

	function alhenalite_woocommerce_before_main_content() { 
	
		if ( is_product() ) {
			
			$classes = "product-wrapper" ;
	
		} else {
	
			$classes = "product-wrapper products-list" ;
	
		}

		do_action( 'alhenalite_header_content' );

	
?>
	
	<div class="container">
	
		<div class="row">
		
			<div class="<?php echo alhenalite_template('span') . " " . alhenalite_template('sidebar') . " " . $classes; ?>" >
	
<?php

	}
	
	add_action('woocommerce_before_main_content', 'alhenalite_woocommerce_before_main_content', 10);

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_woocommerce_after_main_content')) {
	
	function alhenalite_woocommerce_after_main_content() { ?>
	
			</div>
			
			<?php 
			
				if ( alhenalite_template('span') == "col-md-8" ) :

					get_sidebar(); 
					
				endif;
				
			?>
	
		</div>
		
	</div>
    
<?php
	
		do_action('alhenalite_masonry_script');
		do_action( 'alhenalite_footer_content' );

	}
	
	add_action('woocommerce_after_main_content', 'alhenalite_woocommerce_after_main_content', 10);

}

?>