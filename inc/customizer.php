<?php
/**
 * aquaparallax Theme Customizer.
 *
 * @package aquaparallax
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aquaparallax_customize_register( $wp_customize ) {  

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';   
 
//Header section
$wp_customize->add_section(
        'aquaparallax_header_section',
        array(
            'title' => esc_html( 'Search Section', 'aquaparallax' ),
            'description' => esc_html( 'Search section', 'aquaparallax' ),
            'priority' => 33,
        )
    );
    
    // Search box
    $wp_customize->add_setting('aquaparallax_search_box', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );
    $wp_customize->add_control(
    'aquaparallax_search_box',
    array(
        'type' => 'checkbox',
        'label' => esc_html( 'Include search box', 'aquaparallax' ),
        'section' => 'aquaparallax_header_section',
    )
    );  


// Blog section
$wp_customize->add_section(
        'aquaparallax_blog_section',
        array(
            'title' => esc_html( 'Enable Blog and Portfolio', 'aquaparallax' ),
            'description' => esc_html( 'Blog and Portfolio section.', 'aquaparallax' ),
            'priority' => 37,
        )
    );
    // Blog section
    $wp_customize->add_setting('aquaparallax_blogpost_section', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );
    $wp_customize->add_control(
    'aquaparallax_blogpost_section',
    array(
        'type' => 'checkbox',
        'label' => esc_html( 'Include blog section', 'aquaparallax' ),
        'section' => 'aquaparallax_blog_section',
    )
    );  
    // Portfolio section  
    $wp_customize->add_setting('aquaparallax_portfolio_section', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );
    $wp_customize->add_control(
    'aquaparallax_portfolio_section',
    array(
        'type' => 'checkbox',
        'label' => esc_html( 'Include portfolio section', 'aquaparallax' ),
        'section' => 'aquaparallax_blog_section',
    )
    );

// Social icon section
$wp_customize->add_section(
        'aquaparallax_social_section',
        array(
            'title' => esc_html( 'Social icon section', 'aquaparallax' ),
            'description' => esc_html( 'Social section.', 'aquaparallax' ),
            'priority' => 46,
        )
    );
    /* Facebook icon*/
    $wp_customize->add_setting('aquaparallax_facebook_icon', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'aquaparallax_facebook_icon',
        array(
            'type' => 'checkbox',
            'label' => 'Include facebook icon',
            'section' => 'aquaparallax_social_section',
        )
    );

     /* Facebook link setting */

    $wp_customize->add_setting( 'aquaparallax_facebook_link', array(
        'sanitize_callback' => 'aquaparallax_sanitize_url'
    ) );
    $wp_customize->add_control(

             'aquaparallax_facebook_link', array(
                'label'    => esc_html( 'Facebook Link:', 'aquaparallax' ),
                'section'  => 'aquaparallax_social_section',
                'settings' => 'aquaparallax_facebook_link',
                'type' => 'text',

            )
    );
    
    /* Twitter icon */
    $wp_customize->add_setting('aquaparallax_twitter_icon', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );
    $wp_customize->add_control(
        'aquaparallax_twitter_icon',
        array(
            'type' => 'checkbox',
            'label' => 'Include twitter icon',
            'section' => 'aquaparallax_social_section',
        )
    );
   /* Twitter link setting */
    $wp_customize->add_setting( 'aquaparallax_twitter_link', array(
        'sanitize_callback' => 'aquaparallax_sanitize_url'
    ) );
    $wp_customize->add_control(

             'aquaparallax_twitter_link', array(
                'label'    => esc_html( 'Twitter Link:', 'aquaparallax' ),
                'section'  => 'aquaparallax_social_section',
                'settings' => 'aquaparallax_twitter_link',
                'type' => 'text',
            )
    );

    /* Google plus */
    $wp_customize->add_setting('aquaparallax_google_icon', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'aquaparallax_google_icon',
        array(
            'type' => 'checkbox',
            'label' => 'Include google plus icon',
            'section' => 'aquaparallax_social_section',
        )
    );

    /* Google plus link setting */

    $wp_customize->add_setting( 'aquaparallax_google_link', array(
        'sanitize_callback' => 'aquaparallax_sanitize_url'
    ) );

    $wp_customize->add_control(
             'aquaparallax_google_link', array(
                'label'    => esc_html( 'Google Plus Link:', 'aquaparallax' ),
                'section'  => 'aquaparallax_social_section',
                'settings' => 'aquaparallax_google_link',
                'type' => 'text',
            )
    );
    
    /* Instagram */
    $wp_customize->add_setting('aquaparallax_instagram_icon', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'aquaparallax_instagram_icon',
        array(
            'type' => 'checkbox',
            'label' => 'Include instagram icon',
            'section' => 'aquaparallax_social_section',
        )
    );

    /* Instagram setting */

    $wp_customize->add_setting( 'aquaparallax_instagram_link', array(
        'sanitize_callback' => 'aquaparallax_sanitize_url'
    ) );

    $wp_customize->add_control(

             'aquaparallax_instagram_link', array(
                'label'    => esc_html( 'Instagram Link:', 'aquaparallax' ),
                'section'  => 'aquaparallax_social_section',
                'settings' => 'aquaparallax_instagram_link',
                'type' => 'text',
            )
    );
    
    /* Linkedin */
    $wp_customize->add_setting('aquaparallax_linked_icon', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'aquaparallax_linked_icon',
        array(
            'type' => 'checkbox',
            'label' => 'Include linkedin icon',
            'section' => 'aquaparallax_social_section',
        )
    );
    
    /* Linkedin link setting */
    $wp_customize->add_setting( 'aquaparallax_linked_link', array(
        'sanitize_callback' => 'aquaparallax_sanitize_url'
    ) );

    $wp_customize->add_control(

             'aquaparallax_linked_link', array(
                'label'    => esc_html( 'Linkedin Link:', 'aquaparallax' ),
                'section'  => 'aquaparallax_social_section',
                'settings' => 'aquaparallax_linked_link',
                'type' => 'text',
            )
    );
    
    /* Youtube */
    $wp_customize->add_setting('aquaparallax_youtube_icon', array(
        'sanitize_callback' => 'aquaparallax_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'aquaparallax_youtube_icon',
        array(
            'type' => 'checkbox',
            'label' => 'Include youtube icon',
            'section' => 'aquaparallax_social_section',
        )
    );
    
    /* Linkedin link setting */
    $wp_customize->add_setting( 'aquaparallax_youtube_link', array(
        'sanitize_callback' => 'aquaparallax_sanitize_url'
    ) );

    $wp_customize->add_control(

             'aquaparallax_youtube_link', array(
                'label'    => esc_html( 'Youtube Link:', 'aquaparallax' ),
                'section'  => 'aquaparallax_social_section',
                'settings' => 'aquaparallax_youtube_link',
                'type' => 'text',
            )
    );   
    
}
add_action( 'customize_register', 'aquaparallax_customize_register' );


function aquaparallax_sanitize_html( $html ) {
    return wp_filter_post_kses( $html );
}
function aquaparallax_sanitize_checkbox( $checked ) {
  
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function aquaparallax_sanitize_image( $image, $setting ) {
   
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
   
    $file = wp_check_filetype( $image, $mimes );
   
    return ( $file['ext'] ? $image : $setting->default );
}
function aquaparallax_sanitize_url( $url ) {
    return esc_url_raw( $url );
}
function aquaparallax_customize_preview_js() {
    wp_enqueue_script( 'aquaparallax_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aquaparallax_customize_preview_js' );