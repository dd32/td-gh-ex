<?php
/**
 * Template Name: Magazine Homepage
 *
 * @package  basepress
 */
get_header(); ?>

	<div id="primary" class="content-area content-left">
		<main id="main" class="site-main" role="main">
			
			<?php

			if ( is_active_sidebar( 'magazine-homepage' ) ) : ?>

				<div id="magazine-homepage-widgets" class="widget-area post-homepage-widget clearfix">

					<?php dynamic_sidebar( 'magazine-homepage' ); ?>

				</div><!-- #magazine-homepage-widgets -->

			<?php // Display Description about Magazine Homepage Widgets when widget area is empty.

			else :

				// Display only to users with permission.
				if ( current_user_can( 'edit_theme_options' ) ) : ?>

					<div class="empty-magazine-homepage">

						<p class="empty-widget-area">
							<?php esc_html_e( 'Please go to Appearance &#8594; Widgets and add at least one widget to the "Magazine Homepage" widget area. You can use the Magazine Posts widgets to set up the theme like the demo website.', 'basepress' ); ?>
						</p>

					</div>

				<?php endif;

			endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
get_sidebar();
get_footer();
