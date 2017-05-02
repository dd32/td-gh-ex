<?php
/**
 * Return url with Google Fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function backyard_google_web_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = array( 'latin', 'latin-ext' );
	$fonts = apply_filters( 'backyard_pre_google_web_fonts', $fonts );
	foreach ( $fonts as $key => $value ) {
		$fonts[ $key ] = $key . ':' . implode( ',', $value );
	}
	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'backyard');
	if ( 'cyrillic' == $subset ) {
		array_push( $subsets, 'cyrillic', 'cyrillic-ext' );
	} elseif ( 'greek' == $subset ) {
		array_push( $subsets, 'greek', 'greek-ext' );
	} elseif ( 'devanagari' == $subset ) {
		array_push( $subsets, 'devanagari' );
	} elseif ( 'vietnamese' == $subset ) {
		array_push( $subsets, 'vietnamese' );
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
	return apply_filters( 'backyard_google_web_fonts_url', $fonts_url );
}
/**
 * Return Google fonts and sizes
 *
 * @return array Google fonts and sizes.
 */
function backyard_additional_fonts( $fonts ) {
	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'backyard' ) ) {
		$fonts['Open Sans'] = array('300italic' => '300italic','400italic'=>'400italic','600italic'=>'600italic','700italic'=>'700italic','800italic'=>'800italic','400'       => '400','300'=> '300','600'=> '600','700'=> '700','800'=> '800');
	}if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'backyard')){
		$fonts['Oswald'] = array('400'=>'400','300'=> '300','700'=>'700');
	}if ( 'off' !== _x( 'on', 'Great Vibes font: on or off', 'backyard')){
		$fonts['Great Vibes'] = array();
	}
	return $fonts;
}
add_filter('backyard_pre_google_web_fonts', 'backyard_additional_fonts');


/**
 * Enqueue scripts and stylesheets
 *
 */
function backyard_scripts() {
	    wp_enqueue_style('google-fonts', backyard_google_web_fonts_url(), array(), null);
	    wp_enqueue_style('backyard-style', get_stylesheet_uri() );
        wp_enqueue_style('bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css');
        wp_enqueue_style('backyard-main', get_template_directory_uri().'/assets/css/main.css');
        wp_enqueue_style('backyard-responsive', get_template_directory_uri().'/assets/css/responsive.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.css');
        wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
		wp_enqueue_script('bootstrap-script', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'),true);
        wp_enqueue_script('wow', get_template_directory_uri().'/assets/js/wow.js', array('jquery'),true );       
        wp_enqueue_script('backyard-custom', get_template_directory_uri().'/assets/js/custom.js', array('jquery'),true );
        wp_enqueue_script('jquery-flexslider', get_template_directory_uri().'/assets/js/jquery.flexslider.js', array('jquery'),true);		
		// Load the HTML5 Shiv.
		wp_enqueue_script('backyard-html5', get_template_directory_uri() . '/assets/js/html5shiv.js', array(), '3.7.2');
		wp_script_add_data('backyard-html5', 'conditional', 'lt IE 9' );
		//Respond.js for IE8 support of HTML5 elements and media queries
		wp_enqueue_script('backyard-ie8supportofhtml5', get_template_directory_uri() . '/assets/js/respond.js', array(), '1.4.2');
		wp_script_add_data('backyard-ie8supportofhtml5', 'conditional', 'lt IE 8');		
        if (is_page() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'backyard_scripts');
?>