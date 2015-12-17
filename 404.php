<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @package aesblo
 * @since 1.0.0
 */

get_header();
?>
	
<div id="content" class="site-content clearfix">
	<main id="main" class="site-main" role="main">
	
		<section class="error-404 not-found">
			<header class="page-header">
				<span class="archive-icon fa fa-exclamation-triangle"></span>
				<div class="archive-summary">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'aesblo' ); ?></h1>
				</div>
			</header><!-- .page-header -->
			
			<div class="entry-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'aesblo' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #content -->
	
<?php get_sidebar( 'secondary' ); ?>
	
<?php get_footer(); ?>