<?php
/**
 * Template for displaying bfastmag frontpage section.
 *
 * @package WordPress
 * @subpackage bfastmag
 */

$bfastmag_block_category =   get_theme_mod( 'bfastmag_block23_category', 'all' ) ;
$bfastmag_block_max_posts =    get_theme_mod( 'bfastmag_block3_max_posts') ;

$wp_query = new WP_Query(
	array(
		'posts_per_page'        => $bfastmag_block_max_posts,
		'order'                 => 'DESC',
		'post_type'           => 'product',
		'post_status'           => 'publish',
		'tax_query'         => array(array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => esc_attr( $bfastmag_block_category),
			),),
		)
	);
	if ( $wp_query->have_posts() ) : ?>
	<div class="post-section bfastmag-fp-s1">
	<div class="owl-carousel bfastmag-fp-s1-posts smaller-nav no-radius">

 			<?php

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			global $product;
			?>

			<article <?php post_class(' entry tp-post-item tp-item-block rowItem animate animate-moveup animate-fadein'); ?>>
				<div class="tp-post-thumbnail bfastmag-thumb-small">
					<figure>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							
							<?php
							$thumb_id = get_post_thumbnail_id(get_the_ID() );
							if ( ! empty( $thumb_id ) ) {
								
								$thumb = wp_get_attachment_image_src( $thumb_id, 'bfastmag_blk_big_thumb' );
								$url = $thumb['0'];
								
								echo '<img class="owl-lazy"  src="' . esc_url( $url ) . '" />';
							} else {
								echo '<img class="owl-lazy" src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" />';
							}
							?>
						</a>
					</figure> <!-- End figure -->

				</div> <!-- End .tp-post-thumbnail -->

				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				
				<?php		

				echo '<div class="shop-item-wrap">';
				echo '<div class="shop-item-detail">';
				if ( ! empty( $product ) ) :
					echo do_shortcode( '[add_to_cart id="' . $wp_query->post->ID . '"]' );
				if ( function_exists( 'wccm_add_button' ) ) {
					wccm_add_button();
				}
				if ( defined( 'YITH_WCQV' ) ) {

					echo '<a href="#" class="button yith-wcqv-button" data-product_id="' . esc_attr( get_the_ID() ) . '">' . __( 'Quick View', 'bfastmag' ) . '</a>';

				}
				endif;
				echo '</div>';

				$rating_html = '';
				if ( function_exists( 'method_exists' ) && ( function_exists( 'wc_get_rating_html' ) ) && method_exists( $product, 'get_average_rating' ) ) {
					$shop_isle_avg = $product->get_average_rating();
					if ( ! empty( $shop_isle_avg ) ) {
						$rating_html = wc_get_rating_html( $shop_isle_avg );
					}
				} elseif ( function_exists( 'method_exists' ) && method_exists( $product, 'get_rating_html' ) && method_exists( $product, 'get_average_rating' ) ) {
					$shop_isle_avg = $product->get_average_rating();
					if ( ! empty( $shop_isle_avg ) ) {
						$rating_html = $product->get_rating_html( $shop_isle_avg );
					}
				}
				if ( ! empty( $rating_html ) && get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
					echo '<div class="product-rating-home">' . ($rating_html) . '</div>';
				}
				if ( function_exists( 'method_exists' ) && method_exists( $product, 'is_on_sale' ) ) {
					if ( $product->is_on_sale() ) {
						if ( function_exists( 'woocommerce_show_product_sale_flash' ) ) {
							woocommerce_show_product_sale_flash();
						}
					}
				}
				if ( function_exists( 'method_exists' ) && method_exists( $product, 'managing_stock' ) && method_exists( $product, 'is_in_stock' ) ) {
					if ( ! $product->managing_stock() && ! $product->is_in_stock() ) {
						echo '<span class="onsale stock out-of-stock">' . esc_html__( 'Out of Stock', 'bfastmag' ) . '</span>';
					}
				}
				$shop_isle_price = '';
				if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_price_html' ) ) {
					$shop_isle_price = $product->get_price_html();
				}
				if ( ! empty( $shop_isle_price ) ) {
					echo wp_kses_post( $shop_isle_price );
				}
				echo '</div>';
				?> 
				
			</article> <!-- End .tp-post-item -->
			<?php
			endwhile;
			?>
		</div> <!-- End .bfastmag-fp-s1-posts -->
		 
	</div> <!-- End .bfastmag-fp-s1 -->
	<?php
	endif;
	wp_reset_postdata();
	?>