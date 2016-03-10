<?php	
add_action( 'widgets_init', 'webriti_widgets_init');
function webriti_widgets_init() {
	
/*======================= [sidebar] =======================*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'corpbiz' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'corpbiz' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
	) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area Left', 'corpbiz' ),
			'id' => 'footer_widget_area_left',
			'description' => __( 'footer widget left area', 'corpbiz' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
	) );
}