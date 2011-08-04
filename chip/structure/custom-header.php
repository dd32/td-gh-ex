<?php
/** Chip Life Custom Header */
add_action( 'chip_life_setup', 'chip_life_custom_header' ); 
function chip_life_custom_header() {

	/** The default header text color */
	define( 'HEADER_TEXTCOLOR', '272836' );
	/** By leaving empty, we allow for random image rotation. */
	define( 'HEADER_IMAGE', '' );
	/** The height and width of your custom header. */
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'chip_life_header_image_width', 960 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'chip_life_header_image_height', 200 ) );
	/** Header Text */
	define( 'NO_HEADER_TEXT', false );
	
	/** Turn on random header image rotation by default. */
	add_theme_support( 'custom-header', array( 'random-default' => true ) );
	/** Add a way for the custom header to be styled in the admin panel that controls */
	add_custom_image_header( 'chip_life_header_style', 'chip_life_admin_header_style' );
	
	/** Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI. */
	register_default_headers( array(
		
		'chiplife' =>	array(
			'url' => '%s/images/headers/header-chiplife.png',
			'thumbnail_url' => '%s/images/headers/header-chiplife-thumb.png',
			'description' => 'Chip Life'
		),
		
		'blue' =>	array(
			'url' => '%s/images/headers/header-blue.png',
			'thumbnail_url' => '%s/images/headers/header-blue-thumb.png',
			'description' => 'Blue'
		),
		
		'lightgreen' =>	array(
			'url' => '%s/images/headers/header-lightgreen.png',
			'thumbnail_url' => '%s/images/headers/header-lightgreen-thumb.png',
			'description' => 'Light Green'
		),
		
		'slate' =>	array(
			'url' => '%s/images/headers/header-slate.png',
			'thumbnail_url' => '%s/images/headers/header-slate-thumb.png',
			'description' => 'Slate'
		),
		
		'violet' =>	array(
			'url' => '%s/images/headers/header-violet.png',
			'thumbnail_url' => '%s/images/headers/header-violet-thumb.png',
			'description' => 'Violet'
		),
		
		'yellow' =>	array(
			'url' => '%s/images/headers/header-yellow.png',
			'thumbnail_url' => '%s/images/headers/header-yellow-thumb.png',
			'description' => 'Yellow'
		),	
		
	
	) );

}

/** Styles the header image and text displayed on the blog */
function chip_life_header_style() {
	
	$headimg = sprintf( '#headimg { border: none; background: url(%s) no-repeat; font-family: Georgia, Times, serif; width: %spx; height: %spx; text-align: center; text-shadow: #fff 1px 1px; }', get_header_image(), HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT );
	$headimgdata = sprintf( '#headimg-data {}' );	
	$h1 = sprintf( '#headimg h1, #headimg h1 a { margin:0px; padding-top:55px; color: #%s; font-size: 48px; font-weight: normal; text-decoration: none; }', esc_html( get_header_textcolor() ) );
	$desc = sprintf( '#headimg #desc { margin:0px; padding-top:15px; color: #%s; font-size: 20px; font-style: italic;  }', esc_html( get_header_textcolor() ) );

	printf( '<style type="text/css">%1$s %2$s %3$s %4$s</style>', $headimg, $headimgdata, $h1, $desc );
	
}

/** Styles the header image displayed on the Appearance > Header admin panel. */
function chip_life_admin_header_style() {

	$headimg = sprintf( '.appearance_page_custom-header #headimg { border: none; background: url(%s) no-repeat; font-family: Georgia, Times, serif; width: %spx; height: %spx; text-align: center; text-shadow: #fff 1px 1px; }', get_header_image(), HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT );
	$h1 = sprintf( '#headimg h1, #headimg h1 a { margin:0px; padding-top:65px; color: #%s; font-size: 48px; font-weight: normal; text-decoration: none; }', esc_html( get_header_textcolor() ) );
	$desc = sprintf( '#headimg #desc { margin:0px; padding-top:25px; color: #%s; font-size: 20px; font-style: italic; }', esc_html( get_header_textcolor() ) );

	printf( '<style type="text/css">%1$s %2$s %3$s</style>', $headimg, $h1, $desc );

}
?>