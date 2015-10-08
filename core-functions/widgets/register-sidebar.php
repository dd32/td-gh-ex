<?php	
add_action( 'widgets_init', 'becorp_widgets');
function becorp_widgets() {

/*sidebar*/
register_sidebar( array(
		'name' => __( 'Sidebar Data', 'becorp' ),
		'id' => 'sidebar-data',
		'description' => __( 'The primary widget area', 'becorp' ),
		'before_widget' => '<div class="widget" >',
		'after_widget' => '</div>',
		'before_title' => '<h3><ul>',
		'after_title' => '</h3></ul>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'becorp' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'becorp' ),
		'before_widget' => '<div class="col-md-3 col-sm-6">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h2><i>',
		'after_title' => '</i></h2></div>',
	) );
	
}	                     
?>