<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce, $woocommerce_loop, $ascend;

if(!empty($ascend['related_item_column'])) {
	$product_related_column = $ascend['related_item_column'];
} else {
	$product_related_column = '4';
}
$woocommerce_loop['columns'] = $product_related_column;

$rpc = array();
if ($product_related_column == '2') {
	$rpc = ascend_carousel_columns('2');
} else if ($product_related_column == '3'){
	$rpc = ascend_carousel_columns('3');
} else if ($product_related_column == '6'){
	$rpc = ascend_carousel_columns('6');
} else if ($product_related_column == '5'){ 
	$rpc = ascend_carousel_columns('5');
} else {
	$rpc = ascend_carousel_columns('4');
} 
$rpc = apply_filters('kt_upsell_products_columns', $rpc);

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) === 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => 8,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id() ),
	'meta_query'          => $meta_query
);
if(!empty($ascend['wc_upsell_products_text'])) {
	$upsell_text = $ascend['wc_upsell_products_text'];
} else {
	$upsell_text = __( 'You may also like', 'ascend');
}

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>

	<div class="upsells products carousel_outerrim">
		<h3 class="kt-title"><span><?php echo esc_html($upsell_text); ?></span></h3>
		<div class="upsell-carouselcontainer row-margin-small">
			<div id="upsale-product-carousel" class="products slick-slider product_upsell_carousel kt-slickslider kt-content-carousel loading clearfix" data-slider-fade="false" data-slider-type="content-carousel" data-slider-anim-speed="400" data-slider-scroll="1" data-slider-auto="true" data-slider-speed="9000" data-slider-xxl="<?php echo esc_attr($rpc['xxl']);?>" data-slider-xl="<?php echo esc_attr($rpc['xl']);?>" data-slider-md="<?php echo esc_attr($rpc['md']);?>" data-slider-sm="<?php echo esc_attr($rpc['sm']);?>" data-slider-xs="<?php echo esc_attr($rpc['xs']);?>" data-slider-ss="<?php echo esc_attr($rpc['ss']);?>">
					<?php while ( $products->have_posts() ) : $products->the_post(); 

						wc_get_template_part( 'content', 'product' ); 

					endwhile;?>
			</div>
		</div>
	</div>

<?php endif;

wp_reset_postdata();
