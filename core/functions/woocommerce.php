<?php


/*-----------------------------------------------------------------------------------*/
/* Woocommerce Hooks */
/*-----------------------------------------------------------------------------------*/ 
	
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

/*-----------------------------------------------------------------------------------*/
/* Woocommerce remove breadcrumbs */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhena_lite_remove_breadcrumbs' ) ) {

	function alhena_lite_remove_breadcrumbs() {
    	
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	
	}

	add_action( 'init', 'alhena_lite_remove_breadcrumbs' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce header cart */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhena_lite_header_cart' ) ) {

	function alhena_lite_header_cart() { ?>

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

if ( ! function_exists( 'alhena_lite_cart_link_fragment' ) ) {

	function alhena_lite_cart_link_fragment( $fragments ) {
	
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
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'alhena_lite_cart_link_fragment' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_woocommerce_before_main_content')) {

	function alhena_lite_woocommerce_before_main_content() { 
	
		if ( is_product() ) {
			
			$classes = "product-wrapper" ;
	
		} else {
	
			$classes = "product-wrapper products-list" ;
	
		}

		do_action( 'alhena_lite_header_content' );

	
?>
	
	<div class="container">
	
		<div class="row">
		
			<div class="<?php echo alhena_lite_template('span') . " " . alhena_lite_template('sidebar') . " " . $classes; ?>" >
	
<?php

	}
	
	add_action('woocommerce_before_main_content', 'alhena_lite_woocommerce_before_main_content', 10);

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_woocommerce_after_main_content')) {
	
	function alhena_lite_woocommerce_after_main_content() { ?>
	
			</div>
			
			<?php 
			
				if ( alhena_lite_template('span') == "col-md-8" ) :

					get_sidebar(); 
					
				endif;
				
			?>
	
		</div>
		
	</div>
    
<?php
	
		do_action('alhena_lite_masonry_script');
		do_action( 'alhena_lite_footer_content' );

	}
	
	add_action('woocommerce_after_main_content', 'alhena_lite_woocommerce_after_main_content', 10);

}

/*-----------------------------------------------------------------------------------*/
/* Replace woocommerce_get_product_thumbnail function  */
/*-----------------------------------------------------------------------------------*/ 
	
if ( ! function_exists( 'alhena_lite_get_wc_product_thumbnail' ) ) {
	
	function alhena_lite_get_wc_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
		
		global $post, $product;
		$imgSize = apply_filters( 'single_product_archive_thumbnail_size', $size);

		if ( $product ) {
			return (alhena_lite_setting('wip_linkable_product_thumbnails') == 'on') ? '<a href="' . get_permalink( $post->ID ) . '">' . $product->get_image( $imgSize ) . '</a>' : $product->get_image( $imgSize );
		} else {
			return '';
		}
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Replace wc_get_gallery_image_html function */ 
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhena_lite_wc_get_gallery_image_html' ) ) {
	
	function alhena_lite_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
		$flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
		$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
		$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
		$image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
		$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
		$image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
			'title'                   => get_post_field( 'post_title', $attachment_id ),
			'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
			'data-src'                => $full_src[0],
			'data-large_image'        => $full_src[0],
			'data-large_image_width'  => $full_src[1],
			'data-large_image_height' => $full_src[2],
			'class'                   => $main_image ? 'wp-post-image' : '',
		) );
	
		return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="product-thumbnail woocommerce-product-gallery__image"><a data-rel="prettyPhoto[product-gallery]" href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
	}

}


?>