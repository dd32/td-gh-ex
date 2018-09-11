<?php
//Add WooCommerce Support
add_action( 'after_setup_theme', 'absolutte_woocommerce_support' );
if ( ! function_exists( 'absolutte_woocommerce_support' ) ) {
	function absolutte_woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	}
}

//Change the default Before & After content
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'absolutte_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'absolutte_wrapper_end', 10 );

if ( ! function_exists( 'absolutte_wrapper_start' ) ) {
	function absolutte_wrapper_start() {
	  		if ( is_single() ) {
	  			get_template_part( "/template-parts/beforeloop", "woocommerce-single" ) ;
	  		}else{
	  			get_template_part( "/template-parts/beforeloop", "woocommerce" ) ;
	  		}
	}
}

if ( ! function_exists( 'absolutte_wrapper_end' ) ) {
	function absolutte_wrapper_end() {
	  		if ( is_single() ) {
	  			get_template_part( "/template-parts/afterloop", "woocommerce-single" ) ;
	  		}else{
	  			get_template_part( "/template-parts/afterloop", "woocommerce" ) ;
	  		}
	}
}







/**
 * Adds Start wrapper for Shop Sidebar
 */
if ( ! function_exists( 'absolutte_sidebar_wrapper_start' ) ) {
	function absolutte_sidebar_wrapper_start() {

		if ( is_single() ) {
			return false;
		}
		$sidebar_wrapper_class = '';
		$absolutte_shop_sidebar_position = absolutte_get_theme_mod( 'absolutte_shop_sidebar_position', 'shop-sidebar-top' );
		if ( 'shop-sidebar-top' == $absolutte_shop_sidebar_position ) {
			return false;
		}elseif ( 'shop-sidebar-left' == $absolutte_shop_sidebar_position ) {
			$sidebar_wrapper_class = 'col-md-pull-8';
		}
		echo '<div class="absolutte-sidebar-wrapper col-md-4 ' . esc_attr( $sidebar_wrapper_class ) . '">';
		echo '<ul class="absolutte-shop-sidebar-nav nav nav-tabs" role="tablist">
		  <li role="presentation" class="active">
			  <a href="#absolutte-shop-sidebar-panel" aria-controls="absolutte-shop-sidebar-panel" role="tab" data-toggle="tab"><i class="ql-funnel"></i></a>
		  </li>
		  <li role="presentation">
			  <a href="#absolutte-shop-search-panel" aria-controls="absolutte-shop-search-panel" role="tab" data-toggle="tab"><i class="absolutte-icon-magnifier"></i></a>
		  </li>
		  <li role="presentation" class="absolutte-shop-sidebar-nav-cart">
		  	<a href="#absolutte-shop-cart-panel" class="absolutte-cart-btn" aria-controls="absolutte-shop-cart-panel" role="tab" data-toggle="tab">
				  <span class="count">0</span>
				  <i class="absolutte-icon-bag2-empty"></i>
				  <i class="absolutte-icon-bag2"></i>
			</a>
		</li>
	  </ul>
	  	<div class="absolutte-shop-sidebar-tabs tab-content">
			<div role="tabpanel" class="tab-pane active" id="absolutte-shop-sidebar-panel">';
	}
}
add_action( 'woocommerce_sidebar', 'absolutte_sidebar_wrapper_start', 5 );


/**
 * Adds End wrapper for Shop Sidebar
 */
if ( ! function_exists( 'absolutte_sidebar_wrapper_end' ) ) {
	function absolutte_sidebar_wrapper_end() {
		
		if ( is_single() ) {
			return false;
		}

		$absolutte_shop_sidebar_position = absolutte_get_theme_mod( 'absolutte_shop_sidebar_position', 'shop-sidebar-top' );
		if ( 'shop-sidebar-top' == $absolutte_shop_sidebar_position ) {
			return false;
		}
	  	echo '</div>
		  <div role="tabpanel" class="tab-pane" id="absolutte-shop-search-panel">';
		  get_product_search_form( true );
		  echo '</div>
		  <div role="tabpanel" class="tab-pane" id="absolutte-shop-cart-panel">';
		  	the_widget( 'WC_Widget_Cart' );
		  echo '</div>
		  	</div><!-- /absolutte-shop-sidebar-tabs -->
		  </div><!-- /absolutte-sidebar-wrapper -->';
	}
}
add_action( 'woocommerce_sidebar', 'absolutte_sidebar_wrapper_end', 15 );



/**
 * After Shop Page
 */
if ( ! function_exists( 'absolutte_add_after_shop' ) ) {
	function absolutte_add_after_shop() {
		$absolutte_shop_post_page = get_theme_mod( 'absolutte_shop_post_page', '' );
		$absolutte_shop_sidebar_position = absolutte_get_theme_mod( 'absolutte_shop_sidebar_position', 'shop-sidebar-top' );
		if ( $absolutte_shop_post_page && is_shop() && ( 'shop-sidebar-left' == $absolutte_shop_sidebar_position || 'shop-sidebar-right' == $absolutte_shop_sidebar_position ) ) {
			echo '<div class="absolutte-post-shop col-md-12">';
				$absolutte_shop_post_page_obj = get_post( intval( $absolutte_shop_post_page ) ); 
				$absolutte_shop_post_page_content = apply_filters( 'the_content', $absolutte_shop_post_page_obj->post_content ); 
				echo $absolutte_shop_post_page_content; //Already sanitized via the filter the_content
			echo '</div><!-- /.absolutte-post-shop -->';
		}
	}
}
add_action( 'woocommerce_sidebar', 'absolutte_add_after_shop', 20 );


/**
 * Remove Catalog Ordering on Shop Page
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



/**
 * Close product link after thumbnails
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 11 );

/**
 * Remove Add to cart and add it inside product_text
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );


/**
 * Place Add to wishlist button inside product_thumbnail_wrap
 */
if ( class_exists( 'YITH_WCWL' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'absolutte_wishlist_button', 11 );
	if ( !function_exists( 'absolutte_wishlist_button' ) ) {
		function absolutte_wishlist_button() {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		}
	}
}

/**
 * Add wrapper for product text on content-product.php
 */
add_action( 'woocommerce_shop_loop_item_title', 'absolutte_wrapper_product_text_start', 8 );
add_action( 'woocommerce_after_shop_loop_item_title', 'absolutte_wrapper_product_text_end', 20 );
if ( !function_exists( 'absolutte_wrapper_product_text_start' ) ) {
	function absolutte_wrapper_product_text_start() {
		echo '<div class="product_text">';
	}
}
if ( !function_exists( 'absolutte_wrapper_product_text_end' ) ) {
	function absolutte_wrapper_product_text_end() {
		global $product;
		if ( ! $product->is_in_stock() ) {
			echo '<p class="stock out-of-stock">';
			esc_html_e( 'Out of stock', 'absolutte' );
			echo '</p>';
		}
	  	echo "</div>";
	}
}


/**
 * Insert the opening anchor tag for products in the loop.
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'absolutte_template_loop_product_link_open', 10 );
if ( ! function_exists( 'absolutte_template_loop_product_link_open' ) ) {
	function absolutte_template_loop_product_link_open() {
		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="woocommerce-LoopProduct-link absolutte-product-link">';
		echo '<i class="fa fa-refresh fa-spin fa-fw"></i>';
	}
}



/**
 * Add data for the AJAX call in products
 */
if ( ! function_exists( 'absolutte_product_data' ) ) {
	function absolutte_product_data() {
		global $product;

		$images = array();
		$thumbnails = array();
		$post_thumbnail_id = get_post_thumbnail_id( $product->get_id() );
		$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
		$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );

		$attributes = array(
			'title'                   => $image_title,
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
		);
		$image  = '<div data-thumb="' . get_the_post_thumbnail_url( $product->get_id(), 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-width="' . esc_attr( $full_size_image[1] ) . '" data-height="' . esc_attr( $full_size_image[2] ) . '">';
		$image .= get_the_post_thumbnail( $product->get_id(), 'shop_single', $attributes );
		$image .= '</a></div>';
		array_push( $images, $image );

		$attachment_ids = $product->get_gallery_image_ids();

		if ( $attachment_ids && has_post_thumbnail() ) {
			foreach ( $attachment_ids as $attachment_id ) {
				$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
				$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
				$image_title     = get_post_field( 'post_excerpt', $attachment_id );

				$attributes = array(
					'title'                   => $image_title,
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);
				$image  = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-width="' . esc_attr( $full_size_image[1] ) . '" data-height="' . esc_attr( $full_size_image[2] ) . '">';
				$image .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
		 		$image .= '</a></div>';

		 		array_push( $images, $image );
			}
		}
		global $sitepress;
		$absolutte_lang = '';
		if ( $sitepress ) {
			$absolutte_lang = $sitepress->get_current_language();
		}

		echo "<div class='absolutte_product_data' data-id='" . esc_attr( $product->get_id() ) . "' data-images='" . htmlspecialchars( json_encode( $images ), ENT_QUOTES, 'UTF-8' ) . "' data-lang='" . esc_attr( $absolutte_lang ) . "'></div>";
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'absolutte_product_data', 20 );




// Removes the "Product Category:" from the Archive Title
add_filter( 'get_the_archive_title', 'absolutte_archive_title' );
function absolutte_archive_title( $title ){
	if( is_tax() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}

//Adds rating into the Product Thumbnail
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);




//Change the number of Related products
add_filter( 'woocommerce_output_related_products_args', 'absolutte_related_products_args' );
function absolutte_related_products_args( $args ) {
	$args['posts_per_page']     = 4; // 4 related products
	$args['columns']            = 4; // arranged in columns

	return $args;
}




//Remove categories from Single Product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);




/**
 * Remove Shop Title
 */
//add_filter( 'woocommerce_show_page_title', 'absolutte_remove_shop_title' );
function absolutte_remove_shop_title() {
	if ( is_search() ) {
		return true;
	}else{
		return false;	
	}
	
}




/**
 * Wrap the main Product Loop Start
 */
if ( ! function_exists( 'absolutte_loop_wrap_start' ) ) {
	function absolutte_loop_wrap_start() {
		echo '<div class="absolutte-main-products-wrap">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'absolutte_loop_wrap_start', 40 );
/**
 * Wrap the main Product Loop End
 */
if ( ! function_exists( 'absolutte_loop_wrap_end' ) ) {
	function absolutte_loop_wrap_end() {
		echo '</div><!-- /.absolutte-main-products-wrap -->';
	}
}
add_action( 'woocommerce_after_shop_loop', 'absolutte_loop_wrap_end', 5 );




/**
 * Hook in on activation
 */

/**
 * Define image sizes
 */
if ( ! function_exists( 'absolutte_woocommerce_image_dimensions' ) ) {
	function absolutte_woocommerce_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

	  	$catalog = array(
			'width' 	=> '450',	// px
			'height'	=> '450',	// px
			'crop'		=> 1 		// true
		);

		$single = array(
			'width' 	=> '800',	// px
			'height'	=> '800',	// px
			'crop'		=> 1 		// true
		);

		$thumbnail = array(
			'width' 	=> '60',	// px
			'height'	=> '60',	// px
			'crop'		=> 1 		// true
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
}
add_action( 'after_switch_theme', 'absolutte_woocommerce_image_dimensions', 1 );



/**
 * Define number of porducts to show per page
 */

if ( ! function_exists( 'absolutte_change_product_amount' ) ) {
	function absolutte_change_product_amount( $cols ) {
		$product_amout = get_theme_mod( 'absolutte_shop_products_amount', '12' );
		return $product_amout;
	}
}
add_filter( 'loop_shop_per_page', 'absolutte_change_product_amount', 20 );


/**
 * Replace default thumbnail function
 */
if ( ! function_exists( 'absolutte_template_loop_product_thumbnail' ) ) {
	function absolutte_template_loop_product_thumbnail() {
		global $post;
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );
		$image_print = '';

		if ( has_post_thumbnail() ) {
			$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			$image_print =  get_the_post_thumbnail( $post->ID, $image_size, array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			) );
		} elseif ( wc_placeholder_img_src() ) {
			$image_print =  wc_placeholder_img( $image_size );
		}
		echo wp_kses_post( $image_print );

		//Second image
		$absolutte_shop_product_layout = get_theme_mod( 'absolutte_shop_product_layout', 'shop-layout-2' );
		if ( isset( $_GET[ 'product_layout' ] ) ) {
		    $absolutte_shop_product_layout = sanitize_text_field( wp_unslash( $_GET[ 'product_layout' ] ) );
		}
		$absolutte_shop_second_image = get_theme_mod( 'absolutte_shop_second_image', 'off' );

		if ( 'shop-layout-2' == $absolutte_shop_product_layout && '1' == $absolutte_shop_second_image ) {
			//Get one more image
			global $product;
			$attachment_ids = $product->get_gallery_image_ids();
			if ( count( $attachment_ids ) > 0 ) {
				$default_attr = array(
					'class'	=> "product_second_img"
				);
				$att_ids = array_values( $attachment_ids );
				$image = wp_get_attachment_image( $att_ids[0], $image_size, false, $default_attr );
				echo wp_kses_post( $image );
			}
		}
	}
}
//Replace default thumbnail function for "absolutte_template_loop_product_thumbnail"
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'absolutte_template_loop_product_thumbnail', 10 );






/**
 * Updates the total with AJAX
 */
if ( ! function_exists( 'absolutte_header_add_to_cart_fragment' ) ) {
	function absolutte_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		$cart_empty = ( WC()->cart->cart_contents_count > 0 ) ? '' : 'cart-empty';
		?>
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="ql_cart-btn <?php echo esc_attr( $cart_empty ); ?>">
			<span class="count"><?php echo esc_html( WC()->cart->cart_contents_count ); ?></span>
            <span class="absolutte-cart-word"><?php echo sprintf( esc_html__( 'Cart (%s)', 'absolutte' ), esc_html( WC()->cart->cart_contents_count ) );  ?></span>
			<i class="absolutte-icon-bag2-empty"></i>
			<i class="absolutte-icon-bag2"></i>
		</a>
		<?php

		$fragments['.ql_cart-btn'] = ob_get_clean();

		ob_start();
		$cart_empty = ( WC()->cart->cart_contents_count > 0 ) ? '' : 'cart-empty';
		?>
		<a href="#absolutte-shop-cart-panel" class="absolutte-cart-btn <?php echo esc_attr( $cart_empty ); ?>">
			<span class="count"><?php echo esc_html( WC()->cart->cart_contents_count ); ?></span>
            <span class="absolutte-cart-word"><?php echo sprintf( esc_html__( 'Cart (%s)', 'absolutte' ), esc_html( WC()->cart->cart_contents_count ) );  ?></span>
			<i class="absolutte-icon-bag2-empty"></i>
			<i class="absolutte-icon-bag2"></i>
		</a>
		<?php

		$fragments['.absolutte-cart-btn'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'absolutte_header_add_to_cart_fragment' );





/**
 * Register Widget Area for Shop Sidebar
 */
function absolutte_register_shop_sidebar() {
	$shop_sidebar_args = array(
		'name' => 'Shop Sidebar',
		'id'   => 'shop-sidebar',
		'description'   => 'These are widgets for the Shop sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	);

	$absolutte_shop_sidebar_position = absolutte_get_theme_mod( 'absolutte_shop_sidebar_position', 'shop-sidebar-top' );
	if ( 'shop-sidebar-top' == $absolutte_shop_sidebar_position ) {
		$shop_sidebar_args['before_widget'] = '<div id="%1$s" class="widget col-sm-6 col-md-4 %2$s">';
	}


	register_sidebar( $shop_sidebar_args );
}
add_action( 'widgets_init', 'absolutte_register_shop_sidebar' );





/*
Single Product Hooks
============================================================*/
/**
 * Add Thumbnails to the Image Slider
 */
function absolutte_single_product_add_mini_thumbnails(){
	?>
	<div class="absolutte-product-thumbnails">
    </div><!-- /absolutte-product-thumbnails -->
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'absolutte_single_product_add_mini_thumbnails', 25 );


$absolutte_shop_single_product_layout = get_theme_mod( 'absolutte_shop_single_product_layout', 'product-fullwidth' );
if ( isset( $_GET[ 'single_product_layout' ] ) ) {
    $absolutte_shop_single_product_layout = sanitize_text_field( wp_unslash( $_GET[ 'single_product_layout' ] ) );
}
if ( 'product-narrow' == $absolutte_shop_single_product_layout ) {
	/**
	 * HTML wrap start for single images wrap
	 */
	function absolutte_single_product_images_wrap_start(){
		?>
		<div class="absolutte-product-images-wrap">
		<?php
	}
	/**
	 * HTML wrap start for single images wrap
	 */
	function absolutte_single_product_images_wrap_finish(){
		?>
		</div>
		<?php
	}
	add_action( 'woocommerce_before_single_product_summary', 'absolutte_single_product_images_wrap_start', 18 );
	add_action( 'woocommerce_before_single_product_summary', 'absolutte_single_product_images_wrap_finish', 28 );
}


/**
 * HTML wrap start for Single page summary
 */
function absolutte_single_product_wrap_start_summary(){
	?>
	<div class="summary-top">
		<?php woocommerce_breadcrumb(); ?>
		<?php woocommerce_template_single_rating(); ?>
		<div class="clearfix"></div>
	</div><!-- /summary-top -->
	<div class="entry">
	<?php
}
add_action( 'woocommerce_single_product_summary', 'absolutte_single_product_wrap_start_summary', 2 );


//Remove ratings from summary (they are added in summary top)
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );



add_action( 'woocommerce_single_product_summary', 'wc_print_notices', 2 );

/**
 * HTML wrap end for Single page summary
 */
function absolutte_single_product_wrap_end_summary(){
	?>
	</div><!-- /entry -->

    <div class="social-share">
    	<?php
    	if ( function_exists( 'sharing_display' ) ) {
		    sharing_display( '', true );
		}
    	 ?>
    </div>
	<?php
}
add_action( 'woocommerce_single_product_summary', 'absolutte_single_product_wrap_end_summary', 60 );


/**
 * Adds SKU, Categories and Tags below tabs in Single Product
 */
if ( ! function_exists( 'absolutte_single_product_after_tabs' ) ) {
	function absolutte_single_product_after_tabs(){
		global $product;

		$absolutte_cats = get_the_terms( $product->get_id(), 'product_cat' );
		$absolutte_tag = get_the_terms( $product->get_id(), 'product_tag' );

		if ( $product->get_sku() || $absolutte_cats || $absolutte_tag) {
		?>
			<div class="absolutte-product-metadata">
				<?php
				if( $product->get_sku() ){
				?>
					<div class="absolutte-product-metadata-item"><span class="absolutte-product-metadata-desc"><?php echo esc_html__( 'SKU:', 'absolutte' ); ?></span> <?php echo esc_html( $product->get_sku() ); ?></div>
				<?php 
				}
				if( $absolutte_cats ){
				?>
					<div class="absolutte-product-metadata-item"><span class="absolutte-product-metadata-desc"><?php echo esc_html( _n( 'Category:', 'Categories:', sizeof( $absolutte_cats ), 'absolutte' ) ); ?></span> <?php echo wc_get_product_category_list( $product->get_id(), ', ' ); ?></div>
				<?php
				}
				if( $absolutte_tag ){
				?>
					<div class="absolutte-product-metadata-item"><span class="absolutte-product-metadata-desc"><?php echo esc_html( _n( 'Tag:', 'Tags:', sizeof( $absolutte_tag ), 'absolutte' ) ); ?></span> <?php echo wc_get_product_tag_list( $product->get_id(), ', ' ); ?></div>
				<?php
				}
				?>
			</div>
		<?php
		}
		
	}
}
add_action( 'woocommerce_after_single_product_summary', 'absolutte_single_product_after_tabs', 13 );



// Add the slug type for each cart item.
function absolutte_woocommerce_cart_item_class( $item_class, $cart_item, $cart_item_key ) {
  if( ! empty( $cart_item ) && ! empty( $cart_item['data'] ) ) {
    $item_class .= ' post-' . esc_attr( $cart_item['data']->get_id() );
  }
  return $item_class;
}
add_filter( 'woocommerce_cart_item_class', 'absolutte_woocommerce_cart_item_class', 10, 3 );


/**
 * Add support for PhotoSwipe on WooCommerce Images
 */
if ( ! function_exists( 'absolutte_woocommerce_image_photoswipe' ) ) {
	function absolutte_woocommerce_image_photoswipe( $html, $thumbnail_id ) {

		$full_size_image   = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		$to_replace = 'class="woocommerce-product-gallery__image"><a data-width="' . esc_attr( $full_size_image[1] ) . '" data-height="' . esc_attr( $full_size_image[2] ) . '"';

		$html = str_replace( 'class="woocommerce-product-gallery__image"><a', $to_replace, $html );

		return $html;

	}
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'absolutte_woocommerce_image_photoswipe', 10, 2 );



/**
 * This makes the product thumbnails same size as main product image
 */
if ( ! function_exists( 'absolutte_woocommerce_gallery_image_size' ) ) {
	function absolutte_woocommerce_gallery_image_size( $thumbnail_size ) {

		return 'woocommerce_single';

	}
}
add_filter( 'woocommerce_gallery_thumbnail_size', 'absolutte_woocommerce_gallery_image_size', 10, 2 );





