<?php
/*
Template Name: Widgetized
*/

get_header(); ?>

	<div id="primary" class="fullwidth">
		<main id="main" class="site-main" role="main">

			<?php $id = get_the_id(); ?>
			<?php if ( is_active_sidebar( 'widget-area-' . $id ) ) : ?>
		 		<?php dynamic_sidebar( 'widget-area-' . $id ); ?>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
