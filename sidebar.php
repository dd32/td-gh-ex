<?php if( is_active_sidebar('widgetscolumna') ) {
	dynamic_sidebar('widgetscolumna');
	} else { ?>
		<div class="widget">
			<h3 class="widget-title">
				<?php __('Search', 'baena'); ?>
			</h3>
		</div><!--.widget-->
<?php } ?>				