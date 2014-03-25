<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package URVR
 */

get_header(); ?>
	<div class="row">

	<?php if( isset( $urvr['layout'] ) && $urvr['layout'] == 2 ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>

	<div id="primary" class="content-area two-thirds column span9">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><i class="el-icon-tags"></i><?php _e( 'Oops! That page can&rsquo;t be found.', TEXTDOMAIN ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', TEXTDOMAIN ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if( isset( $urvr['layout'] ) && $urvr['layout'] == 3 ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>

	<?php if( ! isset( $urvr['layout'] ) ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
		
<?php get_footer(); ?>