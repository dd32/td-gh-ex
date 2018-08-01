<?php
/**
 * The template for displaying the homepage.
 *
 * Template name: Homepage
 *
 * @package adbooster
 */

get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
		
			/**
			 * Functions hooked in to homepage action
			 *
			 */
			do_action( 'adbooster_homepage' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();