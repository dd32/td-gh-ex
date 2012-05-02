<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @D5 Creation
 * @Modified on Twenty_Eleven
 
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">
<div style="width:728px; height:90px; display: block; background: #545151;"><?php include("pagetopad.php") ?></div>
			
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'd5smartia' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Please use the Search Box Provided below to find the exact thing from the site.', 'd5smartia' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>