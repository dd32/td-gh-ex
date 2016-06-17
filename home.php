<?php
/**
 * The front page template file.
 *
 * @package WordPress
 * @subpackage Abacus
 * @since Abacus 1.0
 */
get_header(); ?>

	<?php if ( $header_image = get_header_image() ) : ?>
		<div class="parallax">
			<div class="header-img" style="background-image: url(<?php echo esc_url( $header_image ); ?>); height: <?php echo get_custom_header()->height; ?>px;"></div>
			<?php if ( is_active_sidebar( 'jumbo-headline' ) ) { ?>
			<div class="container">
				<div class="row">
					<div class="home-top">
						<?php dynamic_sidebar( 'jumbo-headline' ); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	<?php endif; ?>

	<div class="home-container">
		<div class="container">
			<div class="row">
				<div id="primary" class="cols">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content' );
						endwhile;

						abc_pagination();

						comments_template( '', true );
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</div><!-- #primary -->

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>