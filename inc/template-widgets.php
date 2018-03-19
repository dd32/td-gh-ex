<?php
/**
 * Custom template widgets for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package fmi
 */
 
function fmi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fmi' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fmi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fmi_widgets_init' );
