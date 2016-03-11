<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @since 1.0.0
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
		<?php
		if ( 'page' == get_option('show_on_front') ) {
			include( get_page_template() );
		} else {
			?>
			<div class="container">
				<div class="row">
					<div id="primary" class="cols">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content', get_post_format() );
							endwhile;

							abc_pagination();

							comments_template( '', true );
						else :
							get_template_part( 'content', 'none' );
						endif;
						?>
					</div><!-- #primary -->

					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php } ?>
	</div>

<?php get_footer(); ?>