<?php
/** Styles the header image and text displayed on the blog */
if ( ! function_exists( 'chip_life_header_style' ) ) :
	
	function chip_life_header_style() {
		
		$headimg = sprintf( '#headimg { border: none; background: url(%s) no-repeat; font-family: Georgia, Times, serif; width: %spx; height: %spx; text-align: center; text-shadow: #fff 1px 1px; }', get_header_image(), HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT );
		$headimgdata = sprintf( '#headimgdata {}' );	
		$h1 = sprintf( '#headimg h1, #headimg h1 a { margin:0px; padding-top:40px; color: #%s; font-size: 48px; font-weight: normal; text-decoration: none; }', esc_html( get_header_textcolor() ) );
		$desc = sprintf( '#headimg #desc { margin:0px; padding-top:0px; color: #%s; font-size: 20px; font-style: italic;  }', esc_html( get_header_textcolor() ) );
	
		printf( '<style type="text/css">%1$s %2$s %3$s %4$s</style>', $headimg, $headimgdata, $h1, $desc );
		
	}

endif;

/** Styles the header image displayed on the Appearance > Header admin panel. */
if ( ! function_exists( 'chip_life_admin_header_style' ) ) :
	
	function chip_life_admin_header_style() {
	
		$headimg = sprintf( '.appearance_page_custom-header #headimg { border: none; background: url(%s) no-repeat; font-family: Georgia, Times, serif; width: %spx; height: %spx; text-align: center; text-shadow: #fff 1px 1px; }', get_header_image(), HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT );
		$h1 = sprintf( '#headimg h1, #headimg h1 a { margin:0px; padding-top:65px; color: #%s; font-size: 48px; font-weight: normal; text-decoration: none; }', esc_html( get_header_textcolor() ) );
		$desc = sprintf( '#headimg #desc { margin:0px; padding-top:25px; color: #%s; font-size: 20px; font-style: italic; }', esc_html( get_header_textcolor() ) );
	
		printf( '<style type="text/css">%1$s %2$s %3$s</style>', $headimg, $h1, $desc );
	
	}

endif;
?>