<?php
/**
 * Template Name: Shop Grid
 *
 * Description: A page template build to display your shop on the homepage
 *
 * @since 1.0.0
 */
$primary_attr = ( is_active_sidebar( 'shop-grid' ) ) ? bavotasan_primary_attr( false ) : ' class="col-md-12"';
if ( ! is_front_page() )
	get_header();
	?>

	<div id="primary" class="container">

		<?php
		// Display page content if there is any
		while ( have_posts() ) : the_post();
			if ( '' != $post->post_content ) { ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				    <div class="entry-content description clearfix">
					    <?php the_content( '' ); ?>
				    </div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php
			}
		endwhile;

		if ( is_woocommerce_activated() ) {
			$feature_args = apply_filters( 'abacus_featured_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'Featured', 'abacus' ),
				'description'		=> __( 'This is a description', 'abacus' ),
				)
			);
			$featured_products = do_shortcode( '[featured_products per_page="' . intval( $feature_args['limit'] ) . '" columns="' . intval( $feature_args['columns'] ) . '"]' );

			if ( strpos( $featured_products, 'class="products"' ) !== false ) {
				?>
				<section class="product-section featured-products">

					<h2 class="entry-title page-header"><?php echo esc_attr( $feature_args['title'] ); ?></h2>
					<p class="entry-desc"><?php echo esc_attr( $feature_args['description'] ); ?></p>
					<?php echo $featured_products; ?>
				</section>
				<?php
			}
			?>

			<?php if ( is_active_sidebar( 'shop-categories' ) ) { ?>
				<div class="shop-categories row">
					<?php dynamic_sidebar( 'shop-categories' ); ?>
				</div>
			<?php } ?>

			<?php if ( is_active_sidebar( 'shop-banner' ) ) { ?>
				<div class="shop-banner">
					<?php dynamic_sidebar( 'shop-banner' ); ?>
				</div>
			<?php } ?>

			<?php
			$pop_args = apply_filters( 'abacus_popular_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'Trending', 'abacus' ),
				'description'		=> __( 'This is a description', 'abacus' ),
				)
			);
			$pop_products = do_shortcode( '[top_rated_products per_page="' . intval( $pop_args['limit'] ) . '" columns="' . intval( $pop_args['columns'] ) . '"]' );

			if ( strpos( $pop_products, 'class="products"' ) !== false ) {
				?>
				<section class="product-section popular-products">
					<h2 class="entry-title page-header"><?php echo esc_attr( $pop_args['title'] ); ?></h2>
					<p class="entry-desc"><?php echo esc_attr( $feature_args['description'] ); ?></p>

					<?php echo $pop_products; ?>
				</section>
				<?php
			}
		}
		?>

		<?php
		$testimonials = new WP_Query( array(
			'post_type'      => 'jetpack-testimonial',
			'orderby'        => 'rand',
			'posts_per_page' => 2,
			'no_found_rows'  => true,
		) );
		?>

		<?php if ( $testimonials->have_posts() ) : ?>
			<section id="front-page-testimonials" class="front-testimonials testimonials">
				<h2 class="entry-title page-header"><?php _e( 'Reviews', 'abacus' ); ?></h2>

				<div class="row">
				<?php
					while ( $testimonials->have_posts() ) : $testimonials->the_post();
						 get_template_part( 'content', 'testimonial' );
					endwhile;
					wp_reset_postdata();
				?>
				</div>
			</section><!-- .testimonials -->
		<?php endif; ?>
	</div>

<?php
if ( ! is_front_page() )
	get_footer();