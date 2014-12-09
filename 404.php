<?php get_header(); ?>
<div class="page404">
	<h1 class="post-title"><?php _e('Page not found', 'bunny');?></h1>
	<?php get_search_form(); ?><br /><br />
</div>
</div>
<?php 
if (is_active_sidebar('sidebar_widget')){
	get_sidebar(); 
}
get_footer(); 
?>