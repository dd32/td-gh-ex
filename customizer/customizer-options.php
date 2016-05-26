<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Conica
 */

function customizer_library_conica_options() {
	
	$primary_color = '#b53434';
	$secondary_color = '#c54513';
	
	$body_font_color = '#3C3C3C';
	$heading_font_color = '#000000';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
    
	
	// Site Layout Options
	$section = 'conica-site-layout-section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Layout Options', 'conica' ),
		'priority' => '30',
		'description' => __( '', 'conica' )
	);
	
    $choices = array(
        'conica-site-boxed' => 'Boxed Layout',
        'conica-site-full-width' => 'Full Width Layout'
    );
    $options['conica-site-layout'] = array(
        'id' => 'conica-site-layout',
        'label'   => __( 'Site Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-site-full-width',
        'description' => __( '', 'conica' )
    );
	
    // Upsell Button
    $options['conica-upsell-layout-one'] = array(
        'id' => 'conica-upsell-layout-one',
        'label'   => __( 'WooCommerce Shop Full Width', 'conica' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade for only <b>$25</b><br /><br />Upgrade to enable extra layout and WooCommerce settings.<br /><br />Set WooCommerce Shop page to full width and select between 2 different shop layout sizes.', 'conica' )
    );
	
	
	// Header Layout Options
	$section = 'conica-header-section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header Options', 'conica' ),
		'priority' => '30',
		'description' => __( '', 'conica' )
	);
	
	$options['conica-header-remove-topbar'] = array(
		'id' => 'conica-header-remove-topbar',
		'label'   => __( 'Remove the Top Bar', 'conica' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);
    
	$options['conica-header-menu-text'] = array(
		'id' => 'conica-header-menu-text',
		'label'   => __( 'Menu Button Text', 'conica' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'menu',
		'description' => __( 'This is the text for the mobile menu button', 'conica' )
	);
	
	$options['conica-header-search'] = array(
        'id' => 'conica-header-search',
        'label'   => __( 'Hide Search', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Select this box to hide the site search', 'conica' ),
        'default' => 0,
    );
    
    // Upsell Button
    $options['conica-upsell-header-one'] = array(
        'id' => 'conica-upsell-header-one',
        'label'   => __( 'Sticky Header', 'conica' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade for only <b>$25</b><br /><br />Upgrade to enable the option to have a sticky header', 'conica' )
    );
    
    
    // Slider Settings
    $section = 'conica-slider-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider Options', 'conica' ),
        'priority' => '35'
    );
    
    $choices = array(
        'conica-slider-default' => 'Default Slider',
        'conica-meta-slider' => 'Meta Slider',
        'conica-no-slider' => 'None'
    );
    $options['conica-slider-type'] = array(
        'id' => 'conica-slider-type',
        'label'   => __( 'Choose a Slider', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-slider-default'
    );
    $options['conica-slider-bg-color'] = array(
        'id' => 'conica-slider-bg-color',
        'label'   => __( 'Slider BG Color', 'conica' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    $options['conica-slider-cats'] = array(
        'id' => 'conica-slider-cats',
        'label'   => __( 'Slider Categories', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you want to display in the slider. Eg: "13,17,19" (no spaces and only comma\'s)<br /><a href="http://kairaweb.com/support/topic/setting-up-the-default-slider/" target="_blank"><b>Follow instructions here</b></a>', 'conica' )
    );
    $options['conica-meta-slider-shortcode'] = array(
        'id' => 'conica-meta-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the shortcode give by meta slider.', 'conica' )
    );
	
    // Upsell Button
    $options['conica-upsell-slider-one'] = array(
        'id' => 'conica-upsell-slider-one',
        'label'   => __( 'Sticky Header', 'conica' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade for only <b>$25</b><br /><br />Upgrade to enable extra slider settings', 'conica' )
    );


	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'conica' ),
		'priority' => '80'
	);

	$options['conica-primary-color'] = array(
		'id' => 'conica-primary-color',
		'label'   => __( 'Primary Color', 'conica' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['conica-secondary-color'] = array(
		'id' => 'conica-secondary-color',
		'label'   => __( 'Secondary Color', 'conica' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	// Font Options
	$section = 'conica-typography-section';
	$font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Font Options', 'conica' ),
		'priority' => '80'
	);

	$options['conica-body-font'] = array(
		'id' => 'conica-body-font',
		'label'   => __( 'Body Font', 'conica' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);
	$options['conica-body-font-color'] = array(
		'id' => 'conica-body-font-color',
		'label'   => __( 'Body Font Color', 'conica' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $body_font_color,
	);

	$options['conica-heading-font'] = array(
		'id' => 'conica-heading-font',
		'label'   => __( 'Heading Font', 'conica' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Lato'
	);
	$options['conica-heading-font-color'] = array(
		'id' => 'conica-heading-font-color',
		'label'   => __( 'Heading Font Color', 'conica' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $heading_font_color,
	);
	
	
	// Blog Settings
    $section = 'conica-blog-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog Options', 'conica' ),
        'priority' => '50'
    );
    
    $options['conica-blog-title'] = array(
        'id' => 'conica-blog-title',
        'label'   => __( 'Blog Page Title', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Blog'
    );
    $options['conica-blog-cats'] = array(
        'id' => 'conica-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.', 'conica' )
    );
    
    // Upsell Button
    $options['conica-upsell-blog-one'] = array(
        'id' => 'conica-upsell-blog-one',
        'label'   => __( 'Extra Blog Options', 'conica' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade for only <b>$25</b><br /><br />Upgrade to select another blog grid layout and/or make the blog pages full width', 'conica' )
    );
	
	
	// Footer Settings
    $section = 'conica-footer-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer Layout Options', 'conica' ),
        'priority' => '85'
    );
    
    $choices = array(
        'conica-footer-layout-standard' => 'Standard Layout',
        'conica-footer-layout-none' => 'None'
    );
    $options['conica-footer-layout'] = array(
        'id' => 'conica-footer-layout',
        'label'   => __( 'Footer Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-footer-layout-standard'
    );
    
    $options['conica-footer-bottombar'] = array(
        'id' => 'conica-footer-bottombar',
        'label'   => __( 'Remove the Bottom Bar', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Click this to hide the bottom bar of the footer', 'conica' ),
        'default' => 0,
    );
    $options['conica-footer-hide-social'] = array(
        'id' => 'conica-footer-hide-social',
        'label'   => __( 'Hide Social Links', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Hide the social links in the footer', 'conica' ),
        'default' => 0,
    );
    
    // Upsell Button
    $options['conica-upsell-footer-one'] = array(
        'id' => 'conica-upsell-footer-one',
        'label'   => __( 'Footer Options', 'conica' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade for only <b>$25</b><br /><br />Upgrade to select another footer social layout', 'conica' )
    );
	
	
	// Site Text Settings
    $section = 'conica-website-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'conica' ),
        'priority' => '50'
    );
    
    $options['conica-website-error-head'] = array(
        'id' => 'conica-website-error-head',
        'label'   => __( '404 Error Page Heading', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'conica'),
        'description' => __( 'Enter the heading for the 404 Error page', 'conica' )
    );
    $options['conica-website-error-msg'] = array(
        'id' => 'conica-website-error-msg',
        'label'   => __( 'Error 404 Message', 'conica' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'conica'),
        'description' => __( 'Enter the default text on the 404 error page (Page not found)', 'conica' )
    );
    $options['conica-website-nosearch-msg'] = array(
        'id' => 'conica-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'conica' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'conica'),
        'description' => __( 'Enter the default text for when no search results are found', 'conica' )
    );
    
    // Upsell Button
    $options['conica-upsell-website-one'] = array(
        'id' => 'conica-upsell-website-one',
        'label'   => __( 'Site Copy Text', 'conica' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade for only <b>$25</b><br /><br />Upgrade to change the Site Copyright text to your own.', 'conica' )
    );
	
	
	// Social Settings
    $section = 'conica-social-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'conica' ),
        'priority' => '80'
    );
    
    $options['conica-social-email'] = array(
        'id' => 'conica-social-email',
        'label'   => __( 'Email Address', 'conica' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['conica-social-skype'] = array(
        'id' => 'conica-social-skype',
        'label'   => __( 'Skype Name', 'conica' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['conica-social-facebook'] = array(
        'id' => 'conica-social-facebook',
        'label'   => __( 'Facebook', 'conica' ),
        'section' => $section,
        'type'    => 'text',
    );
    
    // Upsell Button
    $options['conica-upsell-social-one'] = array(
        'id' => 'conica-upsell-social-one',
        'label'   => __( 'Extra Social Links', 'conica' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade for only <b>$25</b><br /><br />Upgrade to add extra social profile links', 'conica' )
    );
	

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_conica_options' );
