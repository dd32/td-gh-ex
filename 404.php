<?php get_header(); ?>

<div id="content">
	<?php do_action('ast_hook_before_content'); ?>

	<div class="wrap-404-box">
		<h2><?php _e('Error 404', 'asteroid'); ?></h2>
		<p><?php _e('Sorry. The Page or File you were looking for was not found.', 'asteroid'); ?></p>
		<?php get_search_form(); ?>
	</div>

	<?php do_action('ast_hook_after_content'); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>