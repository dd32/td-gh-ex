<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  basepress
 */
get_header();
 
// Get Theme Options from Database.
$theme_options = basepress_theme_options();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			if ( have_posts() ) :

				get_template_part( 'loop' );
				
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'basepress_sidebar' );
get_footer();
