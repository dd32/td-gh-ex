<?php 
// sidebars
add_action( 'widgets_init', 'spasalon_widgets_init' );
function spasalon_widgets_init(){
	
	register_sidebar( array(
	'name' => __( 'Primary Sidebar', 'spasalon' ),
	'id' => 'sidebar-primary',
	'description' => __( 'The primary widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 1', 'spasalon' ),
	'id' => 'footer-sidebar1',
	'description' => __( 'Footer widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 2', 'spasalon' ),
	'id' => 'footer-sidebar2',
	'description' => __( 'Footer widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 3', 'spasalon' ),
	'id' => 'footer-sidebar3',
	'description' => __( 'Footer widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 4', 'spasalon' ),
	'id' => 'footer-sidebar4',
	'description' => __( 'Footer widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Woocommerce Sidebar', 'spasalon' ),
	'id' => 'woocommerce-1',
	'description' => __( 'Woocommerce sidebar widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	
}