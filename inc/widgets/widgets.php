<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
 
add_action( 'widgets_init', 'fmi_widgets_init' );


function fmi_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'fmi' ),
		'id'            => 'fmi_right_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'fmi' ),
		'id'            => 'fmi_left_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	
	// Registering footer sidebar one
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar One', 'fmi' ),
		'id' 					=> 'fmi_footer_sidebar_one',
		'description'   	=> __( 'Shows widgets at footer sidebar one.', 'fmi' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering footer sidebar two
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar Two', 'fmi' ),
		'id' 					=> 'fmi_footer_sidebar_two',
		'description'   	=> __( 'Shows widgets at footer sidebar two.', 'fmi' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering footer sidebar three
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar Three', 'fmi' ),
		'id' 					=> 'fmi_footer_sidebar_three',
		'description'   	=> __( 'Shows widgets at footer sidebar three.', 'fmi' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );
}

?>