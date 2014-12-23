<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php else : ?>
    <?php the_widget('WP_Widget_Recent_Posts', array(
    'number' => 8, 
    'title' => ' '
    ), 
    array(
    'before_title' => '', 
    'after_title' => '')
    ); ?>
<?php endif; ?>