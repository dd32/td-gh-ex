<div id="sidebar" >
	
	<div id="widgets-wrap-sidebar">
	
		<?php if ( is_active_sidebar( 'widgets_sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'widgets_sidebar' ); ?>

		<?php else : ?>
			<?php the_widget('WP_Widget_Recent_Posts', 1, array(
				'before_widget'	=> '<div class="widget-sidebar %2$s">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h4 class="widget-title" >',
				'after_title' 	=> '</h4>'
				) );
			?> 
		<?php endif; ?>
	
	</div>
	
</div>