<?php
/**
 * Woocommerce compatibility
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'abc_wrapper_start', 10 );
function abc_wrapper_start() {
	?>
	<div class="container">
		<div class="row">
			<div id="primary" class="cols">
	<?php
}

add_action( 'woocommerce_after_main_content', 'abc_wrapper_end', 10 );
function abc_wrapper_end() {
	?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php
}

function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

function woocommerce_button_proceed_to_checkout() {
	$checkout_url = WC()->cart->get_checkout_url();

	?>
	<a href="<?php echo $checkout_url; ?>" class="checkout-button btn btn-danger btn-lg"><?php _e( 'Proceed to Checkout', 'abacus' ); ?></a>
	<?php
}

add_filter( 'woocommerce_order_button_html', 'abc_woocommerce_order_button_html' );
function abc_woocommerce_order_button_html() {
	$order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'abacus' ) );
	return '<input type="submit" class="btn btn-danger btn-lg" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />';
}

add_filter( 'woocommerce_output_related_products_args', 'abc_output_related_products' );
function abc_output_related_products() {
	return array(
		'posts_per_page' => 3,
		'columns' => 3,
		'orderby' => 'rand'
	);
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'abc_woocommerce_output_upsells', 15 );
function abc_woocommerce_output_upsells() {
    woocommerce_upsell_display( 3,3 ); // Display 3 products in rows of 3
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'abc_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'abc_custom_cart_button_text' );
function abc_custom_cart_button_text() {
	return '+';
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

add_action( 'woocommerce_shop_loop_item_title', 'abc_woocommerce_template_loop_product_title', 10 );
function abc_woocommerce_template_loop_product_title() {
	echo '</a><div class="shop-item-meta"><a href="' . get_the_permalink() . '"><h3>' . get_the_title() . '</h3></a>';

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){
        $single_cat = array_shift( $product_cats ); ?>
        <span class="product_category_title"><?php echo $single_cat->name; ?></span>
		<?php
	}
}

add_action( 'woocommerce_after_shop_loop_item', 'abc_woocommerce_template_loop_product_link_close', 99 );
function abc_woocommerce_template_loop_product_link_close() {
	echo '</div>';
}

function abc_search_pagination( $query ) {
	$max_page = $query->max_num_pages;
	$paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
    $type = ( isset( $query->query['post_type'] ) ) ? $query->query['post_type'] : 'post';
	$prev_search_post_type = ( 2 == $paged ) ? '' : '&#038;search_post_type=' . esc_attr( $type );

	$next_post_link = str_replace( '&#038;search_post_type=' . esc_attr( $type ), '', next_posts( $max_page, false ) );
	$prev_post_link = str_replace( '&#038;search_post_type=' . esc_attr( $type ), '', previous_posts( false ) );
	$prev_label = ( 2 == $paged ) ? __( 'All results &rarr;', 'abacus' ) : sprintf( __( 'Next %s results &rarr;', 'abacus' ), ucfirst( $type . 's' ) );

	// Don't print empty markup if there's only one page.
	if ( $max_page < 2 )
		return;

	$next_posts_link = ( intval($paged) + 1 <= $max_page ) ? '<a href="' . esc_url( $next_post_link ) . '&#038;search_post_type=' . esc_attr( $type ) . '">' . sprintf( __( '&larr; Previous %s results', 'abacus' ), ucfirst( $type . 's' ) ) . '</a>' : '&nbsp;';
	$prev_posts_link = ( $paged > 1 ) ? '<a href="' . esc_url( $prev_post_link ) . $prev_search_post_type . '">' . $prev_label . '</a>' : '&nbsp;';
	?>

	<nav id="posts-pagination" role="navigation">
		<div class="screen-reader-text"><?php _e( 'Posts navigation', 'abacus' ); ?></div>
		<?php if ( $next_posts_link ) : ?>
		<div class="previous"><?php echo $next_posts_link; ?></div>
		<?php endif; ?>

		<?php if ( $prev_posts_link ) : ?>
		<div class="next"><?php echo $prev_posts_link; ?></div>
		<?php endif; ?>
	</nav><!-- .navigation -->
	<?php
	wp_reset_query();
}

add_filter( 'pre_get_posts', 'abc_search' );
function abc_search( $query ) {
	if ( ! is_admin() && $query->is_search && $query->is_main_query() )
		$query->set( 'post_type', array( 'post' ) );

    return $query;
}