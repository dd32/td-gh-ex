<div class="col-md-4">
		<?php if ( is_active_sidebar( 'sidebar-data' ) )
				{ dynamic_sidebar( 'sidebar-data' );	}
				else  { 
						$args = array(
						'before_widget' => '<div class="widget" >',
							'after_widget' => '</div>',
							'before_title' => '<ul><h3>',
							'after_title' => '</h3></ul>',
						); 
						the_widget('WP_Widget_Search', null, $args);
						the_widget('WP_Widget_Archives', null, $args);
						the_widget('WP_Widget_Recent_Posts', null, $args);
						the_widget('WP_Widget_Categories', null, $args);
						the_widget('WP_Widget_Tag_Cloud', null, $args);
						 } ?>
</div> 