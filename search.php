<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package  basepress
 */

get_header();

// Get Theme Options from Database.
$theme_options = basepress_theme_options();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			if ( have_posts() ) :

				get_template_part( 'loop' );
				
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
do_action( 'shopper_sidebar' );
get_footer();
