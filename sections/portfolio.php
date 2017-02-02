<?php
/**
 *	The template for dispalying the features section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */

	if( is_customize_preview() ) {
		$title = get_theme_mod( 'asterion_portfolio_title', esc_html__('Portfolio','asterion') );
		$text = get_theme_mod( 'asterion_portfolio_text', esc_html__('Our portfolio is the best way to show our work, you can see here a big range of our work. Check them all and you will find what you are looking for.','asterion') );
	} else {
		$title = get_theme_mod( 'asterion_portfolio_title' );
		$text = get_theme_mod( 'asterion_portfolio_text' );
	}

	$count = get_theme_mod( 'asterion_portfolio_count', 6 );

	$jetpack_portfolio_args = array (
		'post_type'					=> array( 'jetpack-portfolio' ),
		'nopaging'					=> false,
		'ignore_sticky_posts'		=> true,
		'posts_per_page'			=> absint( $count ),
		'cache_results'				=> true,
		'update_post_meta_cache'	=> true,
		'update_post_term_cache'	=> true
	);

	$jetpack_portfolio_query = new WP_Query( $jetpack_portfolio_args );

	$bg_color = get_theme_mod('asterion_portfolio_bg_color', '#ffffff');
	$text_color = get_theme_mod('asterion_portfolio_text_color', 0);
	$hover_effect = get_theme_mod('asterion_portfolio_image_hover_effect', 'bubba');
	$overlay_color = get_theme_mod('asterion_portfolio_image_overlay_color', '#1a1a1a');

?>
<?php if( $title != "" || $text != "" || $jetpack_portfolio_query->have_posts() ) : ?>
	<section id="portfolio" class="ot-section <?php echo esc_attr(( $text_color == 1 ) ? 'text-light' : 'text-dark'); ?>" style="background-color:<?php echo esc_attr( $bg_color );?>">
		<div class="ot-container">
			<?php if( $title || $text) { ?>
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<?php if( $title ) : ?>
								<h2><?php echo asterion()->customizer->sanitize_html($title);?></h2>
							<?php endif; ?>
							<?php if( $text ) : ?>
								<p><?php echo asterion()->customizer->sanitize_html($text);?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if( post_type_exists( 'jetpack-portfolio' ) ): ?>

				<div class="row row-0-gutter">
					
					<?php while( $jetpack_portfolio_query->have_posts() ): $jetpack_portfolio_query->the_post(); ?>

						<div class="ot-portfolio-item">
							<figure class="effect-<?php echo esc_attr($hover_effect);?>" style="background-color: <?php echo esc_attr($overlay_color);?>;">
								<?php the_post_thumbnail( 'asterion-portfolio' ); ?>
								<figcaption>

									<h2><?php the_title(); ?></h2>

									<?php if( asterion()->posts->terms( 'jetpack-portfolio-type' ) ) : ?>
										<p><?php asterion()->posts->terms( 'jetpack-portfolio-type', true ); ?></p>
									<?php endif; ?>

								</figcaption>
							</figure>
						</div>

					<?php endwhile; ?>

				</div><!-- end row -->

			<?php endif; ?>

		</div><!-- end container -->

	</section>
<?php endif; ?> 