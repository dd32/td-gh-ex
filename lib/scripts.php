<?php
if ( ! function_exists( 'backyard_fonts_url' ) ) :
/**
 * Register Google fonts for Backyard.
 *
 * @since Backyard 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function backyard_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open+Sans font: on or off', 'backyard' ) ) {
		$fonts[] = 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair+Display: on or off', 'backyard' ) ) {
		$fonts[] = 'Playfair+Display';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'backyard' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg(array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Enqueue scripts and stylesheets
 *
 */
function backyard_scripts() {
	    wp_enqueue_style('backyard-fonts', backyard_fonts_url(), array(), null);
	    wp_enqueue_style('backyard-style', get_stylesheet_uri() );
        wp_enqueue_style('bootstrap-maxcdn', get_template_directory_uri().'/assets/css/bootstrap.min.css');
        wp_enqueue_style('main-style', get_template_directory_uri().'/assets/css/main.css');
        wp_enqueue_style('responsive', get_template_directory_uri().'/assets/css/responsive.css');
		wp_enqueue_style('font-awesome-maxcdn', get_template_directory_uri().'/assets/css/font-awesome.min.css');
        wp_enqueue_style('animate-style', get_template_directory_uri().'/assets/css/animate.min.css');
        wp_enqueue_script('wow-scripts', get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'),true );
        wp_enqueue_script('owl-carousel-scripts', get_template_directory_uri().'/assets/js/owl.carousel.js', array('jquery'),true);
        wp_enqueue_script('custom-scripts', get_template_directory_uri().'/assets/js/custom.js', array('jquery'),true );
        wp_enqueue_script('flexslider-scripts', get_template_directory_uri().'/assets/js/jquery.flexslider.js', array('jquery'),true);
		wp_enqueue_script('collagePlus-scripts', get_template_directory_uri().'/assets/js/jquery.collagePlus.js', array('jquery'),true);
		// Load the HTML5 Shiv.
		wp_enqueue_script('backyard-html5', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.2');
		wp_script_add_data('backyard-html5', 'conditional', 'lt IE 9' );
		//Respond.js for IE8 support of HTML5 elements and media queries
		wp_enqueue_script('backyard-ie8supportofhtml5', get_template_directory_uri() . '/assets/js/respond.min.js', array(), '1.4.2');
		wp_script_add_data('backyard-ie8supportofhtml5', 'conditional', 'lt IE 8');
		wp_enqueue_script('bootstrap-netdna', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'),true);
        if (is_page() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'backyard_scripts');
?>