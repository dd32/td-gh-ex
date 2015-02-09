<?php	
add_action( 'widgets_init', 'appoinment_widgets_init');
function appoinment_widgets_init() {

/*sidebar*/
register_sidebar( array(
		'name' => __( 'Sidebar', 'appoinment' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'appoinment' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'appoinment' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'appoinment' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget-column">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );
	
}	                     
?>