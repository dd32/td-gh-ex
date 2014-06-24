<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/customizer-functions.php' );

// Add Theme Options section to Customizer
add_action( 'customize_register', 'airballoon_customize_register_options' );

function airballoon_customize_register_options( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'airballoon_section_options', array(
        'title'    => __( 'Theme Options', 'airballoon-lite' ),
        'priority' => 180
		)
	);
	$wp_customize->add_section( 'airballoon_section_upgrade', array(
        'title'    => __( 'PRO Version', 'airballoon-lite' ),
        'priority' => 190
		)
	);

	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'airballoon_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'airballoon_control_layout', array(
        'label'    => __( 'Theme Layout', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'airballoon-lite' ),
            'right-sidebar' => __( 'Right Sidebar', 'airballoon-lite' ),
			'fullwidth' => __( 'Fullwidth (No Sidebar)', 'airballoon-lite' ),
			)
		)
	);

	// Add Header Content Header
	$wp_customize->add_setting( 'airballoon_theme_options[header_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Air_Balloon_Customize_Header_Control(
        $wp_customize, 'airballoon_control_header_content', array(
            'label' => __( 'Header Content', 'airballoon-lite' ),
            'section' => 'airballoon_section_options',
            'settings' => 'airballoon_theme_options[header_content]',
            'priority' => 	3
            )
        )
    );
	$wp_customize->add_setting( 'airballoon_theme_options[header_content_description]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Air_Balloon_Customize_Description_Control(
        $wp_customize, 'airballoon_control_header_content_description', array(
            'label' =>  __( 'The Header Content configured below will be displayed on the right hand side of the header area.', 'airballoon-lite' ),
            'section' => 'airballoon_section_options',
            'settings' => 'airballoon_theme_options[header_content_description]',
            'priority' => 	4,
			'description' =>  __( 'Stay hungry. Stay foolish.', 'airballoon-lite' )
            )
        )
    );

	// Add Settings and Controls for Header
	$wp_customize->add_setting( 'airballoon_theme_options[header_tagline]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_header_tagline', array(
        'label'    => __( 'Display Tagline on header area.', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 5
		)
	);

	$wp_customize->add_setting( 'airballoon_theme_options[header_search]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_header_search', array(
        'label'    => __( 'Display search field on header area', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[header_search]',
        'type'     => 'checkbox',
		'priority' => 6
		)
	);

	$wp_customize->add_setting( 'airballoon_theme_options[header_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_header_icons', array(
        'label'    => __( 'Display Social Icons on header area', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[header_icons]',
        'type'     => 'checkbox',
		'priority' => 7
		)
	);

	// Add Settings and Controls for Posts
	$wp_customize->add_setting( 'airballoon_theme_options[posts_length]', array(
        'default'           => 'index',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_post_length'
		)
	);
    $wp_customize->add_control( 'airballoon_control_posts_length', array(
        'label'    => __( 'Post Length on archives', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[posts_length]',
        'type'     => 'radio',
		'priority' => 8,
        'choices'  => array(
            'index' => __( 'Show full posts', 'airballoon-lite' ),
            'excerpt' => __( 'Show post summaries (excerpt)', 'airballoon-lite' )
			)
		)
	);

	$wp_customize->add_setting( 'airballoon_theme_options[post_thumbnails_index]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_posts_thumbnails_index', array(
        'label'    => __( 'Display featured images on archive pages', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[post_thumbnails_index]',
        'type'     => 'checkbox',
		'priority' => 9
		)
	);

	$wp_customize->add_setting( 'airballoon_theme_options[post_thumbnails_single]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_posts_thumbnails_single', array(
        'label'    => __( 'Display featured images on single posts', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[post_thumbnails_single]',
        'type'     => 'checkbox',
		'priority' => 10
		)
	);
	
	$wp_customize->add_setting( 'airballoon_theme_options[credit_link]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_credit_link', array(
        'label'    => __( 'Display Credit Link to ThemeZee on footer line.', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[credit_link]',
        'type'     => 'checkbox',
		'priority' => 11
		)
	);
	
	
	// Add settings and controls for Front Page Template
	$wp_customize->add_setting( 'airballoon_theme_options[slider_activated_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Air_Balloon_Customize_Header_Control(
        $wp_customize, 'airballoon_control_slider_activated_label', array(
            'label' => __( 'Enable Front Page Slider', 'airballoon-lite' ),
            'section' => 'airballoon_section_options',
            'settings' => 'airballoon_theme_options[slider_activated_label]',
            'priority' => 12
            )
        )
    );
	$wp_customize->add_setting( 'airballoon_theme_options[slider_activated]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_slider_activated', array(
        'label'    => __( 'Display Slider on Business Front Page template.', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[slider_activated]',
        'type'     => 'checkbox',
		'priority' => 13
		)
	);

	$wp_customize->add_setting( 'airballoon_theme_options[slider_animation]', array(
        'default'           => 'horizontal',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_slider_animation'
		)
	);
    $wp_customize->add_control( 'airballoon_control_slider_animation', array(
        'label'    => __( 'Slider Animation', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[slider_animation]',
        'type'     => 'radio',
		'priority' => 14,
        'choices'  => array(
            'horizontal' => __( 'Horizontal Slider', 'airballoon-lite' ),
            'fade' => __( 'Fade Slider', 'airballoon-lite' )
			)
		)
	);
	
	$wp_customize->add_setting( 'airballoon_theme_options[front_page_content_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Air_Balloon_Customize_Header_Control(
        $wp_customize, 'airballoon_control_front_page_content_label', array(
            'label' => __( 'Front Page Content', 'airballoon-lite' ),
            'section' => 'airballoon_section_options',
            'settings' => 'airballoon_theme_options[front_page_content_label]',
            'priority' => 15
            )
        )
    );
	$wp_customize->add_setting( 'airballoon_theme_options[front_page_default_content]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_front_page_default_content', array(
        'label'    => __( 'Display normal page content on the front page template.', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[front_page_default_content]',
        'type'     => 'checkbox',
		'priority' => 16
		)
	);
	$wp_customize->add_setting( 'airballoon_theme_options[front_page_posts]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'airballoon_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'airballoon_control_front_page_posts', array(
        'label'    => __( 'Display latest three posts on front page template.', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[front_page_posts]',
        'type'     => 'checkbox',
		'priority' => 17
		)
	);
	$wp_customize->add_setting( 'airballoon_theme_options[front_page_posts_title]', array(
        'default'           => __( 'Latest News', 'airballoon-lite' ),
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
		)
	);
    $wp_customize->add_control( 'airballoon_control_front_page_posts_title', array(
        'label'    => __( 'Front Page Posts Title', 'airballoon-lite' ),
        'section'  => 'airballoon_section_options',
        'settings' => 'airballoon_theme_options[front_page_posts_title]',
        'type'     => 'text',
		'priority' => 18
		)
	);
	
	// Add PRO Version Section
	$wp_customize->add_setting( 'airballoon_theme_options[pro_version_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Air_Balloon_Customize_Header_Control(
        $wp_customize, 'airballoon_control_pro_version_label', array(
            'label' => __( 'Need more features?', 'airballoon-lite' ),
            'section' => 'airballoon_section_upgrade',
            'settings' => 'airballoon_theme_options[pro_version_label]',
            'priority' => 	1
            )
        )
    );
	$wp_customize->add_setting( 'airballoon_theme_options[pro_version]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Air_Balloon_Customize_Text_Control(
        $wp_customize, 'airballoon_control_pro_version', array(
            'label' =>  __( 'Check out the PRO version which comes with additional features and advanced customization options.', 'airballoon-lite' ),
            'section' => 'airballoon_section_upgrade',
            'settings' => 'airballoon_theme_options[pro_version]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'airballoon_theme_options[pro_version_button]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Air_Balloon_Customize_Button_Control(
        $wp_customize, 'airballoon_control_pro_version_button', array(
            'label' => __('Learn more about the PRO Version', 'airballoon-lite'),
			'section' => 'airballoon_section_upgrade',
            'settings' => 'airballoon_theme_options[pro_version_button]',
            'priority' => 	3
            )
        )
    );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = 'Background';
	
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'airballoon_customize_preview_js' );

function airballoon_customize_preview_js() {
	wp_enqueue_script( 'airballoon-lite-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140312', true );
}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'airballoon_customize_preview_css' );

function airballoon_customize_preview_css() {
	wp_enqueue_style( 'airballoon-lite-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20140312' );

}


?>