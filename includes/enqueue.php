<?php
/**
 * Return url with Google Fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function abaya_google_web_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = array( 'latin', 'latin-ext' );
	$fonts = apply_filters( 'pre_google_web_fonts', $fonts );
	foreach ( $fonts as $key => $value ) {
		$fonts[ $key ] = $key . ':' . implode( ',', $value );
	}
	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese, raleway, lato,montserrat)', 'abaya');
	if ( 'cyrillic' == $subset ) {
		array_push( $subsets, 'cyrillic', 'cyrillic-ext' );
	} elseif ( 'greek' == $subset ) {
		array_push( $subsets, 'greek', 'greek-ext' );
	} elseif ( 'devanagari' == $subset ) {
		array_push( $subsets, 'devanagari' );
	} elseif ( 'vietnamese' == $subset ) {
		array_push( $subsets, 'vietnamese' );
	}elseif ( 'raleway' == $subset ) {
		array_push( $subsets, 'raleway' );
	}elseif ( 'lato' == $subset ) {
		array_push( $subsets, 'lato' );
	}
	elseif ( 'montserrat' == $subset ) {
		array_push( $subsets, 'montserrat' );
	}
	$subsets = apply_filters( 'subsets_google_web_fonts', $subsets );
	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( implode( ',', array_unique( $subsets ) ) ),
			),
			'//fonts.googleapis.com/css'
		);
	}
	return apply_filters( 'google_web_fonts_url', $fonts_url );
}
/**
 * Return Google fonts and sizes
 *
 * @return array Google fonts and sizes.
 */
function abaya_additional_fonts( $fonts ) {
	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'abaya' ) ) {
		$fonts['Open Sans'] = array('300italic' => '300italic','400italic'=>'400italic','600italic'=>'600italic','700italic'=>'700italic','800italic'=>'800italic','400'       => '400','300'=> '300','600'=> '600','700'=> '700','800'=> '800');
	}if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'abaya')){
		$fonts['Oswald'] = array('400'=>'400','300'=> '300','700'=>'700');
	}if ( 'off' !== _x( 'on', 'Great Vibes font: on or off', 'abaya')){
		$fonts['Great Vibes'] = array();
	}
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'abaya' ) ) {
		$fonts['Lato'] = array('300italic' => '300italic','400italic'=>'400italic','100italic'=>'100italic','700italic'=>'700italic','100'=>'100','400' => '400','300'=> '300','600'=> '600','700'=> '700','800'=> '800');
	}
		if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'abaya' ) ) {
		$fonts['Raleway'] = array('300italic' => '300italic','400italic'=>'400italic','500italic'=>'500italic',' 600italic'=>'600italic',' 700italic'=>'700italic',' 800italic'=>'800italic',' 900italic'=>'900italic','300'=>'300','400' => '400','500'=> '500','600'=> '600','700'=> '700','800'=> '800','900'=> '900');
	}
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'abaya' ) ) {
		$fonts['Montserrat'] = array('400italic'=>'400italic','700italic'=>'700italic','400' => '400','700'=> '700');
	}
	return $fonts;
}
add_filter('pre_google_web_fonts', 'abaya_additional_fonts');
/**
* Enqueue scripts and styles.  
*/
function abaya_scripts() {
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'),'',true); 
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array(),true ); 
	wp_enqueue_script('animateSlider', get_template_directory_uri() . '/js/jquery.animateSlider.js', array('jquery'),'',true); 
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/flexslider.js', array('jquery'),'',true);
	wp_enqueue_script('comment-reply');
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('abaya-style', get_stylesheet_uri());
	wp_enqueue_style('abaya-responsive', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_style('animateSlider', get_template_directory_uri().'/css/jquery.animateSlider.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', array(), '4.1.0', 'all' );
	wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css');
	wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.css');
	// Load the HTML5 Shiv.
	wp_enqueue_script('html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(), '3.7.2' );
	wp_script_add_data('html5shiv', 'conditional', 'lt IE 9' );
	//Respond.js for IE8 support of HTML5 elements and media queries
	wp_enqueue_script('abaya-respond', get_template_directory_uri().'/js/respond.js', array(), '1.4.2' );
	wp_script_add_data('abaya-respond', 'conditional', 'lt IE 8');
	wp_enqueue_style('abaya-google-fonts', abaya_google_web_fonts_url(), array(), null, 'all' );  
    wp_enqueue_script('abaya-custom', get_template_directory_uri().'/js/custom.js', array(),'',true);
}
add_action('wp_enqueue_scripts', 'abaya_scripts');
?>