<?php if( is_active_sidebar('widgetscolumn') ) {
	dynamic_sidebar('widgetscolumn');
	} else { ?>
		<div class="widget">
			<h3 class="widget-title">
				<?php __('Search', 'baena'); ?>
			</h3>
		</div><!--.widget-->
<?php } ?>				