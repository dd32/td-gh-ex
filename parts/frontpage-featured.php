<?php
/**
 * Frontpage - Featured Posts
 *
 * @package ariel
 */
$ariel_frontpage_featured_posts_show = ariel_get_option( 'ariel_frontpage_featured_posts_show' );

if ( $ariel_frontpage_featured_posts_show == 1 ) :

	$ariel_frontpage_featured_posts_heading = ariel_get_option( 'ariel_frontpage_featured_posts_heading' );
	$ariel_frontpage_featured_post_type     = ariel_get_option( 'ariel_frontpage_featured_post_type' );

	$ariel_featured_ids = array(
		ariel_get_option( 'ariel_frontpage_featured_posts_' . $ariel_frontpage_featured_post_type . '_1' ),
		ariel_get_option( 'ariel_frontpage_featured_posts_' . $ariel_frontpage_featured_post_type . '_2' ),
		ariel_get_option( 'ariel_frontpage_featured_posts_' . $ariel_frontpage_featured_post_type . '_3' ),
		ariel_get_option( 'ariel_frontpage_featured_posts_' . $ariel_frontpage_featured_post_type . '_4' ),
	);
    //$ariel_featured_ids = array_unique($ariel_featured_ids);
    
	if ( $ariel_featured_ids ) : ?>

		<div class="frontpage-featured-posts">
			<div class="container">
				<h2 class="section-title"><?php echo esc_html( $ariel_frontpage_featured_posts_heading ); ?></h2>

				<div class="row" data-fluid=".entry-summary,.entry-title">
					<?php foreach ( $ariel_featured_ids as $ariel_featured_id ) :
							$args = array(
								'posts_per_page' => 1,
								'post_type'      => $ariel_frontpage_featured_post_type,
								'p'              => $ariel_featured_id,
							);

							$query = new WP_Query( $args );

							if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
								get_template_part( 'parts/entry', 'featured' );
							endwhile; endif; // $query->have_posts()

							wp_reset_postdata();
						endforeach;
					?>

				</div><!-- row -->
			</div><!-- container -->
		</div><!-- frontpage-featured-posts -->

	<?php endif; // $ariel_featured_ids

endif; // $ariel_frontpage_featured_posts_show == 1