<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="disable-title site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() ); ?>
				<div class="postnav">
				
					<div class="nav-previous"><span class="meta-nav"><i class="fa fa-caret-left"></i></span>
					
						<?php if(get_theme_mod('photo_studio_pagination_prev')) {
							previous_post_link('%link', get_theme_mod('photo_studio_pagination_prev')); 
						} else {
							previous_post_link('%link', __(' Previous', 'baw')); 
						} ?>
					</div>
							
					<div class="nav-next">
					<?php if(get_theme_mod('photo_studio_pagination_next')) {
						 next_post_link('%link', get_theme_mod('photo_studio_pagination_next'));
						} else {
							next_post_link('%link', __('Next ', 'baw'));
						} ?>						
						<span class="meta-nav"><i class="fa fa-caret-right"></i></span>	
					</div>
					
				</div>	
			<?php
			##the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
