<?php
/**
 * astrology Theme Widgets.
 *
 * @package astrology
 */
function astrology_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'astrology' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here.', 'astrology' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'astrology' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here.', 'astrology' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'astrology' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here.', 'astrology' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          =>  __( 'Footer 3', 'astrology' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here.', 'astrology' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'astrology_widgets_init' );