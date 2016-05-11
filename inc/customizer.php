<?php
/**
 * App Landing Page Theme Customizer.
 *
 * @package App_Landing_Page
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function app_landing_page_customize_register( $wp_customize ) {
	
    /* Option list of all post */	
    $app_landing_page_options_posts = array();
    $app_landing_page_options_posts_obj = get_posts('posts_per_page=-1');
    $app_landing_page_options_posts[''] = __( 'Choose Post', 'app-landing-page' );
    foreach ( $app_landing_page_options_posts_obj as $app_landing_page_posts ) {
    	$app_landing_page_options_posts[$app_landing_page_posts->ID] = $app_landing_page_posts->post_title;
    }
    
    /* Option list of all categories */
    $app_landing_page_args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $app_landing_page_option_categories = array();
    $app_landing_page_category_lists = get_categories( $app_landing_page_args );
    $app_landing_page_option_categories[''] = __( 'Choose Category', 'app-landing-page' );
    foreach( $app_landing_page_category_lists as $app_landing_page_category ){
        $app_landing_page_option_categories[$app_landing_page_category->term_id] = $app_landing_page_category->name;
    }
    
    /** Default Settings */    
    $wp_customize->add_panel( 
        'wp_default_panel',
         array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Default Settings', 'app-landing-page' ),
            'description' => __( 'Default section provided by wordpress customizer.', 'app-landing-page' ),
        ) 
    );
    
    $wp_customize->get_section( 'title_tagline' )->panel     = 'wp_default_panel';
    $wp_customize->get_section( 'colors' )->panel            = 'wp_default_panel';
    $wp_customize->get_section( 'header_image' )->panel      = 'wp_default_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'wp_default_panel';
    $wp_customize->get_section( 'static_front_page' )->panel = 'wp_default_panel'; 
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    /** Default Settings Ends */
    
    /** Home Page Settings */
    $wp_customize->add_panel( 
        'app_landing_page_home_page_settings',
         array(
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'app-landing-page' ),
            'description' => __( 'Customize Home Page Settings', 'app-landing-page' ),
        ) 
    );
    
    /** Banner Section */
    $wp_customize->add_section(
        'app_landing_page_banner_settings',
        array(
            'title' => __( 'Banner Section', 'app-landing-page' ),
            'priority' => 10,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
        
    /** Enable/Disable Banner Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_banner_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_banner_section',
        array(
            'label' => __( 'Enable Banner Section', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'checkbox',
        )
    );
    

     /** Banner Section Title */
    $wp_customize->add_setting(
        'app_landing_page_banner_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_section_title',
        array(
            'label' => __( 'Banner Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Banner Section Content */
    $wp_customize->add_setting(
        'app_landing_page_banner_section_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_section_content',
        array(
            'label' => __( 'Banner Section Content', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'textarea',
        )
    );
    

    /** Button One Image */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_one',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_banner_button_one', 
           array(
               'label'      => __( 'Upload Button Logo One', 'app-landing-page' ),
               'section'    => 'app_landing_page_banner_settings',
               'width'       => 221,
               'height'      => 58,
           )
       )
    );
    
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_one_url',
        array(
            'default' => __( '#', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_one_url',
        array(
            'label' => __( 'Banner Button One Url', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );

    /** Button Two Image */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_two',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_banner_button_two',
           array(
               'label'      => __( 'Upload Logo Two', 'app-landing-page' ),
               'section'    => 'app_landing_page_banner_settings',
               'width'       => 221,
               'height'      => 58,
           )
       )
    );
    
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_two_url',
        array(
            'default' => __( '#', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_two_url',
        array(
            'label' => __( 'Banner Button Two Url', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );

    /** Button Text */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_text',
        array(
            'default' => __( 'Download Button', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_text',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_url',
        array(
            'default' => __( '#', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_url',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );

    /** Background Image */
    $wp_customize->add_setting(
        'app_landing_page_banner_section_bg',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_banner_section_bg',
           array(
               'label'      => __( 'Upload Background', 'app-landing-page' ),
               'section'    => 'app_landing_page_banner_settings'
           )
       )
    );
    /** Banner Section Ends */
    
    /** Featured Section */
    $wp_customize->add_section(
        'app_landing_page_featured_settings',
        array(
            'title' => __( 'Featured Section', 'app-landing-page' ),
            'priority' => 20,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Featured Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_featured_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_featured_section',
        array(
            'label' => __( 'Enable Featured Section', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Featured Section Title */
    $wp_customize->add_setting(
        'app_landing_page_featured_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_section_title',
        array(
            'label' => __( 'Featured Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );
    
    /** Logo One */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_one',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_featured_logo_one',
           array(
               'label'      => __( 'Upload Logo One', 'app-landing-page' ),
               'section'    => 'app_landing_page_featured_settings'
           )
       )
    );
    
    /** Logo One Url */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_one_url',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_logo_one_url',
        array(
            'label' => __( 'Logo One Url', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );
    
    /** Logo Two */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_two',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_featured_logo_two',
           array(
               'label'      => __( 'Upload Logo Two', 'app-landing-page' ),
               'section'    => 'app_landing_page_featured_settings'
           )
       )
    );
    
    /** Logo Two Url */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_two_url',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_logo_two_url',
        array(
            'label' => __( 'Logo Two Url', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );
    
    /** Logo Three */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_three',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_featured_logo_three',
           array(
               'label'      => __( 'Upload Logo Three', 'app-landing-page' ),
               'section'    => 'app_landing_page_featured_settings'
           )
       )
    );
    
    /** Logo Three Url */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_three_url',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_logo_three_url',
        array(
            'label' => __( 'Logo Three Url', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );
    
    /** Logo Four */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_four',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_featured_logo_four',
           array(
               'label'      => __( 'Upload Logo Four', 'app-landing-page' ),
               'section'    => 'app_landing_page_featured_settings'
           )
       )
    );
    
    /** Logo Four Url */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_four_url',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_logo_four_url',
        array(
            'label' => __( 'Logo Four Url', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );
    
    /** Logo Five */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_five',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_featured_logo_five',
           array(
               'label'      => __( 'Upload Logo Five', 'app-landing-page' ),
               'section'    => 'app_landing_page_featured_settings'
           )
       )
    );
    
    /** Logo Five Url */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_five_url',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_logo_five_url',
        array(
            'label' => __( 'Logo Five Url', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );

    /** Logo Six */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_six',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_featured_logo_six',
           array(
               'label'      => __( 'Upload Logo Six', 'app-landing-page' ),
               'section'    => 'app_landing_page_featured_settings'
           )
       )
    );
    
    /** Logo Six Url */
    $wp_customize->add_setting(
        'app_landing_page_featured_logo_six_url',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_logo_six_url',
        array(
            'label' => __( 'Logo Six Url', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );
    /** Client Section Ends */

    /** Features Section */
    $wp_customize->add_section(
        'app_landing_page_features_settings',
        array(
            'title' => __( 'Features Section', 'app-landing-page' ),
            'priority' => 30,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
        
    /** Enable/Disable Features Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_features_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_features_section',
        array(
            'label' => __( 'Enable features Section', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'checkbox',
        )
    );
      
    /** Features Section Title */
    $wp_customize->add_setting(
        'app_landing_page_features_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_section_title',
        array(
            'label' => __( 'Features Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features Section Content */
    $wp_customize->add_setting(
        'app_landing_page_features_section_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_section_content',
        array(
            'label' => __( 'Features Section Content', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'textarea',
        )
    );

    /** Upload a Main Image */
    $wp_customize->add_setting(
        'app_landing_page_features_section_image',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'app_landing_page_features_section_image',
           array(
               'label'      => __( 'Upload a Main Image ', 'app-landing-page' ),
               'section'    => 'app_landing_page_features_settings',
               'width'       => 300,
               'height'      => 468,
           )
       )
    );

    /** Features One Title */
    $wp_customize->add_setting(
        'app_landing_page_features_one_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_one_title',
        array(
            'label' => __( 'Features One Title', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features One Content */
    $wp_customize->add_setting(
        'app_landing_page_features_one_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_one_content',
        array(
            'label' => __( 'Features One Content', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'textarea',
        )
    );

    /** Features One favicon */
    $wp_customize->add_setting(
        'app_landing_page_features_one_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_one_fav',
        array(
            'label' => __( 'Features One Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features Two Title */
    $wp_customize->add_setting(
        'app_landing_page_features_two_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_two_title',
        array(
            'label' => __( 'Features Two Title', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features Two Content */
    $wp_customize->add_setting(
        'app_landing_page_features_two_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_two_content',
        array(
            'label' => __( 'Features Two Content', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'textarea',
        )
    );

    /** Features Two favicon */
    $wp_customize->add_setting(
        'app_landing_page_features_two_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_two_fav',
        array(
            'label' => __( 'Features Two Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );

    /** Features Three Title */
    $wp_customize->add_setting(
        'app_landing_page_features_three_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_three_title',
        array(
            'label' => __( 'Features Three Title', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features Three Content */
    $wp_customize->add_setting(
        'app_landing_page_features_three_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_three_content',
        array(
            'label' => __( 'Features Three Content', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'textarea',
        )
    );

    /** Features Three favicon */
    $wp_customize->add_setting(
        'app_landing_page_features_three_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_three_fav',
        array(
            'label' => __( 'Features Three Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );

    /** Features Four Title */
    $wp_customize->add_setting(
        'app_landing_page_features_four_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_four_title',
        array(
            'label' => __( 'Features Four Title', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features Four Content */
    $wp_customize->add_setting(
        'app_landing_page_features_four_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_four_content',
        array(
            'label' => __( 'Features Four Content', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'textarea',
        )
    );

    /** Features Four favicon */
    $wp_customize->add_setting(
        'app_landing_page_features_four_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_four_fav',
        array(
            'label' => __( 'Features Four Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );

    /** Features Five Title */
    $wp_customize->add_setting(
        'app_landing_page_features_five_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_five_title',
        array(
            'label' => __( 'Features Five Title', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features Five Content */
    $wp_customize->add_setting(
        'app_landing_page_features_five_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_five_content',
        array(
            'label' => __( 'Features Five Content', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'textarea',
        )
    );

    /** Features Five favicon */
    $wp_customize->add_setting(
        'app_landing_page_features_five_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_five_fav',
        array(
            'label' => __( 'Features Five Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    /** Features Six Title */
    $wp_customize->add_setting(
        'app_landing_page_features_six_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_six_title',
        array(
            'label' => __( 'Features Six Title', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );
    
    /** Features Six Content */
    $wp_customize->add_setting(
        'app_landing_page_features_six_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_six_content',
        array(
            'label' => __( 'Features Six Content', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'textarea',
        )
    );

    /** Features Six favicon */
    $wp_customize->add_setting(
        'app_landing_page_features_six_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_six_fav',
        array(
            'label' => __( 'Features Six Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'text',
        )
    );

    /** Features Section Ends */
    
    /** Video Section */
    $wp_customize->add_section(
        'app_landing_page_vedio_settings',
        array(
            'title' => __( 'Video Section', 'app-landing-page' ),
            'priority' => 40,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Video Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_vedio_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_vedio_section',
        array(
            'label' => __( 'Enable Video Section', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Video Section Title */
    $wp_customize->add_setting(
        'app_landing_page_vedio_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_section_title',
        array(
            'label' => __( 'Video Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'text',
        )
    );
    
    /** Video Section Content */
    $wp_customize->add_setting(
        'app_landing_page_vedio_section_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_section_content',
        array(
            'label' => __( 'Video Section Content', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'textarea',
        )
    );

    
    /**  Video Link */
    $wp_customize->add_setting(
        'app_landing_page_vedio_video',
        array(
            'default' => __( '', 'app-landing-page' ),
            'sanitize_callback' => 'wp_kses_stripslashes',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_video',
        array(
            'label' => __( 'Video Embed Link', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'text',
        )
    );

    /** Button Text */
    $wp_customize->add_setting(
        'app_landing_page_vedio_section_button',
        array(
            'default' => __( 'Download Button', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_section_button',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'text',
        )
    );
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_vedio_section_button_link',
        array(
            'default' => __( '#', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_section_button_link',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'text',
        )
    );
    
    /** Video Section Ends */

    /** Intro Section */
    $wp_customize->add_section(
        'app_landing_page_intro_settings',
        array(
            'title' => __( 'Intro Section', 'app-landing-page' ),
            'priority' => 50,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
        
    /** Enable/Disable Intro Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_intro_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_intro_section',
        array(
            'label' => __( 'Enable Intro Section', 'app-landing-page' ),
            'section' => 'app_landing_page_intro_settings',
            'type' => 'checkbox',
        )
    );
    
    
    /** Intro Section Title */
    $wp_customize->add_setting(
        'app_landing_page_intro_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_intro_section_title',
        array(
            'label' => __( 'Intro Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_intro_settings',
            'type' => 'text',
        )
    );
    
    /** Intro Section slogan */
    $wp_customize->add_setting(
        'app_landing_page_intro_section_slogan',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_intro_section_slogan',
        array(
            'label' => __( 'Intro Section Slogan', 'app-landing-page' ),
            'section' => 'app_landing_page_intro_settings',
            'type' => 'textarea',
        )
    );


    /** Intro Section Content */
    $wp_customize->add_setting(
        'app_landing_page_intro_section_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_intro_section_content',
        array(
            'label' => __( 'Intro Section Content', 'app-landing-page' ),
            'section' => 'app_landing_page_intro_settings',
            'type' => 'textarea',
        )
    );

    /** Upload a Image One */
    $wp_customize->add_setting(
        'app_landing_page_intro_one_image',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'app_landing_page_intro_one_image',
           array(
               'label'      => __( 'Upload a Image One', 'app-landing-page' ),
               'section'    => 'app_landing_page_intro_settings',
               'width'       => 300,
               'height'      => 468,
           )
       )
    );


    /** Intro Section Ends */

     /** Service Section */
    $wp_customize->add_section(
        'app_landing_page_service_settings',
        array(
            'title' => __( 'Service Section', 'app-landing-page' ),
            'priority' => 60,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Service Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_service_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_service_section',
        array(
            'label' => __( 'Enable Service Section', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'checkbox',
        )
    );

    /** Service Section Title */
    $wp_customize->add_setting(
        'app_landing_page_service_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_title',
        array(
            'label' => __( 'Service Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Section Content */
    $wp_customize->add_setting(
        'app_landing_page_service_section_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_content',
        array(
            'label' => __( 'Service Section Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

   /** Service One Title */
    $wp_customize->add_setting(
        'app_landing_page_service_one_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_one_title',
        array(
            'label' => __( 'Service One Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service One Content */
    $wp_customize->add_setting(
        'app_landing_page_service_one_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_one_content',
        array(
            'label' => __( 'Service One Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service One favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_one_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_one_fav',
        array(
            'label' => __( 'Service One Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Two Title */
    $wp_customize->add_setting(
        'app_landing_page_service_two_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_two_title',
        array(
            'label' => __( 'Service Two Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Two Content */
    $wp_customize->add_setting(
        'app_landing_page_service_two_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_two_content',
        array(
            'label' => __( 'Service Two Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service Two favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_two_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_two_fav',
        array(
            'label' => __( 'Service Two Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );

       /** Service Three Title */
    $wp_customize->add_setting(
        'app_landing_page_service_three_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_three_title',
        array(
            'label' => __( 'Service Three Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Three Content */
    $wp_customize->add_setting(
        'app_landing_page_service_three_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_three_content',
        array(
            'label' => __( 'Service Three Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service Three favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_three_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_three_fav',
        array(
            'label' => __( 'Service Three Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );

    /** Service Four Title */
    $wp_customize->add_setting(
        'app_landing_page_service_four_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_four_title',
        array(
            'label' => __( 'Service Four Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Four Content */
    $wp_customize->add_setting(
        'app_landing_page_service_four_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_four_content',
        array(
            'label' => __( 'Service Four Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service Four favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_four_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_four_fav',
        array(
            'label' => __( 'Service Four Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );

    /** Service Five Title */
    $wp_customize->add_setting(
        'app_landing_page_service_five_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_five_title',
        array(
            'label' => __( 'Service Five Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Five Content */
    $wp_customize->add_setting(
        'app_landing_page_service_five_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_five_content',
        array(
            'label' => __( 'Service Five Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service Five favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_five_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_five_fav',
        array(
            'label' => __( 'Service Five Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
       
    /** Service Six Title */
    $wp_customize->add_setting(
        'app_landing_page_service_six_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_six_title',
        array(
            'label' => __( 'Service Six Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Six Content */
    $wp_customize->add_setting(
        'app_landing_page_service_six_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_six_content',
        array(
            'label' => __( 'Service Six Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service Six favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_six_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_six_fav',
        array(
            'label' => __( 'Service Six Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Seven Title */
    $wp_customize->add_setting(
        'app_landing_page_service_seven_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_seven_title',
        array(
            'label' => __( 'Service Seven Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Seven Content */
    $wp_customize->add_setting(
        'app_landing_page_service_seven_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_seven_content',
        array(
            'label' => __( 'Service Seven Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service Seven favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_seven_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_seven_fav',
        array(
            'label' => __( 'Service Seven Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );


    /** Service Eight Title */
    $wp_customize->add_setting(
        'app_landing_page_service_eight_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_eight_title',
        array(
            'label' => __( 'Service Eight Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Service Eight Content */
    $wp_customize->add_setting(
        'app_landing_page_service_eight_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_eight_content',
        array(
            'label' => __( 'Service Eight Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );

    /** Service Eight favicon */
    $wp_customize->add_setting(
        'app_landing_page_service_eight_fav',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_eight_fav',
        array(
            'label' => __( 'Service Eight Favicon', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );

     /** Button Text */
    $wp_customize->add_setting(
        'app_landing_page_service_section_button',
        array(
            'default' => __( 'Download Button', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_button',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_service_section_button_link',
        array(
            'default' => __( '#', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_button_link',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    /** Service Section Ends */

    /** Social Counter Section */
    $wp_customize->add_section(
        'app_landing_page_social_settings',
        array(
            'title' => __( 'Social Section', 'app-landing-page' ),
            'priority' => 80,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Social Counter Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_social_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_social_section',
        array(
            'label' => __( 'Enable Social Counter Section', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'checkbox',
        )
    );
     /** Social Counter Title */
    $wp_customize->add_setting(
        'app_landing_page_social_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_social_title',
        array(
            'label' => __( 'Social Title', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'text',
        )
    );
    
    /** Social Counter Content */
    $wp_customize->add_setting(
        'app_landing_page_social_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_social_content',
        array(
            'label' => __( 'Social Content', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'textarea',
        )
    );
    
    /** social section Ends **/
    
    /** Stat Counter Section */
    $wp_customize->add_section(
        'app_landing_page_stats_settings',
        array(
            'title' => __( 'Stat Counter Section', 'app-landing-page' ),
            'priority' => 70,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Stat Counter Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_stats_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_stats_section',
        array(
            'label' => __( 'Enable Stat Counter Section', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'checkbox',
        )
    );
     /** Stats Counter Title */
    $wp_customize->add_setting(
        'app_landing_page_stats_title',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_stats_title',
        array(
            'label' => __( 'Service Eight Title', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'text',
        )
    );
    
    /** Stats Counter Content */
    $wp_customize->add_setting(
        'app_landing_page_stats_content',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_html',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_stats_content',
        array(
            'label' => __( 'Service Eight Content', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'textarea',
        )
    );
       

    /** Stats Counter Date*/
    $wp_customize->add_setting(
        'app_landing_page_date',
        array(
            'default' => 'yyyy/mm/dd',
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_date',
        array(
            'label' => __( 'Stat Counter Date', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'text',
        )
    );
    

    /** Button Text */
    $wp_customize->add_setting(
        'app_landing_page_stats_button',
        array(
            'default' => __( 'Download Button', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_stats_button',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'text',
        )
    );
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_stats_button_link',
        array(
            'default' => __( '#', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_stats_button_link',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'text',
        )
    );


    /** Background Image */
    $wp_customize->add_setting(
        'app_landing_page_stats_section_bg',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_stats_section_bg', 
           array(
               'label'      => __( 'Upload Button Logo One', 'app-landing-page' ),
               'section'    => 'app_landing_page_stats_settings',
           )
       )
    );

    /** Stat Section Ends */
    
    /** Home Page Settings Ends */
    
    /** BreadCrumb Settings */
    $wp_customize->add_section(
        'app_landing_page_breadcrumb_settings',
        array(
            'title' => __( 'Breadcrumb Settings', 'app-landing-page' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'app_landing_page_ed_breadcrumb',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_breadcrumb',
        array(
            'label' => __( 'Enable Breadcrumb', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Show/Hide Current */
    $wp_customize->add_setting(
        'app_landing_page_ed_current',
        array(
            'default' => '1',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_current',
        array(
            'label' => __( 'Show current', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Home Text */
    $wp_customize->add_setting(
        'app_landing_page_breadcrumb_home_text',
        array(
            'default' => __( 'Home', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_breadcrumb_home_text',
        array(
            'label' => __( 'Breadcrumb Home Text', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'text',
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'app_landing_page_breadcrumb_separator',
        array(
            'default' => __( '>', 'app-landing-page' ),
            'sanitize_callback' => 'app_landing_page_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_breadcrumb_separator',
        array(
            'label' => __( 'Breadcrumb Separator', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'text',
        )
    );
    /** BreadCrumb Settings Ends */
    
    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
     */
     function app_landing_page_sanitize_checkbox( $checked ){
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
     }
     
     function app_landing_page_sanitize_nohtml( $nohtml ){
        return wp_filter_nohtml_kses( $nohtml );
     }
     
     function app_landing_page_sanitize_html( $html ){
        return wp_filter_post_kses( $html );
     }
     
     function app_landing_page_sanitize_select( $input, $setting ){
        // Ensure input is a slug.
    	$input = sanitize_key( $input );
    	
    	// Get list of choices from the control associated with the setting.
    	$choices = $setting->manager->get_control( $setting->id )->choices;
    	
    	// If the input is a valid key, return it; otherwise, return the default.
    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
     }
     
     function app_landing_page_sanitize_url( $url ){
        return esc_url_raw( $url );
     }
     
     function app_landing_page_sanitize_number_absint( $number, $setting ) {
    	// Ensure $number is an absolute integer (whole number, zero or greater).
    	$number = absint( $number );
    	
    	// If the input is an absolute integer, return it; otherwise, return the default
    	return ( $number ? $number : $setting->default );
     }
     
     function app_landing_page_sanitize_image( $image, $setting ) {
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
}
add_action( 'customize_register', 'app_landing_page_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function app_landing_page_customize_preview_js() {
	wp_enqueue_script( 'app_landing_page_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'app_landing_page_customize_preview_js' );


