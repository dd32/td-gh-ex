<?php
/**
 * Frontpage - Featured Category
 *
 * @package ariel
 */
$ariel_frontpage_featured_category_show = ariel_get_option( 'ariel_frontpage_featured_category_show' );

if ( $ariel_frontpage_featured_category_show == 1 ) :

	$ariel_frontpage_featured_category_heading       = ariel_get_option( 'ariel_frontpage_featured_category_heading' );
	$ariel_frontpage_featured_category_select        = ariel_get_option( 'ariel_frontpage_featured_category_select' );
	$ariel_frontpage_featured_category_posts_number  = ariel_get_option( 'ariel_frontpage_featured_category_posts_number' );

	$args = array(
		'cat'            => $ariel_frontpage_featured_category_select,
		'posts_per_page' => $ariel_frontpage_featured_category_posts_number
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : ?>

		<div class="container">
			<div class="frontpage_must_read">
				<h2 class="section-title"><?php echo esc_html( $ariel_frontpage_featured_category_heading ); ?></h2>

				<div class="row">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="col-md-4">
						<div class="entry entry-box">
							<p class="entry-category"><?php the_category( ', ' ); ?></p>
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<p class="entry-summary"><?php the_excerpt(); ?></p>
						</div><!-- entry entry-box -->
					</div><!-- col-md-4 -->
					<?php endwhile; // $query->have_posts() ?>
				</div><!-- row -->
			</div><!-- frontpage_must_read -->
		</div><!-- container -->

	<?php endif; // $query->have_posts()
	wp_reset_postdata();

endif; // $ariel_frontpage_featured_category_show == 1