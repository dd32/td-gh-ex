<?php
/*
 * The template for displaying 404 not found.
 */
?>

<?php get_header(); ?>
<div id="main-content-container">
<div id="main-content">
<div id="content">
	<h4 class="page-title"><?php _e( 'Nothing Found', 'multicolors' ); ?></h4>
		<p><?php _e('Sorry, no posts matched your criteria.', 'multicolors'); ?></p>
	<?php get_search_form(); ?>
</div>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>