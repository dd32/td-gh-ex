<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_topshop_options() {

	// Theme defaults
	$primary_color = '#29a6e5';
	$secondary_color = '#266ee4';
    
    $body_font_color = '#4F4F4F';
    $heading_font_color = '#5E5E5E';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Logo
	$section = 'kra-favicon';
    
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Favicon', 'topshop' ),
		'priority' => '10',
		'description' => __( 'Add a favicon to your website', 'topshop' )
	);
    
	$options['kra-header-favicon'] = array(
		'id' => 'kra-header-favicon',
		'label'   => __( 'Favicon', 'topshop' ),
		'section' => $section,
		'type'    => 'image',
		'default' => '',
	);
    
    
    // Layout Settings
    $section = 'kra-layout';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Layout Options', 'topshop' ),
        'priority' => '30'
    );
    
    // Upsell Button One
    $options['kra-upsell-one'] = array(
        'id' => 'kra-upsell-one',
        'label'   => __( 'Site Layout', 'topshop' ),
        'section' => $section,
        'type'    => 'upsell',
    );
    
    // Upsell Button Two
    $options['kra-upsell-two'] = array(
        'id' => 'kra-upsell-two',
        'label'   => __( 'Header Layout', 'topshop' ),
        'section' => $section,
        'type'    => 'upsell',
    );
    
    $options['kra-header-search'] = array(
        'id' => 'kra-header-search',
        'label'   => __( 'Show Search', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Enable to a slogan for your site. This uses the site Tagline', 'topshop' ),
        'default' => 1,
    );
    $options['kra-sticky-header'] = array(
        'id' => 'kra-sticky-header',
        'label'   => __( 'Sticky Header', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Select this box to make the main navigation sticky', 'topshop' ),
        'default' => 0,
    );
    $options['kra-show-header-top-bar'] = array(
        'id' => 'kra-show-header-top-bar',
        'label'   => __( 'Show Top Bar', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'This will show/hide the top bar in the header', 'topshop' ),
        'default' => 1,
    );
    
    
    // Blog Settings
    $section = 'kra-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider Options', 'topshop' ),
        'priority' => '35'
    );
    
    $choices = array(
        'kra-slider-default' => 'Default Slider',
        'kra-meta-slider' => 'Meta Slider',
        'kra-no-slider' => 'None'
    );
    $options['kra-slider-type'] = array(
        'id' => 'kra-slider-type',
        'label'   => __( 'Choose a Slider', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'kra-slider-default'
    );
    $options['kra-slider-cats'] = array(
        'id' => 'kra-slider-cats',
        'label'   => __( 'Slider Categories', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you want to display in the slider. Eg: "13,17,19" (no spaces and only comma\'s)', 'topshop' )
    );
    $options['kra-meta-slider-shortcode'] = array(
        'id' => 'kra-meta-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the shortcode give by meta slider.', 'topshop' )
    );


	// Colors
	$section = 'kra-styling';
    $font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Styling Options', 'topshop' ),
		'priority' => '38'
	);

	$options['kra-main-color'] = array(
		'id' => 'kra-main-color',
		'label'   => __( 'Main Color', 'topshop' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);
	$options['kra-main-color-hover'] = array(
		'id' => 'kra-main-color-hover',
		'label'   => __( 'Secondary Color', 'topshop' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);
    
    $options['kra-body-font'] = array(
        'id' => 'kra-body-font',
        'label'   => __( 'Body Font', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Open Sans'
    );
    $options['kra-body-font-color'] = array(
        'id' => 'kra-body-font-color',
        'label'   => __( 'Body Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    $options['kra-heading-font'] = array(
        'id' => 'kra-heading-font',
        'label'   => __( 'Headings Font', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Raleway'
    );
    $options['kra-heading-font-color'] = array(
        'id' => 'kra-heading-font-color',
        'label'   => __( 'Heading Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    
    $options['kra-custom-css'] = array(
        'id' => 'kra-custom-css',
        'label'   => __( 'Custom CSS', 'topshop' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( '', 'topshop'),
        'description' => __( 'Add custom CSS to your theme', 'topshop' )
    );
    
    
    // Blog Settings
    $section = 'kra-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog Options', 'topshop' ),
        'priority' => '50'
    );
    
    // Upsell Button Three
    $options['kra-upsell-three'] = array(
        'id' => 'kra-upsell-three',
        'label'   => __( 'Blog Post Layout', 'topshop' ),
        'section' => $section,
        'type'    => 'upsell',
    );
    $options['kra-blog-title'] = array(
        'id' => 'kra-blog-title',
        'label'   => __( 'Blog Page Title', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Blog'
    );
    $options['kra-blog-cats'] = array(
        'id' => 'kra-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.', 'topshop' )
    );
    
    
    // Social Settings
    $section = 'kra-social';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'topshop' ),
        'priority' => '80'
    );
    
    // Upsell Button Four
    $options['kra-upsell-four'] = array(
        'id' => 'kra-upsell-four',
        'label'   => __( 'Add Social Links', 'topshop' ),
        'section' => $section,
        'type'    => 'upsell',
    );
    
    
    // Site Text Settings
    $section = 'kra-website';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'topshop' ),
        'priority' => '50'
    );
    
    $options['kra-header-info-text'] = array(
        'id' => 'kra-header-info-text',
        'label'   => __( 'Header Info Text', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Call Us: 082 444 BOOM', 'topshop'),
        'description' => __( 'This is the text in the header', 'topshop' )
    );
    // Upsell Button Five
    $options['kra-upsell-five'] = array(
        'id' => 'kra-upsell-five',
        'label'   => __( 'Site Copy Text', 'topshop' ),
        'section' => $section,
        'type'    => 'upsell',
    );
    $options['kra-website-error-head'] = array(
        'id' => 'kra-website-error-head',
        'label'   => __( '404 Error Page Heading', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'topshop'),
        'description' => __( 'Enter the heading for the 404 Error page', 'topshop' )
    );
    $options['kra-website-error-msg'] = array(
        'id' => 'kra-website-error-msg',
        'label'   => __( 'Error 404 Message', 'topshop' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'topshop'),
        'description' => __( 'Enter the default text on the 404 error page (Page not found)', 'topshop' )
    );
    $options['kra-website-nosearch-msg'] = array(
        'id' => 'kra-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'topshop' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'topshop'),
        'description' => __( 'Enter the default text for when no search results are found', 'topshop' )
    );

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_topshop_options' );
