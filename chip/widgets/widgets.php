<?php
/** Include widget class files */
require_once( CHIP_LIFE_CHIP_DIR . '/widgets/chip-life-social-widget.php' );

/** Chip Life Widgets */
add_action( 'widgets_init', 'chip_life_widgets' );
function chip_life_widgets() {
	
	/** Registger Chip Widgets */
	register_widget( 'Chip_Life_Social_Widget' );
	
	/** Register Header Left Sidebar */
	register_sidebar( array (
		'name'			=>	'Header Left',
		'id'			=>	'header-left-sidebar',
		'description'	=>	'An optional widget area for the left side of the header',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="header-left-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="header-left-widget-title">',
		'after_title'	=> '</h2>',
	) );
	
	/** Register Header Right Sidebar */
	register_sidebar( array (
		'name'			=>	'Header Right',
		'id'			=>	'header-right-sidebar',
		'description'	=>	'An optional widget area for the right side of the header',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="header-right-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="header-right-widget-title">',
		'after_title'	=> '</h2>',
	) );
	
	/** Register Primary Sidebar */
	register_sidebar( array (
		'name'			=>	'Primary Sidebar',
		'id'			=>	'primary-sidebar',
		'description'	=>	'Primary sidebar of your blog',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="widget-title">',
		'after_title'	=> '</h2>',
	) );
	
	/** Chip Life Register Sidebar Hook */
	do_action( 'chip_life_register_sidebar' );
	
	/** Register Footer Left */
	register_sidebar( array (
		'name'			=>	'Footer Left',
		'id'			=>	'footer-left-sidebar',
		'description'	=>	'An optional widget area for the left side of the footer',
		'before_widget'	=>	'<div id="%1$s" class="footer-left-widget %2$s"><div class="footer-left-widget-data">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="footer-left-widget-title">',
		'after_title'	=> '</h2>',
	) );
	
	/** Register Footer Middle */
	register_sidebar( array (
		'name'			=>	'Footer Middle',
		'id'			=>	'footer-middle-sidebar',
		'description'	=>	'An optional widget area for the middle area of the footer',
		'before_widget'	=>	'<div id="%1$s" class="footer-middle-widget %2$s"><div class="footer-middle-widget-data">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="footer-middle-widget-title">',
		'after_title'	=> '</h2>',
	) );
	
	/** Register Footer Right */
	register_sidebar( array (
		'name'			=>	'Footer Right',
		'id'			=>	'footer-right-sidebar',
		'description'	=>	'An optional widget area for the right side of the footer',
		'before_widget'	=>	'<div id="%1$s" class="footer-right-widget %2$s"><div class="footer-right-widget-data">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="footer-right-widget-title">',
		'after_title'	=> '</h2>',
	) );
	
	/** Register Sponsor Sidebar 1 */
	register_sidebar( array (
		'name'			=>	'Sponsor 1',
		'id'			=>	'sponsor-sidebar1',
		'description'	=>	'An optional widget area for your sponsor 1',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="sponsor-sidebar1-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="sponsor-sidebar1-widget-title">',
		'after_title'	=> '</h2>',
	) );
	
	/** Register Sponsor Sidebar 2 */
	register_sidebar( array (
		'name'			=>	'Sponsor 2',
		'id'			=>	'sponsor-sidebar2',
		'description'	=>	'An optional widget area for your sponsor 2',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="sponsor-sidebar2-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="sponsor-sidebar2-widget-title">',
		'after_title'	=> '</h2>',
	) );
	
}

/** Chip Life Register Sidebar */
function chip_life_register_sidebar_init( $args = array() ) {
	
	$defaults = array (
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="widget-title">',
		'after_title'	=> '</h2>',
	);
	
	$defaults = apply_filters( 'chip_life_register_sidebar_defaults', $defaults );	
	$args = wp_parse_args( $args, $defaults );
	
	return register_sidebar( $args );		 
	
}
?>