<?php
/**
 * Avior Theme Customizer
 *
 * @package Avior
 */


/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Avior 1.0
 *
 * @see avior_header_style()
 */
function avior_custom_header_and_background() {
	$color_scheme             = avior_get_color_scheme();
	$default_background_color = trim( $color_scheme[0], '#' );
	$default_text_color       = trim( $color_scheme[3], '#' );

	/**
	 * Filter the arguments used when adding 'custom-background' support in Avior.
	 *
	 * @since Avior 1.0
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 * @type string $default -color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'avior_custom_background_args', array(
		'default-color'    => $default_background_color,
		'wp-head-callback' => 'avior_custom_background_style',
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support in Avior.
	 *
	 * @since Avior 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 * @type string $default -text-color Default color of the header text.
	 * @type int $width Width in pixels of the custom header image. Default 1200.
	 * @type int $height Height in pixels of the custom header image. Default 280.
	 * @type bool $flex -height      Whether to allow flexible-height header images. Default true.
	 * @type callable $wp -head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'avior_custom_header_args', array(
		'default-text-color' => $default_text_color,
		'width'              => 1000,
		'height'             => 250,
		'flex-height'        => true,
		'wp-head-callback'   => 'avior_header_style',
	) ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 280,
		'width'       => 60,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}

add_action( 'after_setup_theme', 'avior_custom_header_and_background' );
if ( ! function_exists( 'avior_custom_background_style' ) ) :
	/**
	 * Styles the custom background displayed on the site.
	 *
	 * Create your own avior_custom_background_style() function to override in a child theme.
	 *
	 * @since Avior 1.0
	 *
	 * @see avior_custom_header_and_background().
	 */
	function avior_custom_background_style() {
		$background       = get_background_color();
		$background_image = get_background_image();
		if ( ( $background != '' && $background != 'ffffff' ) || $background_image != '' ) {
			// If the header text has been hidden.
			?>
			<style type="text/css" id="avior-custom-background-css">
				body.custom-background #page {
					max-width: 1514px;
					margin: 0 auto;
				}
				@media screen and (min-width: 62em) {
					body.custom-background {
						margin-left: 2.22222em;
						margin-right:2.22222em;
					}
				}

				@media screen and (min-width: 93.375em) {
					body.custom-background {
						margin-left: 3.33333em;
						margin-right: 3.33333em;
					}
				}
			</style>
			<?php
			_custom_background_cb();
		}
	}
endif; // avior_header_style

if ( ! function_exists( 'avior_header_style' ) ) :
	/**
	 * Styles the header text displayed on the site.
	 *
	 * Create your own avior_header_style() function to override in a child theme.
	 *
	 * @since Avior 1.0
	 *
	 * @see avior_custom_header_and_background().
	 */
	function avior_header_style() {
		// If the header text option is untouched, let's bail.
		if ( display_header_text() ) {
			return;
		}

		// If the header text has been hidden.
		?>
		<style type="text/css" id="avior-header-css">
			.site-branding {
				margin: 0 auto 0 0;
			}

			.site-branding .site-title,
			.site-description {
				clip: rect(1px, 1px, 1px, 1px);
				position: absolute;
			}
		</style>
		<?php
	}
endif; // avior_header_style

/**
 * Adds postMessage support for site title and description for the Customizer.
 *
 * @since Avior 1.0
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function avior_customize_register( $wp_customize ) {
	$color_scheme = avior_get_color_scheme();

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'container_inclusive' => false,
			'render_callback'     => 'avior_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'avior_customize_partial_blogdescription',
		) );
	}


	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );
	//Remove the core header image control.
	$wp_customize->remove_control( 'header_image' );


// Add main text color setting and control.
	$wp_customize->add_setting( 'main_text_color', array(
		'default'           => $color_scheme[1],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_text_color', array(
		'label'   => esc_html( 'Text Color', 'avior' ),
		'section' => 'colors',
	) ) );

	// Add Brand color setting and control.
	$wp_customize->add_setting( 'brand_color', array(
		'default'           => $color_scheme[2],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_color', array(
		'label'   => esc_html( 'Link Color', 'avior' ),
		'section' => 'colors',
	) ) );

	// Add Hover Brand color setting and control.
	$wp_customize->add_setting( 'brand_color_hover', array(
		'default'           => $color_scheme[3],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_color_hover', array(
		'label'   => esc_html( 'Button Hover Color', 'avior' ),
		'section' => 'colors',
	) ) );

}

add_action( 'customize_register', 'avior_customize_register', 11 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Avior 1.2
 * @see avior_customize_register()
 *
 * @return void
 */
function avior_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Avior 1.2
 * @see avior_customize_register()
 *
 * @return void
 */
function avior_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Registers color schemes for Avior.
 *
 * Can be filtered with {@see 'avior_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Page Background Color.
 * 3. Link Color.
 * 4. Main Text Color.
 * 5. Secondary Text Color.
 *
 * @since Avior 1.0
 *
 * @return array An associative array of color scheme options.
 */
function avior_get_color_schemes() {
	/**
	 * Filter the color schemes registered for use with Avior.
	 *
	 * The default schemes include 'default', 'dark', 'gray', 'red', and 'yellow'.
	 *
	 * @since Avior 1.0
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 * @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 * @type string $label Color scheme label.
	 * @type array $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, page
	 *                              background, link, main text, secondary text.
	 *     }
	 * }
	 */
	return apply_filters( 'avior_color_schemes', array(
		'default' => array(
			'label'  => esc_html( 'Default', 'avior' ),
			'colors' => array(
				'#ffffff',
				'#333333',
				'#1ca4d3',
				'#333333',
			),
		)
	) );
}

if ( ! function_exists( 'avior_get_color_scheme' ) ) :
	/**
	 * Retrieves the current Avior color scheme.
	 *
	 * Create your own avior_get_color_scheme() function to override in a child theme.
	 *
	 * @since Avior 1.0
	 *
	 * @return array An associative array of either the current or default color scheme HEX values.
	 */
	function avior_get_color_scheme() {
		$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
		$color_schemes       = avior_get_color_schemes();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}
endif; // avior_get_color_scheme

if ( ! function_exists( 'avior_get_color_scheme_choices' ) ) :
	/**
	 * Retrieves an array of color scheme choices registered for Avior.
	 *
	 * Create your own avior_get_color_scheme_choices() function to override
	 * in a child theme.
	 *
	 * @since Avior 1.0
	 *
	 * @return array Array of color schemes.
	 */
	function avior_get_color_scheme_choices() {
		$color_schemes                = avior_get_color_schemes();
		$color_scheme_control_options = array();

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}
endif; // avior_get_color_scheme_choices


if ( ! function_exists( 'avior_sanitize_color_scheme' ) ) :
	/**
	 * Handles sanitization for Avior color schemes.
	 *
	 * Create your own avior_sanitize_color_scheme() function to override
	 * in a child theme.
	 *
	 * @since Avior 1.0
	 *
	 * @param string $value Color scheme name value.
	 *
	 * @return string Color scheme name.
	 */
	function avior_sanitize_color_scheme( $value ) {
		$color_schemes = avior_get_color_scheme_choices();

		if ( ! array_key_exists( $value, $color_schemes ) ) {
			return 'default';
		}

		return $value;
	}
endif; // avior_sanitize_color_scheme

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Avior 1.0
 *
 * @see wp_add_inline_style()
 */
function avior_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );

	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}

	$color_scheme = avior_get_color_scheme();


	// If we get this far, we have a custom color scheme.
	$colors = array(
		'background_color'     => $color_scheme[0],
		'main_text_color'      => $color_scheme[1],
		'brand_color'          => $color_scheme[2],
		'secondary_text_color' => $color_scheme[3],

	);

	$color_scheme_css = avior_get_color_scheme_css( $colors );

	wp_add_inline_style( 'avior-style', $color_scheme_css );
}

add_action( 'wp_enqueue_scripts', 'avior_color_scheme_css' );


/**
 * Returns CSS for the color schemes.
 *
 * @since Avior 1.0
 *
 * @param array $colors Color scheme colors.
 *
 * @return string Color scheme CSS.
 */
function avior_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'background_color'  => '',
		'main_text_color'   => '',
		'brand_color'       => '',
		'brand_color_hover' => '',
	) );


	return <<<CSS
	/* Color Scheme */

	/* Background Color */
	body {
		background-color: {$colors['background_color']};
	}
	/* Brand Color */
	select:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus,
	.tagcloud a:hover,
	button, .button, input[type="button"], input[type="reset"], input[type="submit"] {
	  border-color:  {$colors['brand_color']};
	}
	.top-navigation-right .menu-item-has-children .dropdown-toggle:hover, .main-navigation .menu-item-has-children .dropdown-toggle:hover,
	.pagination a.prev:hover, .pagination a.next:hover,
	button, .button, input[type="button"], input[type="reset"], input[type="submit"]{
	  background-color: {$colors['brand_color']};
	}
	.footer-navigation .current_page_item > a, .footer-navigation .current-menu-item > a, .footer-navigation .current_page_ancestor > a, .footer-navigation .current-menu-ancestor > a, .top-navigation-right .current_page_item > a, .top-navigation-right .current-menu-item > a, .top-navigation-right .current_page_ancestor > a, .top-navigation-right .current-menu-ancestor > a, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a,
	.post-navigation a:hover,
	.search-modal .close-search-modal:hover, .search-icon-wrapper:hover,
	.widget.widget_calendar tbody a,
	.search-icon-wrapper a:hover,
	.tagcloud a:hover,
	.entry-footer a:hover, .entry-meta a:hover, .entry-title a:hover,
	.footer-navigation li:hover > a, .top-navigation-right li:hover > a, .main-navigation li:hover > a,
	a {
	  color:  {$colors['brand_color']};
	}
	/* Brand Color  Hover*/	

	.sticky-post,.pagination a.prev, .pagination a.next,
	button:hover,
	.button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover {
	  background-color:  {$colors['brand_color_hover']};
	  border-color:  {$colors['brand_color_hover']};
	}	
	/* Main Text Color */
	body {
	  color: {$colors['main_text_color']};
	}
	mark, ins {
	  background: {$colors['main_text_color']};
	}

CSS;
}


/**
 * Outputs an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since Avior 1.0
 */
function avior_color_scheme_css_template() {
	$colors = array(
		'background_color'  => '{{ data.background_color }}',
		'main_text_color'   => '{{ data.main_text_color }}',
		'brand_color'       => '{{ data.brand_color }}',
		'brand_color_hover' => '{{ data.brand_color_hover }}',
	);
	?>
	<script type="text/html" id="tmpl-avior-color-scheme">
		<?php echo avior_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}

add_action( 'customize_controls_print_footer_scripts', 'avior_color_scheme_css_template' );


/**
 * Enqueues front-end CSS for the link color.
 *
 * @since Avior 1.0
 *
 * @see wp_add_inline_style()
 */
function avior_brand_color_css() {
	$color_scheme  = avior_get_color_scheme();
	$default_color = $color_scheme[2];
	$brand_color   = get_theme_mod( 'brand_color', $default_color );

	// Don't do anything if the current color is the default.
	if ( $brand_color === $default_color ) {
		return;
	}

	$css = '
	select:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus,
	.tagcloud a:hover,
	button, .button, input[type="button"], input[type="reset"], input[type="submit"],
	blockquote {
	  border-color: %1$s;
	}
	.top-navigation-right .menu-item-has-children .dropdown-toggle:hover, .main-navigation .menu-item-has-children .dropdown-toggle:hover,
	.pagination a.prev:hover, .pagination a.next:hover,
	button, .button, input[type="button"], input[type="reset"], input[type="submit"]{
	  background-color: %1$s;
	}
	.footer-navigation .current_page_item > a, .footer-navigation .current-menu-item > a, .footer-navigation .current_page_ancestor > a, .footer-navigation .current-menu-ancestor > a, .top-navigation-right .current_page_item > a, .top-navigation-right .current-menu-item > a, .top-navigation-right .current_page_ancestor > a, .top-navigation-right .current-menu-ancestor > a, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a,
	.post-navigation a:hover,
	.search-modal .close-search-modal:hover, .search-icon-wrapper:hover,
	.widget.widget_calendar tbody a,
	.search-icon-wrapper a:hover,
	.tagcloud a:hover,
	.entry-footer a:hover, .entry-meta a:hover, .entry-title a:hover,
	.footer-navigation li:hover > a, .top-navigation-right li:hover > a, .main-navigation li:hover > a,
	a {
	  color: %1$s;
	}
	
	 
	';

	wp_add_inline_style( 'avior-style', sprintf( $css, $brand_color ) );
}

add_action( 'wp_enqueue_scripts', 'avior_brand_color_css', 11 );

/**
 * Enqueues front-end CSS for the main text color.
 *
 * @since Avior 1.0
 *
 * @see wp_add_inline_style()
 */
function avior_main_text_color_css() {
	$color_scheme    = avior_get_color_scheme();
	$default_color   = $color_scheme[1];
	$main_text_color = get_theme_mod( 'main_text_color', $default_color );

	// Don't do anything if the current color is the default.
	if ( $main_text_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Main Text Color */
		body {
	        color: %1$s;
		}
		mark, ins {
		     background: %1$s;
		}
	';

	wp_add_inline_style( 'avior-style', sprintf( $css, $main_text_color ) );
}

add_action( 'wp_enqueue_scripts', 'avior_main_text_color_css', 11 );


/**
 * Enqueues front-end CSS for the link color.
 *
 * @since Avior 1.0
 *
 * @see wp_add_inline_style()
 */
function avior_brand_color_hover_css() {
	$color_scheme      = avior_get_color_scheme();
	$default_color     = $color_scheme[3];
	$brand_color_hover = get_theme_mod( 'brand_color_hover', $default_color );

	// Don't do anything if the current color is the default.
	if ( $brand_color_hover === $default_color ) {
		return;
	}

	$css = '
	.sticky-post,.pagination a.prev, .pagination a.next,
	button:hover,
	.button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover {
	  background-color:  %1$s;
	  border-color:  %1$s;
	}	
	';

	wp_add_inline_style( 'avior-style', sprintf( $css, $brand_color_hover ) );
}

add_action( 'wp_enqueue_scripts', 'avior_brand_color_hover_css', 11 );


/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 */
function avior_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array(
		'customize-controls',
		'iris',
		'underscore',
		'wp-util'
	), '20160816', true );
	wp_localize_script( 'color-scheme-control', 'colorScheme', avior_get_color_schemes() );
}

add_action( 'customize_controls_enqueue_scripts', 'avior_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 */
function avior_customize_preview_js() {
	wp_enqueue_script( 'avior-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160816', true );
}

add_action( 'customize_preview_init', 'avior_customize_preview_js' );