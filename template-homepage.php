<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Az_Authority
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="col-full">
				
				<?php

				do_action( 'azauthority_homepage' );

				?>
				
			</div><!-- .col-full -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
// do_action( 'azauthority_sidebar' );

get_footer();





