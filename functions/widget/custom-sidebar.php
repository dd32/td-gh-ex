<?php	
add_action( 'widgets_init', 'webriti_widgets_init');
function webriti_widgets_init() {
	
/*======================= [sidebar] =======================*/
	register_sidebar( array(
			'name' => __('Sidebar widget area', 'corpbiz' ),
			'id' => 'sidebar-primary',
			'description' => __('Sidebar widget area', 'corpbiz' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
	) );

	register_sidebar( array(
			'name' => __('Footer sidebar one', 'corpbiz' ),
			'id' => 'footer_widget_area_left',
			'description' => __( 'Footer sidebar one', 'corpbiz' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __('Footer sidebar two', 'corpbiz' ),
		'id' => 'footer_widget_area_center',
		'description' => __('Footer sidebar two', 'corpbiz' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer sidebar three', 'corpbiz' ),
		'id' => 'footer_widget_area_right',
		'description' => __('Footer sidebar three', 'corpbiz' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}