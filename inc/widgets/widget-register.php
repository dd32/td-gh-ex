<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 
 require get_template_directory() . '/inc/widgets/recent-post.php';
 require get_template_directory() . '/inc/widgets/newsletter.php';
 require get_template_directory() . '/inc/widgets/author-info.php';
 require get_template_directory() . '/inc/widgets/video-popup.php';
 require get_template_directory() . '/inc/widgets/single-banner.php';
 
 if(!function_exists('nnfy_widgets_init')){
	function nnfy_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar', '99fy' ),
			'id'            => 'sidebar-right',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar', '99fy' ),
			'id'            => 'sidebar-left',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Shop sidebar', '99fy' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget shop-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="sidebar-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 1', '99fy' ),
			'id'            => 'sidebar-footer-1',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2', '99fy' ),
			'id'            => 'sidebar-footer-2',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3', '99fy' ),
			'id'            => 'sidebar-footer-3',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', '99fy' ),
			'id'            => 'sidebar-footer-4',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 5', '99fy' ),
			'id'            => 'sidebar-footer-5',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widget-title">',
			'after_title'   => '</h3>',
		) );
	 
	}		 
}
add_action( 'widgets_init', 'nnfy_widgets_init' );