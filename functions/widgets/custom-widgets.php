<?php	
add_action( 'widgets_init', 'busiprof_widgets_init');
function busiprof_widgets_init() {

/*sidebar*/
register_sidebar( array(
		'name' => __( ' Sidebar', 'busi_prof' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'busi_prof' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'busi_prof' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'busi_prof' ),
		'before_widget' => '<div class="col-md-3 col-sm-6">',
		'after_widget' => '</div>',
		'before_title' => '<aside class="widget"><h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
register_sidebar( array(
	'name' => __( 'Woocommerce Sidebar', 'busi_prof' ),
	'id' => 'woocommerce-1',
	'description' => __( 'Woocommerce sidebar widget area', 'busi_prof' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );	
	
}	                     
?>