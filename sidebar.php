<?php if( is_active_sidebar('widgetscolumn') ) {
	dynamic_sidebar('widgetscolumn');
	} else { ?>
		<div class="widget">
			<h3 class="widget-title">
				<?php _e('Search', 'baena'); ?>
			</h3>
		</div><!--.widget-->
<?php } ?>				