<?php
/*----------------------------------------------------------------------
# EDD CLASSES
------------------------------------------------------------------------*/
function igthemes_edd_body_classes( $classes ) {
        if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
            $classes[] = 'full-width-shop';
        }
	return $classes;
}
add_filter( 'body_class', 'igthemes_edd_body_classes' );

/*----------------------------------------------------------------------
# EDD SIDEBAR
------------------------------------------------------------------------*/
function igthemes_edd_sidebar() {
    global $post;
    if ( has_shortcode( $post->post_content, 'downloads' ) || 
        is_archive( 'download' ) || 
        is_tax( 'download_category' ) || 
        is_archive( 'download_tag' ) || 
        is_singular('download')) {
            get_sidebar('shop');
    } else {
        get_sidebar();
    }
}
/*----------------------------------------------------------------------
# CUSTO EDD DOWNLOAD TEMPLATE FOR ARCHIVE PAGES
------------------------------------------------------------------------*/
add_action('igthemes_single_post', 'igthemes_edd_post_content', 20 );
function igthemes_edd_post_content() { 
if (is_archive('download') || is_tax( 'download_category' ) || is_archive( 'download_tag' )) { ?>
    <div itemscope="" itemtype="http://schema.org/Product" class="edd_download">
        <div class="edd_download_image">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail( 'large', array( 'itemprop' => 'image', 'class' => 'featured-img' ) ); ?>
            </a>
        </div>
        <h3 itemprop="name" class="edd_download_title entry-title">
            <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div itemprop="description" class="edd_download_excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="edd_download_buy_button">
            <?php echo edd_get_purchase_link(); ?>
        </div>
    </div>
<?php }
}
//REMOVE DEFAULT TEMPLATE
function remove_igthemes_post_hook() {
    if (is_archive('download') || is_tax( 'download_category' ) || is_archive( 'download_tag' )) {
        remove_action('igthemes_single_post', 'igthemes_post_header', 10 );
        remove_action('igthemes_single_post', 'igthemes_post_content', 20 );
        remove_action('igthemes_single_post', 'igthemes_post_footer', 30 );
    }
}
add_action( 'igthemes_single_post', 'remove_igthemes_post_hook', 1 );

/*----------------------------------------------------------------------
# DISABLE HEADER WIDGETS FOR CART AND CHECKOUT PAGE
------------------------------------------------------------------------*/
add_action('igthemes_before_content','igthemes_edd_remove_header_widgets',10);
function igthemes_edd_remove_header_widgets() {
    global $post;
    if (has_shortcode($post->post_content, 'download_checkout')) {
        remove_action('igthemes_before_content', 'igthemes_header_widgets', 20 );
    }
}

/*----------------------------------------------------------------------
# WOOCOMMERCE CART LINK
------------------------------------------------------------------------*/
if(igthemes_option('menu_cart')==true) {
//---------------Handle cart in header fragment for ajax add to cart
function igthemes_edd_cart_link() {
    ?>
				<a href="<?php echo edd_get_checkout_uri(); ?>" class="edd-cart-button">
					<?php echo edd_currency_filter( edd_format_amount( edd_get_cart_total() ) ); ?>
				</a>
    <?php
}

add_filter( 'wp_nav_menu_items', 'igthemes_edd_cart_menu_link', 10, 2 );
function igthemes_edd_cart_menu_link( $menu, $args ) {
	//* Change 'primary' to 'secondary' to add extras to the secondary navigation menu
	if ( 'primary' !== $args->theme_location )
		return $menu;
	    ob_start();  
        igthemes_edd_cart_link();
        $item = ob_get_clean();
	    $menu  .= '<li class="cart-menu">' . $item . '</li>';
    return $menu;
}
//---------------end cart link
}