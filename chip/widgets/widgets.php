<?php
/** Chip Life Widget Classes */
add_action( 'chip_life_widget_class', 'chip_life_widget_class_init' );
function chip_life_widget_class_init() {
	require_once( CHIP_LIFE_CHIP_DIR . '/widgets/chip-life-social-widget.php' );
}

/** Register Chip Life Social Widget */
add_action( 'chip_life_register_widget', 'chip_life_register_social_widget_init' );
function chip_life_register_social_widget_init() {	
	chip_life_register_widget_init( 'Chip_Life_Social_Widget' )	;
}

/** Register Header Left Sidebar */
add_action( 'chip_life_register_header_sidebar', 'chip_life_register_header_left_sidebar_init' );
function chip_life_register_header_left_sidebar_init() {
	
	$args = array (
		'name'			=>	'Header Left',
		'id'			=>	'header-left-sidebar',
		'description'	=>	'An optional widget area for the left side of the header',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="header-left-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="header-left-widget-title">',
		'after_title'	=> '</h2>',
	);
	chip_life_register_sidebar_init( $args );
	
}

/** Register Header Right Sidebar */
add_action( 'chip_life_register_header_sidebar', 'chip_life_register_header_right_sidebar_init' );
function chip_life_register_header_right_sidebar_init() {
	
	$args = array (
		'name'			=>	'Header Right',
		'id'			=>	'header-right-sidebar',
		'description'	=>	'An optional widget area for the right side of the header',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="header-right-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="header-right-widget-title">',
		'after_title'	=> '</h2>',
	);
	chip_life_register_sidebar_init( $args );
	
}

/** Register Primary Sidebar */
add_action( 'chip_life_register_sidebar', 'chip_life_register_primary_sidebar_init' );
function chip_life_register_primary_sidebar_init() {	
	$args = array ( 
		'name' => 'Primary Sidebar',
		'id' => 'primary-sidebar',
		'description' => 'Primary sidebar of your blog'
	);
	chip_life_register_sidebar_init( $args );	
}

/** Register Footer Left */
add_action( 'chip_life_register_footer_sidebar', 'chip_life_register_footer_left_sidebar_init' );
function chip_life_register_footer_left_sidebar_init() {
	
	$args = array (
		'name'			=>	'Footer Left',
		'id'			=>	'footer-left-sidebar',
		'description'	=>	'An optional widget area for the left side of the footer',
		'before_widget'	=>	'<div id="%1$s" class="footer-left-widget %2$s"><div class="footer-left-widget-data">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="footer-left-widget-title">',
		'after_title'	=> '</h2>',
	);
	chip_life_register_sidebar_init( $args );	
	
}

/** Register Footer Middle */
add_action( 'chip_life_register_footer_sidebar', 'chip_life_register_footer_middle_sidebar_init' );
function chip_life_register_footer_middle_sidebar_init() {
	
	$args = array (
		'name'			=>	'Footer Middle',
		'id'			=>	'footer-middle-sidebar',
		'description'	=>	'An optional widget area for the middle area of the footer',
		'before_widget'	=>	'<div id="%1$s" class="footer-middle-widget %2$s"><div class="footer-middle-widget-data">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="footer-middle-widget-title">',
		'after_title'	=> '</h2>',
	);
	chip_life_register_sidebar_init( $args );
	
}

/** Register Footer Right */
add_action( 'chip_life_register_footer_sidebar', 'chip_life_register_footer_right_sidebar_init' );
function chip_life_register_footer_right_sidebar_init() {
	
	$args = array (
		'name'			=>	'Footer Right',
		'id'			=>	'footer-right-sidebar',
		'description'	=>	'An optional widget area for the right side of the footer',
		'before_widget'	=>	'<div id="%1$s" class="footer-right-widget %2$s"><div class="footer-right-widget-data">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="footer-right-widget-title">',
		'after_title'	=> '</h2>',
	);
	chip_life_register_sidebar_init( $args );
	
}

/** Register Sponsor Sidebar 1 */
add_action( 'chip_life_register_extra_sidebar', 'chip_life_register_sponsor_sidebar1_init' );
function chip_life_register_sponsor_sidebar1_init() {
	
	$args = array (
		'name'			=>	'Sponsor 1',
		'id'			=>	'sponsor-sidebar1',
		'description'	=>	'An optional widget area for your sponsor 1',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="sponsor-sidebar1-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="sponsor-sidebar1-widget-title">',
		'after_title'	=> '</h2>',
	);
	chip_life_register_sidebar_init( $args );
	
}

/** Register Sponsor Sidebar 2 */
add_action( 'chip_life_register_extra_sidebar', 'chip_life_register_sponsor_sidebar2_init' );
function chip_life_register_sponsor_sidebar2_init() {
	
	$args = array (
		'name'			=>	'Sponsor 2',
		'id'			=>	'sponsor-sidebar2',
		'description'	=>	'An optional widget area for your sponsor 2',
		'before_widget'	=>	'<div id="%1$s" class="%2$s"><div class="sponsor-sidebar2-widget-wrap">',
		'after_widget'	=>	'<div class="clear"></div></div></div>',
		'before_title'	=>	'<h2 class="sponsor-sidebar2-widget-title">',
		'after_title'	=> '</h2>',
	);
	chip_life_register_sidebar_init( $args );
	
}

/** Chip Life Register Widget */
function chip_life_register_widget_init( $arg ) {
	
	if( !empty( $arg ) ) {
		return register_widget( $arg );		 
	}
	
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

/** Chip Life Widgets */
add_action( 'widgets_init', 'chip_life_widgets' );
function chip_life_widgets() {
	
	/** Chip Life Widget Classes */
	do_action( 'chip_life_widget_class' );
	
	/** Chip Life Register Widgets */
	do_action( 'chip_life_register_widget' );	
	
	/** Chip Life Register Header Sidebar Hook */
	do_action( 'chip_life_register_header_sidebar' );
	
	/** Chip Life Register Sidebar Hook */
	do_action( 'chip_life_register_sidebar' );
	
	/** Chip Life Register Footer Sidebar Hook */
	do_action( 'chip_life_register_footer_sidebar' );
	
	/** Chip Life Register Extra Sidebar Hook */
	do_action( 'chip_life_register_extra_sidebar' );
	
}
?>