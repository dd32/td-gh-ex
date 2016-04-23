<?php 
// sidebars
add_action( 'widgets_init', 'sis_spa_widgets_init' );
function sis_spa_widgets_init(){
	
	register_sidebar( array(
	'name' => __( 'Primary Sidebar', 'sis_spa' ),
	'id' => 'sidebar-primary',
	'description' => __( 'The primary widget area', 'sis_spa' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 1', 'sis_spa' ),
	'id' => 'footer-sidebar1',
	'description' => __( 'Footer widget area', 'sis_spa' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 2', 'sis_spa' ),
	'id' => 'footer-sidebar2',
	'description' => __( 'Footer widget area', 'sis_spa' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 3', 'sis_spa' ),
	'id' => 'footer-sidebar3',
	'description' => __( 'Footer widget area', 'sis_spa' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 4', 'sis_spa' ),
	'id' => 'footer-sidebar4',
	'description' => __( 'Footer widget area', 'sis_spa' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => __( 'Woocommerce Sidebar', 'sis_spa' ),
	'id' => 'woocommerce-1',
	'description' => __( 'Woocommerce sidebar widget area', 'sis_spa' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	
}