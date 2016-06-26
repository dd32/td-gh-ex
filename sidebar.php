<div id="sidebar" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<?php if (is_active_sidebar('primary-sidebar')) {
        dynamic_sidebar('primary-sidebar');
    } else {
	$args = array(
		'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h2>',
        'after_title' => '</h2></div>'
	);
	the_widget('awada_footer_contact_widget', null, $args);
	the_widget('WP_Widget_Meta', null, $args);
	the_widget('awadaArchieveWidget', null, $args);
	the_widget('awada_footer_recent_posts', null, $args); } ?>
</div><!-- end content -->