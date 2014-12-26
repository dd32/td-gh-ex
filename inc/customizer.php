<?php
/**
 * Accent Theme Customizer
 *
 * @package Accent
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
// Sanitizing body font
function accent_sanitize_bodyfont( $input_bodyfont ) {
    $valid_bodyfont = array(
        'Source Sans Pro'    => 'Source Sans Pro',
		'Open Sans'          => 'Open Sans',
		'Lato'               => 'Lato',
		'Merriweather Sans'  => 'Merriweather Sans',
		'Ubuntu'             => 'Ubuntu',
		'Vollkorn'           => 'Vollkorn',
		'Alegreya'           => 'Alegreya',
		'Lora'               => 'Lora',
		'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
		'Droid Serif'        => 'Droid Serif',
		'Noto Serif'         => 'Noto Serif',
		'Gentium Book Basic' => 'Gentium Book Basic'
    );
 
    if ( array_key_exists( $input_bodyfont, $valid_bodyfont ) ) {
        return $input_bodyfont;
    } else {
        return 'Source Sans Pro';
    }
}

// Sanitizing headings font
function accent_sanitize_headingsfont( $input_headingsfont ) {
    $valid_headingsfont = array(
        'Source Sans Pro'    => 'Source Sans Pro',
		'Open Sans'          => 'Open Sans',
		'Lato'               => 'Lato',
		'Merriweather Sans'  => 'Merriweather Sans',
		'Ubuntu'             => 'Ubuntu',
		'Vollkorn'           => 'Vollkorn',
		'Alegreya'           => 'Alegreya',
		'Lora'               => 'Lora',
		'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
		'Droid Serif'        => 'Droid Serif',
		'Noto Serif'         => 'Noto Serif',
		'Gentium Book Basic' => 'Gentium Book Basic',
		'Roboto Condensed'   => 'Roboto Condensed',
		'Varela Round'       => 'Varela Round',
		'Montserrat'         => 'Montserrat',
		'Sanchez'            => 'Sanchez',
		'Patua One'          => 'Patua One',		
		'Bitter'             => 'Bitter',
		'Libre Baskerville'  => 'Libre Baskerville'
    );
 
    if ( array_key_exists( $input_headingsfont, $valid_headingsfont ) ) {
        return $input_headingsfont;
    } else {
        return 'Varela Round';
    }
}

// Sanitizing checkboxes
function accent_sanitize_checkbox( $input_checkbox ) {
    if ( $input_checkbox == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// Sanitizing uploads
function accent_sanitize_image( $input_image ) {
	$output = '';
	$filetype = wp_check_filetype($input_image);
	if ( $filetype["ext"] ) {
	$output = $input_image;
	}
	return $output;
}

function accent_customize_register( $wp_customize ) {

	// Register Theme section
	$wp_customize->add_section(
		'typography',
		array(
			'title'    => __( 'Typography', 'accent' ),
			'priority' => 40,
		)
	);
	
	// Link Color
	$wp_customize->add_setting( 'links_color', array(
		'default'           => '#48A3A6',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
	) );     
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'links_color',
		array(
			'label'      => __( 'Links Color', 'accent' ),
			'section'    => 'colors',
			'settings'   => 'links_color',
			'priority'   => 10,
		) 
	) );
	
	// Header background color
	$wp_customize->add_setting( 'header_background', array(
		'default'           => '#2B2F3E',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
	) );     
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'header_background',
		array(
			'label'      => __( 'Main Menu & Footer info Background Color', 'accent' ),
			'section'    => 'colors',
			'settings'   => 'header_background',
			'priority'   => 20,
		) 
	) );
	
	// Logo
	$wp_customize->add_setting( 'logo', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'accent_sanitize_image',
		'transport'         => 'refresh'
	) );     
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'logo',
		array(
			'label'      => __( 'Upload your custom logo.', 'accent' ),
			'section'    => 'title_tagline',
			'settings'   => 'logo',
			'context'    => 'logo',
			'priority'   => 30,
		)
	) );
	
	// Typography 
	$wp_customize->add_setting(
		'body_font',
		array(
			'default'           => 'Source Sans Pro',
			'sanitize_callback' => 'accent_sanitize_bodyfont',
		)
	);
	$wp_customize->add_setting(
		'headings_font',
		array(
			'default'           => 'Varela Round',
			'sanitize_callback' => 'accent_sanitize_headingsfont',
		)
	);
	$wp_customize->add_setting(
		'bold_titles',
		array(
			'default'           => '1',
			'sanitize_callback' => 'accent_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'body_font',
		array(
			'label'      => __( 'Body Font', 'accent' ),
			'section'    => 'typography',
			'settings'   => 'body_font',
			'type'       => 'select',
			'choices'    => array(
				'Source Sans Pro'    => 'Source Sans Pro',
				'Open Sans'          => 'Open Sans',
				'Lato'               => 'Lato',
				'Merriweather Sans'  => 'Merriweather Sans',
				'Ubuntu'             => 'Ubuntu',
				'Vollkorn'           => 'Vollkorn',
				'Alegreya'           => 'Alegreya',
				'Lora'               => 'Lora',
				'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
				'Droid Serif'        => 'Droid Serif',
				'Noto Serif'         => 'Noto Serif',
				'Gentium Book Basic' => 'Gentium Book Basic'
			),
			'priority'   => 40
		) 
	);
	$wp_customize->add_control(
		'headings_font',
		array(
			'label'      => __( 'Headings Font', 'accent' ),
			'section'    => 'typography',
			'settings'   => 'headings_font',
			'type'       => 'select',
			'choices'    => array(
				'Source Sans Pro'    => 'Source Sans Pro',
				'Open Sans'          => 'Open Sans',
				'Lato'               => 'Lato',
				'Merriweather Sans'  => 'Merriweather Sans',
				'Ubuntu'             => 'Ubuntu',
				'Vollkorn'           => 'Vollkorn',
				'Alegreya'           => 'Alegreya',
				'Lora'               => 'Lora',
				'Sorts Mill Goudy'   => 'Sorts Mill Goudy',
				'Droid Serif'        => 'Droid Serif',
				'Noto Serif'         => 'Noto Serif',
				'Gentium Book Basic' => 'Gentium Book Basic',
				'Roboto Condensed'   => 'Roboto Condensed',
				'Varela Round'       => 'Varela Round',
				'Montserrat'         => 'Montserrat',
				'Sanchez'            => 'Sanchez',
				'Patua One'          => 'Patua One',		
				'Bitter'             => 'Bitter',
				'Libre Baskerville'  => 'Libre Baskerville'
			),
			'priority'   => 50
		) 
	);
	$wp_customize->add_control(
    'bold_titles',
    array(
        'type'     => 'checkbox',
        'label'    => 'Bold Entry Titles',
        'section'  => 'typography',
		'priority' => 60
    )
);
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
}
add_action( 'customize_register', 'accent_customize_register' );

/**
 * Outputting the custom css from the theme customizer.
 */
 
function accent_custom_css() {
	//Body and headings type
	if ( 'Source Sans Pro' != get_theme_mod( 'body_font', 'Source Sans Pro' ) ) { ?>
	<style id="accent-body-font" type="text/css">
		body,
		button,
		input,
		select,
		textarea,
		.site-description {
			font-family: <?php echo get_theme_mod( 'body_font' ); ?>;
		}
	</style>
	<?php }
	
	if ( 'Varela Round' != get_theme_mod( 'headings_font', 'Varela Round' ) ) { ?>
	<style id="accent-headings-font" type="text/css">
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: <?php echo get_theme_mod( 'headings_font' ); ?>;
		}
	</style>
	<?php }
	// Bold entry titles
	if ( '1' != get_theme_mod( 'bold_titles', '1' ) ) { ?>
	<style id="accent-bold-titles" type="text/css">
		.entry-title {
			font-weight: normal;
		}
	</style>
	<?php }
	//Links color
	if ( '#48A3A6' != get_theme_mod( 'links_color', '#48A3A6' ) ) { ?>
	<style id="accent-links-color" type="text/css">
	a, a:visited, .entry-title a:hover, .menu-toggle:hover, .toggled .menu-toggle {
		color: <?php echo get_theme_mod( 'links_color' ); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	.more-link:hover {
		background: <?php echo get_theme_mod( 'links_color' ); ?>;
	}

	button:focus,
	input[type="button"]:focus,
	input[type="reset"]:focus,
	input[type="submit"]:focus,
	.more-link:focus,
	button:active,
	input[type="button"]:active,
	input[type="reset"]:active,
	input[type="submit"]:active,
	.more-link:active {
		background: <?php echo get_theme_mod( 'links_color' ); ?>;
	}
	.main-navigation a {
		color: #d2d2d2;
	}
	.bypostauthor .comment-body {
		border-left: 6px solid <?php echo get_theme_mod( 'links_color' ); ?>;
	}
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	textarea:focus {
		border: 1px solid <?php echo get_theme_mod( 'links_color' ); ?>;
	}
	</style>
	<?php }
	
	//Header background color
	if ( '#2B2F3E' != get_theme_mod( 'header_background', '#2B2F3E' ) ) { ?>
	<style id="accent-header-color" type="text/css">
	
	#masthead, button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.menu-toggle:hover,
	.menu-toggle:focus,
	.menu-toggle:active,
	.mobile-search,
	.more-link,
	.sticky-post,
	.site-info {
		background: <?php echo get_theme_mod( 'header_background' ); ?>;
	}
	@media all and (min-width: 1025px) {
		.main-navigation ul ul {
			background: <?php echo get_theme_mod( 'header_background' ); ?>;
		}
	}
	</style>
	<?php }
}

add_action( 'wp_head', 'accent_custom_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function accent_customize_preview_js() {
	wp_enqueue_script( 'accent_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'accent_customize_preview_js' );
