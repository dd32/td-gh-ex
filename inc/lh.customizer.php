<?php

/**
 * Our theme customizer functions
 *
 * @package agncy
 */
/**
 * The custom customizer class
 *
 * TODO: Migrate to a singleton class
 */
class AgncyThemeCustomizer
{
    /**
     * The class constructor, that triggers the action and filter dispatcher.
     */
    public function __construct()
    {
        $this->action_dispatcher();
        $this->filter_dispatcher();
    }
    
    /**
     * The action dispatcher, that calls needed WordPress actions for this class.
     */
    private function action_dispatcher()
    {
        add_action( 'customize_register', array( $this, 'customize_register' ) );
        add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ), 99 );
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'control_scripts' ) );
    }
    
    /**
     * The action dispatcher, that calls needed WordPress filter for this class.
     */
    private function filter_dispatcher()
    {
    }
    
    /**
     * The function that registers the needed customizer functions for this theme
     *
     * @param object $wp_customize The WordPress customizer function.
     */
    public function customize_register( $wp_customize )
    {
        $wp_customize->add_panel( 'agncy_settings', array(
            'title'       => __( 'Agncy', 'agncy' ),
            'description' => __( 'Thank you for using the Agncy theme. Use these settings to customise your website.', 'agncy' ),
            'priority'    => 1,
        ) );
        //
        // SECTIONS
        //
        // The general section.
        $wp_customize->add_section( 'agncy_settings_general', array(
            'title'    => __( 'General', 'agncy' ),
            'priority' => 1,
            'panel'    => 'agncy_settings',
        ) );
        // The 404 section.
        $wp_customize->add_section( 'agncy_404', array(
            'title'    => __( '404 Page', 'agncy' ),
            'priority' => 40,
            'panel'    => 'agncy_settings',
        ) );
        // The CONTACTS section.
        $wp_customize->add_section( 'agncy_contacts', array(
            'title'    => __( 'Contact Information', 'agncy' ),
            'priority' => 21,
            'panel'    => 'agncy_settings',
        ) );
        // Header Settings.
        $wp_customize->add_section( 'agncy_header', array(
            'title'    => __( 'Header', 'agncy' ),
            'priority' => 10,
            'panel'    => 'agncy_settings',
        ) );
        // The FOOTER section.
        $wp_customize->add_section( 'agncy_footer', array(
            'title'    => __( 'Footer', 'agncy' ),
            'priority' => 20,
            'panel'    => 'agncy_settings',
        ) );
        //
        // SETTINGS
        //
        // The 404-Image Setting.
        $wp_customize->add_setting( 'image_404', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_404', array(
            'label'    => __( '404-Page Header-Image', 'agncy' ),
            'section'  => 'agncy_404',
            'settings' => 'image_404',
        ) ) );
        $wp_customize->add_setting( 'title_404', array(
            'default'           => __( 'ooops... it seems that the page you\'re looking for does not exist :/', 'agncy' ),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_404', array(
            'label'       => __( '404-Page Title', 'agncy' ),
            'description' => __( 'The content title of the 404-Page - not the "Error 404"-Title.', 'agncy' ),
            'section'     => 'agncy_404',
            'settings'    => 'title_404',
        ) ) );
        $wp_customize->add_setting( 'text_404', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'text_404', array(
            'type'        => 'textarea',
            'label'       => __( '404-Page Text', 'agncy' ),
            'description' => __( 'The content below the title.', 'agncy' ),
            'section'     => 'agncy_404',
            'settings'    => 'text_404',
        ) ) );
        // Contact Settings.
        $wp_customize->add_setting( 'contact_phone', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_phone', array(
            'label'    => __( 'Phone Number', 'agncy' ),
            'section'  => 'agncy_contacts',
            'settings' => 'contact_phone',
        ) ) );
        $wp_customize->add_setting( 'contact_mail', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'is_email',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_mail', array(
            'label'    => __( 'E-Mail address', 'agncy' ),
            'section'  => 'agncy_contacts',
            'settings' => 'contact_mail',
        ) ) );
        $wp_customize->add_setting( 'contact_sm_claim', array(
            'capability'        => 'edit_theme_options',
            'default'           => __( 'Follow us on:', 'agncy' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_sm_claim', array(
            'label'    => __( 'Social Media Claim', 'agncy' ),
            'section'  => 'agncy_contacts',
            'settings' => 'contact_sm_claim',
        ) ) );
        $wp_customize->add_setting( 'contact_fb', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_fb', array(
            'label'    => __( 'Facebook URL', 'agncy' ),
            'section'  => 'agncy_contacts',
            'settings' => 'contact_fb',
        ) ) );
        $wp_customize->add_setting( 'contact_twitter', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_twitter', array(
            'label'    => __( 'Twitter URL', 'agncy' ),
            'section'  => 'agncy_contacts',
            'settings' => 'contact_twitter',
        ) ) );
        $wp_customize->add_setting( 'contact_instagram', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_instagram', array(
            'label'    => __( 'Instagram URL', 'agncy' ),
            'section'  => 'agncy_contacts',
            'settings' => 'contact_instagram',
        ) ) );
        $wp_customize->add_setting( 'contact_youtube', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_youtube', array(
            'label'    => __( 'YouTube URL', 'agncy' ),
            'section'  => 'agncy_contacts',
            'settings' => 'contact_youtube',
        ) ) );
        // Sticky Sidebar.
        $wp_customize->add_setting( 'agncy_sticky_sidebar', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'agncy_sanitize_checkbox',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agncy_sticky_sidebar', array(
            'label'       => __( 'Sticky Sidebar', 'agncy' ),
            'description' => __( 'The sidebar will remain in the viewport, when you activate this setting.', 'agncy' ),
            'section'     => 'agncy_settings_general',
            'settings'    => 'agncy_sticky_sidebar',
            'type'        => 'checkbox',
            'priority'    => 999,
        ) ) );
        // Header Settings.
        $wp_customize->add_section( 'agncy_header', array(
            'title'    => __( 'Header', 'agncy' ),
            'priority' => 10,
            'panel'    => 'agncy_settings',
        ) );
        $wp_customize->add_setting( 'agncy_header_show_mobile_search', array(
            'default'           => '1',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'agncy_sanitize_checkbox',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agncy_header_show_mobile_search', array(
            'label'       => __( 'Show mobile searchform?', 'agncy' ),
            'description' => __( 'Activate if the searchform should appear at the mobile menu.', 'agncy' ),
            'section'     => 'agncy_header',
            'settings'    => 'agncy_header_show_mobile_search',
            'type'        => 'checkbox',
            'priority'    => 999,
        ) ) );
        // The Mobile Logo.
        $wp_customize->add_setting( 'agncy_header_mobile_logo', array(
            'default'           => '',
            'sanitize_callback' => 'absint',
        ) );
        $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'agncy_header_mobile_logo', array(
            'label'       => __( 'Mobile Logo', 'agncy' ),
            'description' => __( 'The logo to be shown on mobile screens.', 'agncy' ),
            'section'     => 'title_tagline',
            'settings'    => 'agncy_header_mobile_logo',
            'priority'    => 9,
            'flex_width'  => true,
            'height'      => 94,
            'width'       => 560,
        ) ) );
    }
    
    /**
     * Function that determines if the bg color should be shown.
     *
     * @access public
     * @param object $control The WordPress customizer controls object.
     * @return bool $show_header_bg_color The bool if the header background color should be shown
     */
    public function show_header_bg_color( $control )
    {
        
        if ( 'color' === $control->manager->get_setting( 'agncy_header_background' )->value() ) {
            return true;
        } else {
            return false;
        }
    
    }
    
    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    public function customize_preview_js()
    {
        wp_enqueue_script(
            'customizer',
            get_template_directory_uri() . '/admin/customizer.min.js',
            array( 'customize-preview' ),
            '1',
            true
        );
    }
    
    /**
     * The function to register scripts and styles for customizer controls.
     *
     * @access public
     * @return void
     */
    public function control_scripts()
    {
        wp_enqueue_style( 'agncy_admin', AGNCY_THEME_URL . '/admin/admin.css' );
    }

}
new AgncyThemeCustomizer();
/**
 * Helper function to sanitize a bool value
 *
 * @param  bool $checked The value to be checked.
 *
 * @return bool          The checked value
 */
function agncy_sanitize_checkbox( $checked )
{
    // Boolean check.
    return ( isset( $checked ) && true == $checked ? true : false );
}
