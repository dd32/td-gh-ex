<?php
/*
 * The sidebar for displaying widgets.
 */
?>

<div id="sidebar">
	<?php if ( is_active_sidebar( 'primary' ) ) : ?>
	
		<?php dynamic_sidebar( 'primary' ); ?>

	<?php else : ?> 
			
		<h4 class="widgettitle"><?php _e( 'Search', 'shipyard' ); ?></h4>
			<div id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</div>
			
		<h4 class="widgettitle"><?php _e( 'Recent Posts', 'shipyard' ); ?></h4>
			<div id="recent-posts" class="widget-container widget_recent_entries">
				 <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
			</div>

	<?php endif; ?>
</div>