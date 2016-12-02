<?php
/**
 * Arouse Theme Customizer.
 *
 * @package Arouse
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function arouse_customize_register( $wp_customize ) {

	require( get_template_directory() . '/inc/customizer/custom-controls/control-category-dropdown.php' );
	require( get_template_directory() . '/inc/customizer/custom-controls/control-custom-content.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /**
     * Slider Settings section.
     */
    $wp_customize->add_section( 
    	'arouse_slider', 
    	array(
			'title' => __( 'Slider', 'arouse' ),
			'description' => __( 'Use this section to setup the homepage slider.', 'arouse' ),
			'priority' => 30,
		) 
	);

    // Display slider?
    $wp_customize->add_setting(
		'display_slider',
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'arouse_sanitize_checkbox'
		)
	);
    $wp_customize->add_control(
		'display_slider',
		array(
			'settings'		=> 'display_slider',
			'section'		=> 'arouse_slider',
			'type'			=> 'checkbox',
			'label'			=> __( 'Display slider on homepage ?', 'arouse' )
		)
	);

	$wp_customize->add_setting(
		'slider_category',
		array(
			'default'			=> '',
			'sanitize_callback'	=> 'arouse_sanitize_category_dropdown'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Category_Control( 
			$wp_customize,
			'slider_category', 
			array(
			    'label'   		=> __( 'Select the category for slider.', 'arouse' ),
			    'description'	=> __( 'Featured images of the posts from selected category will be displayed in the slider', 'arouse' ),
			    'section' 		=> 'arouse_slider',
			    'settings'  	=> 'slider_category',
			) 
		) 
	);


    /**
     * Home Settings section.
     */
    $wp_customize->add_panel( 
		'arouse_home_settings', 
		array(
			'title' => __( 'Front Page Settings', 'arouse' ),
			'description' => __( 'Use this panel to set your home page settings', 'arouse' ),
			'priority' => 31, 
		) 
	);

    $wp_customize->add_section( 
    	'arouse_featured_section', 
    	array(
			'title' => __( 'Featured Content', 'arouse' ),
			'description' => __( 'Use this section to setup the featured pages that are just below the slider.', 'arouse' ),
			'panel' => 'arouse_home_settings'
		) 
	);	

    $wp_customize->add_setting(
		'display_featured_section',
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'arouse_sanitize_checkbox'
		)
	);
    $wp_customize->add_control(
		'display_featured_section',
		array(
			'section'		=> 'arouse_featured_section',
			'type'			=> 'checkbox',
			'label'			=> __( 'Display featured pages section?', 'arouse' )
		)
	);	

    $wp_customize->add_setting(
        'featured_content_type',
        array (
            'default'           => 'posts',
            'sanitize_callback' => 'arouse_sanitize_select',
            'transport'         => 'refresh'
        )
    );
    $wp_customize->add_control(
        'featured_content_type',
        array(
            'label'     		=> __( 'Featured Content Type', 'arouse' ),
            'section'   		=> 'arouse_featured_section',
            'type'      		=> 'radio',
            'description'		=> __( 'Select the featured content type.', 'arouse' ),
            'choices'   => array (
                'pages' 	=> __( 'Pages + Featured Images.', 'arouse' ),
                'posts'  	=> __( 'Posts + Featured Images.', 'arouse' )
            )
        )
    );	

    $wp_customize->add_setting(
		'display_page_titles',
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'arouse_sanitize_checkbox'
		)
	);
    $wp_customize->add_control(
		'display_page_titles',
		array(
			'section'		=> 'arouse_featured_section',
			'type'			=> 'checkbox',
			'label'			=> __( 'Display page titles?', 'arouse' ),
			'active_callback'	=> 'arouse_featured_content_choice_callback'
		)
	);	

	for( $i = 1; $i <= 3; $i++ ) {

	    $wp_customize->add_setting( 
	        'featured_article_' . $i, 
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'absint'
	        )
	    );

	    $wp_customize->add_control( 
	        'featured_article_' . $i, 
	        array(
	            'label'         => sprintf( __( 'Select page %d.', 'arouse' ), $i ),
	            'section'       => 'arouse_featured_section',
	            'type'          => 'dropdown-pages',
	            'active_callback'	=> 'arouse_featured_content_choice_callback'
	        ) 
	    );	

	}

	$wp_customize->add_setting(
		'fcontent_category',
		array(
			'default'			=> '',
			'sanitize_callback'	=> 'arouse_sanitize_category_dropdown'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Category_Control( 
			$wp_customize,
			'fcontent_category', 
			array(
			    'label'   			=> __( 'Select the category for featured posts.', 'arouse' ),
			    'description'		=> __( 'You can leave this empty to display latest posts.', 'arouse' ),
			    'section' 			=> 'arouse_featured_section',
			    'active_callback'	=> 'arouse_featured_content_choice_callback'
			) 
		) 
	);	

    $wp_customize->add_setting(
		'display_fpost_titles',
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'arouse_sanitize_checkbox'
		)
	);
    $wp_customize->add_control(
		'display_fpost_titles',
		array(
			'section'			=> 'arouse_featured_section',
			'type'				=> 'checkbox',
			'label'				=> __( 'Display post titles?', 'arouse' ),
			'active_callback'	=> 'arouse_featured_content_choice_callback'
		)
	);	

	/* Theme Options */
    $wp_customize->add_section( 
    	'arouse_theme_options', 
    	array(
			'title' 		=> __( 'Theme Options', 'arouse' ),
			'priority' 		=> 32, 
		) 
	);		

    // Blog listing layout.
    $wp_customize->add_setting(
        'archive_listing_layout',
        array (
            'default'           => 'grid',
            'sanitize_callback' => 'arouse_sanitize_select',
            'transport'         => 'refresh'
        )
    );
    $wp_customize->add_control(
        'archive_listing_layout',
        array(
            'label'     	=> __( 'Blog posts listing layout', 'arouse' ),
            'section'   	=> 'arouse_theme_options',
            'type'      	=> 'radio',
            'description'	=> __( 'Select the main layout for blog posts listing.', 'arouse' ),
            'choices'   => array (
                'grid' 	=> __( 'Grid Layout.', 'arouse' ),
                'list'  => __( 'List Layout.', 'arouse' ),
            )
        )
    );	

    
   	$wp_customize->add_setting(
		'show_article_featured_image',
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'arouse_sanitize_checkbox'
		)
	);
    $wp_customize->add_control(
		'show_article_featured_image',
		array(
			'settings'		=> 'show_article_featured_image',
			'section'		=> 'arouse_theme_options',
			'type'			=> 'checkbox',
			'label'			=> __( 'Display featured image on single post article ?', 'arouse' )
		)
	);

    $wp_customize->add_section( 
    	'arouse_theme_info', 
    	array(
			'title' 		=> __( 'Arouse Theme Info', 'arouse' ),
			'priority'		=> 125
		) 
	);

	$wp_customize->add_setting( 
		'arouse_documentation_link', 
		array(
			'sanitize_callback'	=> 'arouse_sanitize_html'
		) 
	);

	$wp_customize->add_control( 
		new Arouse_Custom_Content( 
			$wp_customize, 
			'arouse_documentation_link', 
			array(
				'section' 		=> 'arouse_theme_info',
				'label' 		=> __( 'Arouse Documentation', 'arouse' ),
				'content' 		=> __( '<a class="button" href="http://themezhut.com/arouse-wordpress-theme-documentation/" target="_blank">Read the documentation.</a></p>', 'arouse' ) . '</p>',
			) 
		) 
	);	

	$wp_customize->add_setting( 
		'arouse_demo_link', 
		array(
			'sanitize_callback'	=> 'arouse_sanitize_html'
		) 
	);

	$wp_customize->add_control( 
		new Arouse_Custom_Content( 
			$wp_customize, 
			'arouse_demo_link', 
			array(
				'section' 		=> 'arouse_theme_info',
				'label' 		=> __( 'Arouse Demo', 'arouse' ),
				'content' 		=> __( '<a class="button" href="http://themezhut.com/demo/arouse/" target="_blank">See the demo.</a></p>', 'arouse' ) . '</p>',
			) 
		) 
	);

	$wp_customize->add_setting( 
		'arouse_pro_details', 
		array(
			'sanitize_callback'	=> 'arouse_sanitize_html'
		) 
	);

	$wp_customize->add_control( 
		new Arouse_Custom_Content( 
			$wp_customize, 
			'arouse_pro_details', 
			array(
				'section' 		=> 'arouse_theme_info',
				'label' 		=> __( 'Arouse Pro Details', 'arouse' ),
				'content' 		=> __( '<a class="button" href="http://themezhut.com/themes/arouse-pro/" target="_blank">Arouse Pro Details.</a></p>', 'arouse' ) . '</p>',
			) 
		) 
	);		


	$wp_customize->add_setting( 
		'arouse_pro_demo_link', 
		array(
			'sanitize_callback'	=> 'arouse_sanitize_html'
		) 
	);

	$wp_customize->add_control( 
		new Arouse_Custom_Content( 
			$wp_customize, 
			'arouse_pro_demo_link', 
			array(
				'section' 		=> 'arouse_theme_info',
				'label' 		=> __( 'Arouse Pro Demo', 'arouse' ),
				'content' 		=> __( '<a class="button" href="http://themezhut.com/demo/arouse-pro/" target="_blank">Arouse Pro Demo.</a></p>', 'arouse' ) . '</p>',
			) 
		) 
	);

}
add_action( 'customize_register', 'arouse_customize_register' );


/**
 * Image sanitization.
 * 
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */

function arouse_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}


/**
 * Checkbox sanitization.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function arouse_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * HTML sanitization 
 *
 * @see wp_filter_post_kses() https://developer.wordpress.org/reference/functions/wp_filter_post_kses/
 *
 * @param string $html HTML to sanitize.
 * @return string Sanitized HTML.
 */
function arouse_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

/**
 * CSS sanitization.
 * 
 * @see wp_strip_all_tags() https://developer.wordpress.org/reference/functions/wp_strip_all_tags/
 *
 * @param string $css CSS to sanitize.
 * @return string Sanitized CSS.
 */
function arouse_sanitize_css( $css ) {
	return wp_strip_all_tags( $css );
}


/**
 * URL sanitization.
 * 
 * @see esc_url_raw() https://developer.wordpress.org/reference/functions/esc_url_raw/
 *
 * @param string $url URL to sanitize.
 * @return string Sanitized URL.
 */
function arouse_sanitize_url( $url ) {
	return esc_url_raw( $url );
}


/**
 * Category dropdown sanitization.
 *
 * @param int $catid to sanitize.
 * @return int $cat_id.
 */
function arouse_sanitize_category_dropdown( $catid ) {
	// Ensure $catid is an absolute integer.
	return $cat_id = absint( $catid );
	
}

/**
 * Select sanitization.
 *
 * - Sanitization: select
 * - Control: select, radio
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function arouse_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function arouse_customize_preview_js() {
	wp_enqueue_script( 'arouse_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'arouse_customize_preview_js' );


function arouse_featured_content_choice_callback( $control ) {
    $radio_setting = $control->manager->get_setting('featured_content_type')->value();
    $control_id = $control->id;

    for ( $i = 1; $i <= 3; $i++ ) {
    	if ( $control_id == 'featured_article_'. $i && $radio_setting == 'pages' ) return true;
    }
     
    if ( $control_id == 'display_page_titles'  && $radio_setting == 'pages' ) return true;
    if ( $control_id == 'display_fpost_titles'  && $radio_setting == 'posts' ) return true;
    if ( $control_id == 'fcontent_category' && $radio_setting == 'posts' ) return true;

    return false;
    
}

/**
 * Enqueue the customizer stylesheet.
 */
function arouse_enqueue_customizer_stylesheets() {

    wp_register_style( 'arouse-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'arouse-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'arouse_enqueue_customizer_stylesheets' );