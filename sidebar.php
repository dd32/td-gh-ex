<div id="sidebar" class="cf" <?php asteroid_schema( 'sidebar' ); ?> role="complementary">
	<?php do_action( 'ast_hook_before_sidebar' ); ?>
	<aside id="widgets-wrap-sidebar">

		<?php if ( is_active_sidebar( 'widgets_sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'widgets_sidebar' ); ?>
		<?php else : ?>
			<?php
				the_widget( 'WP_Widget_Recent_Posts', 1, array(
					'before_widget'	=> '<section class="widget-sidebar asteroid-widget widget_recent_entries">',
					'after_widget' 	=> '</section>',
					'before_title' 	=> '<h2 class="widget-title">',
					'after_title' 	=> '</h2>'
					) );
				the_widget( 'WP_Widget_Recent_Comments', 1, array(
					'before_widget'	=> '<section class="widget-sidebar asteroid-widget widget_recent_comments">',
					'after_widget' 	=> '</section>',
					'before_title' 	=> '<h2 class="widget-title">',
					'after_title' 	=> '</h2>'
					) );
				the_widget( 'WP_Widget_Meta', 1, array(
					'before_widget'	=> '<section class="widget-sidebar asteroid-widget widget_meta">',
					'after_widget' 	=> '</section>',
					'before_title' 	=> '<h2 class="widget-title">',
					'after_title' 	=> '</h2>'
					) );
			?>
		<?php endif; ?>

	</aside>
	<?php do_action( 'ast_hook_after_sidebar' ); ?>
</div>