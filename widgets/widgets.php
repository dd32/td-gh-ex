<?php
/**
 * Widgets
 *
 * @package ariel
 */
/**
 * Register sidebars and widgets
 *
 * This function is attached to
 * 'widgets_init' action hook.
 */
function ariel_widgets_init() {

	/* Sidebar Widgets */

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default', 'ariel' ),
		'id'            => 'sidebar-default',
		'before_widget' => '<div id="%1$s" class="default-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/* Header Widgets */

	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar - Right', 'ariel' ),
		'id'            => 'header-top-right',
		'description'   => esc_html__( 'Add widgets here to appear in the top left area.', 'ariel' ),
		'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="header-widget-title">',
		'after_title'   => '</h3>',
	) );

	/* Front Page Widgets */

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page', 'ariel' ),
		'id'            => 'sidebar-frontpage',
		'description'   => esc_html__( 'Shows up only on the front page.', 'ariel' ),
		'before_widget' => '<div id="%1$s" class="frontpage-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/* Footer Widgets */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columns - Column 1', 'ariel' ),
		'id'            => 'footer-row-2-col-1',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columns - Column 2', 'ariel' ),
		'id'            => 'footer-row-2-col-2',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columns - Column 3', 'ariel' ),
		'id'            => 'footer-row-2-col-3',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columns - Column 4', 'ariel' ),
		'id'            => 'footer-row-2-col-4',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ariel_widgets_init' );