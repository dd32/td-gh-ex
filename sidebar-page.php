<div class="col-md-3">
	<?php if ( is_active_sidebar( 'page' ) ) { ?>
		<div id="sidebar" role="complementary">
			<div class="sidebar-inner">
				<aside class="widget-area">
					<?php dynamic_sidebar( 'page' ); ?>
				</aside>
			</div>
		</div>
	<?php } ?>
</div>