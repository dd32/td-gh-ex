<?php	
add_action( 'widgets_init', 'appointment_widgets_init');
function appointment_widgets_init() {

/*sidebar*/
register_sidebar( array(
		'name' => __( 'Sidebar', 'appointment' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'appointment' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'appointment' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'appointment' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget-column">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );
}	                     
?>