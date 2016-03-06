<?php
/*
 * The template for displaying 404 not found.
 */
?>

<?php get_header(); ?>
<div id="content">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'darkelements' ); ?></h1>
	<p><?php _e('Sorry, no posts matched your criteria.', 'darkelements'); ?></p>
	<?php get_search_form(); ?>
</div>
<?php get_footer(); ?>
