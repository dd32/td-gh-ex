<?php
/*----------------------------------------------------------------------
# WOOCOMMERCE CLASSES
------------------------------------------------------------------------*/
function igthemes_woocommerce_body_classes( $classes ) {
        if ( ! is_active_sidebar( 'sidebar-shop' )) {
            $classes[] = 'full-width-shop';
        }
	return $classes;
}
add_filter( 'body_class', 'igthemes_woocommerce_body_classes' );
/*----------------------------------------------------------------------
# WOOCOMMERCE SIDEBAR
------------------------------------------------------------------------*/
function igthemes_woocommerce_sidebar() {
    if ( is_woocommerce() || is_cart() || is_checkout() || is_product()) {
        get_sidebar('shop');
    } else {
        get_sidebar();
    }
}
/*----------------------------------------------------------------------
# WOOCOMMERCE BREADCRUMB
------------------------------------------------------------------------*/
add_filter( 'woocommerce_breadcrumb_defaults', 'igthemes_woocommerce_breadcrumbs' );
function igthemes_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="breadcrumb" itemprop="breadcrumb"><div class="container">',
            'wrap_after'  => '</div></nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'basic-shop' ),
        );
}
/*----------------------------------------------------------------------
# WOOCOMMERCE CART LINK
------------------------------------------------------------------------*/
if(igthemes_option('menu_cart')==true) {
//---------------Handle cart in header fragment for ajax add to cart
add_filter('add_to_cart_fragments', 'header_add_to_cart_fragment');
function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
 
    ob_start();
 
    igthemes_wc_cart_link();
 
    $fragments['a.wc-cart-button'] = ob_get_clean();
 
    return $fragments;
 
}
 
function igthemes_wc_cart_link() {
    global $woocommerce;
    ?>
    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="wc-cart-button">
        <?php echo $woocommerce->cart->get_cart_total();  ?>
    </a>
    <?php
}

add_filter( 'wp_nav_menu_items', 'igthemes_wc_cart_menu_link', 10, 2 );
function igthemes_wc_cart_menu_link( $menu, $args ) {
	//* Change 'primary' to 'secondary' to add extras to the secondary navigation menu
	if ( 'primary' !== $args->theme_location )
		return $menu;
	    ob_start();  
        igthemes_wc_cart_link();
        $item = ob_get_clean();
	    $menu  .= '<li class="cart-menu">' . $item . '</li>';
    return $menu;
}
//---------------end cart link
}
/*----------------------------------------------------------------------
# WOOCOMMERCE PRODUCTS PER ROW
------------------------------------------------------------------------*/
// Change number or products per row to 3
add_filter('loop_shop_columns', 'igthemes_loop_columns');
if (!function_exists('igthemes_loop_columns')) {
	function igthemes_loop_columns() {
		return 3; // 3 products per row
	}
}
/*----------------------------------------------------------------------
# WOOCOMMERCE RELATED, CROSS SELLS, UPSELLS PRODUCTS
------------------------------------------------------------------------*/
// Change number of columns and products for related products
add_filter( 'woocommerce_output_related_products_args', 'igthemes_related_products_args' );
function igthemes_related_products_args( $args ) {
	$args = apply_filters( 'igthemes_related_products_args', array(
		'posts_per_page' => 4,
		'columns'        => 4,
	) );

	return $args;
}

// Change number of columns for cross sells products
add_filter( 'woocommerce_cross_sells_columns', 'igthemes_cross_sells_columns' );
function igthemes_cross_sells_columns( $columns ) {
    return 2;
}

//Change number of columns and products to display for upsell products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'igthemes_output_upsells', 15 );

if ( ! function_exists( 'igthemes_output_upsells' ) ) {
	function igthemes_output_upsells() {
	    woocommerce_upsell_display( 4,4 ); // Display 3 products in rows of 3
	}
}

/*----------------------------------------------------------------------
# WOOCOMMERCE PRODUCTS PER PAGE
------------------------------------------------------------------------*/
add_filter( 'loop_shop_per_page', 'igthemes_products_per_page' );
function igthemes_products_per_page() {
	return intval( apply_filters( 'igthemes_products_per_page', 12 ) );
}

/*----------------------------------------------------------------------
# DISABLE HEADER WIDGETS FOR CART AND CHECKOUT PAGE
------------------------------------------------------------------------*/
add_action('igthemes_before_content','igthemes_wc_remove_header_widgets',10);
function igthemes_wc_remove_header_widgets() {
    if (is_cart() || is_checkout()) {
        remove_action('igthemes_before_content', 'igthemes_header_widgets', 20 );
    }
}
/*----------------------------------------------------------------------
# REPLACE PAGINATION WITH THEME DEFAULT
------------------------------------------------------------------------*/
remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
function woocommerce_pagination() {
		igthemes_posts_navigation(); 		
	}
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);