<?php

/**
 * Defaults
 */
function arcanum_defaults( $defaults = array() ) {

	$arcanum_defaults = array(
		"theme_magazinelayout"		=> 2,
		"theme_headerheight"		=> 600,
		"theme_lpsliderimage"		=> get_stylesheet_directory_uri() . '/resources/images/slider/arcanum.jpg',

		"theme_sitebackground" 		=> "#FCF7F5",
		"theme_sitetext" 			=> "#808080",
		"theme_titletext"			=> "#13315c",
		"theme_headingstext"		=> "#13315c",
		"theme_contentbackground"	=> "#FFFFFF",
		"theme_accent1" 			=> "#36d1dc",
		"theme_accent2" 			=> "#5b86e5",
		"theme_submenutext" 		=> "#ffffff",
		"theme_submenubackground"	=> "#5b86e5",

		"theme_overlaybackground1"  		=> "#36d1dc",
		"theme_overlaybackgroundposition1"  => 0,
		"theme_overlaybackground2"  		=> "#5b86e5",
		"theme_overlaybackgroundposition2"  => 70,
		"theme_overlayangle"  				=> 135,
		"theme_overlayopacity"  			=> 85,

		"theme_footerbackground"	=> "#13315c",
		"theme_lpblocksbg"			=> "#fcf7f5",

		// "theme_fgeneral" 	=> '',
		"theme_fgeneralgoogle" 	=> 'Catamaran',
		"theme_fgeneralsize" 	=> '17',
		"theme_fgeneralweight" 	=> '400',

		//"theme_fsitetitle" 	=> '',
		"theme_fsitetitlegoogle"=> 'Catamaran',
		"theme_fsitetitlesize" 	=> 0.9,
		"theme_fsitetitleweight"=> '700',
		//"theme_fmenu" 		=> '',
		"theme_fmenugoogle"		=> 'Catamaran',
		"theme_fmenusize" 		=> 0.85,
		"theme_fmenuweight"		=> '300',

		//"theme_ftitles" 	=> '',
		"theme_ftitlesgoogle"	=> 'Comfortaa',
		"theme_ftitlessize" 	=> 1.5,
		"theme_ftitlesweight"	=> '700',

		//"theme_meta" 		=> '',
		"theme_metatitlesgoogle"	=> 'Comfortaa',
		"theme_metatitlessize" 	=> 0.9,
		"theme_metatitlesweight"	=> '400',
		"theme_metatitlesvariant"	=> 'none',

		//"theme_singletitle" 		=> '',
		"theme_singletitlegoogle"	=> 'Comfortaa',
		"theme_singletitlesize" 	=> 3.6,
		"theme_singletitleweight"	=> '300',
		"theme_singletitlevariant"	=> '',

		//"theme_singlemeta" 		=> 'Oswald/gfont',
		"theme_singlemetagoogle"	=> 'Comfortaa',
		"theme_singlemetasize" 		=> 1,
		"theme_singlemetaweight"	=> '700',
		"theme_singlemetavariant"	=> '',

		//"theme_fheadings" 	=> '',
		"theme_fheadingsgoogle"	=> 'Comfortaa',
		"theme_fheadingssize" 	=> 100,
		"theme_fheadingsweight"	=> '700',
		"theme_fheadingsvariant"=> '',

		//"theme_fwtitle" 		=> '',
		"theme_fwtitlegoogle"	=> 'Comfortaa',
		"theme_fwtitlesize" 	=> 1.15,
		"theme_fwtitleweight"	=> '700',
		//"theme_fwcontent" 	=> '',
		"theme_fwcontentgoogle"	=> 'Catamaran',
		"theme_fwcontentsize" 	=> 1,
		"theme_fwcontentweight"	=> '400',

		"theme_excerptlength"	=> 35,
		"theme_excerptcont"		=> 'Read more'
	); // arcanum_defaults array

	$result = array_merge( $defaults, $arcanum_defaults );

	return $result;

} // arcanum_defaults()
add_filter( 'esotera_option_defaults_array', 'arcanum_defaults' );

// needed? for the .org preview
function arcanum_filter_defaults(){
	add_filter( 'esotera_option_defaults_array', 'arcanum_defaults' );
} // arcanum_filter_defaults()
add_action( 'customize_register', 'arcanum_filter_defaults' );


/**
 * Handle theme labels in customize panels
 */
function arcanum_about_theme_name( $initial ) {
	return __( 'About Arcanum', 'arcanum' );
} // arcanum_about_theme_name()
add_filter( 'cryout_about_theme_name', 'arcanum_about_theme_name' );

function arcanum_about_theme_plus_desc( $initial ) {
	$theme = wp_get_theme();
	return '<h3>' . sprintf( esc_attr__( '%1$s is a child theme of %2$s', 'arcanum' ), esc_attr( $theme->get( 'Name' ) ), ucwords( esc_attr( $theme->get( 'Template' ) ) ) ) . '</h3>' . $initial;
} // arcanum_about_theme_plus_desc()
add_filter( 'cryout_about_theme_plus_desc', 'arcanum_about_theme_plus_desc' );

function arcanum_about_theme_slug_swap( $initial ){
	return str_replace( array( 'esotera', 'Esotera' ), array( 'arcanum', 'Arcanum' ), $initial );
} // arcanum_about_theme_slug_swap()
add_filter( 'cryout_about_theme_review_link', 'arcanum_about_theme_slug_swap' );
add_filter( 'cryout_about_theme_manage_link', 'arcanum_about_theme_slug_swap' );

// FIN
