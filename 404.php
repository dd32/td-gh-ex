<?php
/*
 * The template for displaying 404 not found.
 */
?>

<?php get_header(); ?>
<div id="content">
		<h3 class="page-title"><?php _e( 'Nothing Found', 'shipyard' ); ?></h3>
			<p><?php _e('Sorry, no posts matched your criteria.', 'shipyard'); ?></p>
		<?php get_search_form(); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
