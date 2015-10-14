<?php
/**
 * Theme Customizer Options
 *
 * @since 1.0.0
 */

require_once 'customizer_constants.php';
require_once 'customizer_extended.php';

/**
 * Contains options array for theme customizer
 * 
 * @param string $type
 * @return array
 */
function afford_customizer_options($type){
    
    $options = array();
    $sections = array();
    $panels = array();
    
    $panels[] = array(
        'id' => 'afford_panel_general',
        'title' => __('General','afford'),
        'description' => '',
        'priority' => 20,
    );

    $panels[] = array(
        'id' => 'afford_panel_header',
        'title' => __('Header','afford'),
        'description' => '',
        'priority' => 40,
    );

    $sections[] = array(
        'id' => 'afford_section_header_logo',
        'title' => __('Site Logo','afford'),
        'description' => '',
        'panel' => 'afford_panel_header',
        'priority' => 100,
        'shortname' => 'section_header_logo',
    );

    $options[] = array(
        'id' => 'site_logo',
        'default' => '',
        'label' => __('Site Logo','afford'),
        'description' => '',
        'type' => 'media_upload',
        'sanitize_type' => 'media_upload',
        'section' => 'section_header_logo',
        'extended_class' => 'WP_Customize_Image_Control',
        'transport' => 'refresh'
    );

    $panels[] = array(
        'id' => 'afford_panel_layout',
        'title' => __('Layout','afford'),
        'description' => '',
        'priority' => 60,
    );

    $sections[] = array(
        'id' => 'afford_section_layout_header',
        'title' => __('Header','afford'),
        'description' => '',
        'panel' => 'afford_panel_layout',
        'priority' => 100,
        'shortname' => 'section_layout_header',
    );

    $options[] = array(
        'id' => 'disable_header',
        'default' => false,
        'label' => __('Hide Header','afford'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_header',
        'extended_class' => false,
        'transport' => 'refresh'
    );
    
    $options[] = array(
        'id' => 'disable_site_desc',
        'default' => true,
        'label' => __('Hide Site Description','afford'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_header',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'afford_section_layout_social',
        'title' => __('Social','afford'),
        'description' => '',
        'panel' => 'afford_panel_layout',
        'priority' => 110,
        'shortname' => 'section_layout_social',
    );

    $options[] = array(
        'id' => 'disable_social_section',
        'default' => false,
        'label' => __('Disable Social Section', 'afford'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_social',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $panels[] = array(
        'id' => 'afford_panel_colors',
        'title' => __('Colors','afford'),
        'description' => '',
        'priority' => 80,
    );

    $sections[] = array(
        'id' => 'afford_section_colors_global',
        'title' => __('Global','afford'),
        'description' => '',
        'panel' => 'afford_panel_colors',
        'priority' => 100,
        'shortname' => 'section_colors_global',
    );

    $sections[] = array(
        'id' => 'afford_section_colors_header',
        'title' => __('Header','afford'),
        'description' => '',
        'panel' => 'afford_panel_colors',
        'priority' => 101,
        'shortname' => 'section_colors_header',
    );

    $options[] = array(
        'id' => 'color_site_title',
        'default' => '#555555',
        'label' => __('Site Title Color','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_header',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );
    
    $options[] = array(
        'id' => 'color_site_desc',
        'default' => '#555555',
        'label' => __('Site Description Color','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_header',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $sections[] = array(
        'id' => 'afford_section_colors_post',
        'title' => __('Posts/Pages','afford'),
        'description' => '',
        'panel' => 'afford_panel_colors',
        'priority' => 102,
        'shortname' => 'section_colors_posts',
    );


    $options[] = array(
        'id' => 'color_p_title',
        'default' => '#000000',
        'label' => __('Post Title Color (Page/Post)','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_p_meta',
        'default' => '#000000',
        'label' => __('Post Meta Color (Page/Posts)','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_p_content',
        'default' => '#000000',
        'label' => __('Post Content Color (Page/Posts)','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $sections[] = array(
        'id' => 'afford_section_colors_blog',
        'title' => __('Blog','afford'),
        'description' => '',
        'panel' => 'afford_panel_colors',
        'priority' => 103,
        'shortname' => 'section_colors_blog',
    );

    $options[] = array(
        'id' => 'color_blog_p_title',
        'default' => '#444444',
        'label' => __('Post Title Color (Blog)','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_blog',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_blog_p_meta',
        'default' => '#000000',
        'label' => __('Post Meta Color (Blog)','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_blog',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_blog_p_content',
        'default' => '#000000',
        'label' => __('Post Content Color (Blog)','afford'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_blog',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $panels[] = array(
        'id' => 'afford_panel_social',
        'title' => __('Social','afford'),
        'description' => '',
        'priority' => 100,
    );

    $sections[] = array(
        'id' => 'afford_section_social_profiles',
        'title' => __('Social Profiles','afford'),
        'description' => '',
        'panel' => 'afford_panel_social',
        'priority' => 100,
        'shortname' => 'section_social_profiles',
    );

    $options[] = array(
        'id' => 'facebook',
        'default' => '',
        'label' => __('Facebook', 'afford'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'url',
        'section' => 'section_social_profiles',
        'extended_class' => false,
        'transport' => 'refresh'
    );
    
    $options[] = array(
        'id' => 'twitter',
        'default' => '',
        'label' => __('Twitter','afford'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'url',
        'section' => 'section_social_profiles',
        'extended_class' => false,
        'transport' => 'refresh'
    );
    
    $options[] = array(
        'id' => 'rss',
        'default' => '',
        'label' => __('RSS','afford'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'url',
        'section' => 'section_social_profiles',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'afford_section_about',
        'title' => __('About Afford Theme','afford'),
        'description' => '',
        'panel' => '',
        'priority' => 120,
        'shortname' => 'section_about',
    );

    $options[] = array(
        'id' => 'important_links',
        'default' => '',
        'label' => '',
        'description' => '',
        'type' => 'important_links',
        'sanitize_type' => 'none',
        'section' => 'section_about',
        'extended_class' => 'Afford_Customize_Important_Links_Control',
        'transport' => 'refresh'
    );


    switch($type):
        case 'panels':
            return $panels;
        case 'sections':
            return $sections;
        case 'options':
            return $options;
        default:
            return;
    endswitch;
}

/**
 * Build Theme Customizer Options
 * 
 * @param type $wp_customize
 */
function afford_customizer_setup($wp_customize) {
    
    /**
     * Exit if $wp_customize does not exist.
     */
    if( !isset($wp_customize)) {
        return;
    }
    
    $panels = afford_customizer_options('panels');
    $sections = afford_customizer_options('sections');
    $options = afford_customizer_options('options');
    
    foreach($panels as $panel) {
        $wp_customize->add_panel($panel['id'], array(
            'title' => $panel['title'],
            'description' => $panel['description'],
            'theme_supports' => '',
            'capability' => 'edit_theme_options',
            'priority' => $panel['priority'],
        ));
    }
    
    foreach($sections as $section) {
        $wp_customize->add_section($section['id'], array(
            'title' => $section['title'],
            'description' => $section['description'],
            'panel' => $section['panel'],
            'priority' => $section['priority'],
        ));
    }
    
    foreach($options as $option) {
        $wp_customize->add_setting('afford_theme_lite['.$option['id'].']', array(
            'type' => 'option',
            'default' => $option['default'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => afford_get_sanitize_filter($option['sanitize_type']),
            'transport' => $option['transport'],
        ));

        if (!$option['extended_class']) {
            $wp_customize->add_control('afford_theme_lite[' . $option['id'] . ']', array(
                'label' => $option['label'],
                'description' => $option['description'],
                'type' => $option['type'],
                'section' => afford_get_sections($option['section']),
                'setting' => $option['id'],
            ));
        } else {
            $wp_customize->add_control(new $option['extended_class'](
                $wp_customize, 'afford_theme_lite[' . $option['id'] . ']', array(
                'label' => $option['label'],
                'description' => $option['description'],
                'section' => afford_get_sections($option['section']),
                'setting' => $option['id'],
                )
            ));
        }
    }
	
    // WP Defaults
    $wp_customize->get_section('title_tagline')->panel = 'afford_panel_general';
    $wp_customize->get_section('static_front_page')->panel = 'afford_panel_general';
    $wp_customize->get_control('background_color')->section = 'afford_section_colors_global';
    $wp_customize->get_control('background_image')->section = 'afford_section_colors_global';
    $wp_customize->remove_section('background_image');
}
add_action( 'customize_register', 'afford_customizer_setup' );



/**
 * Enqueue Customizer Live Preview Scripts
 * 
 * @todo complete this
 */
function afford_live_preview_scripts(){
    wp_enqueue_script('afford-themecustomizer-live-preview', AFFORD_ADMIN_JS_URL . 'customizer.js', array('jquery', 'customize-preview'),'', true);
}
add_action('customize_preview_init','afford_live_preview_scripts');



/**
 * Enqueue admin panel CSS - (Primarily for customizer)
 *
 * @since 1.0
 */
function afford_admin_panel_style($hook) {
    
    if($hook == 'widgets.php'){
        wp_enqueue_style('afford-admin-panel-css', AFFORD_ADMIN_CSS_URL . 'admin.css');
        wp_enqueue_script('afford-admin-panel-js', AFFORD_ADMIN_JS_URL . 'admin.js', array('jquery'), '1.0.0', TRUE);
        wp_localize_script('afford-admin-panel-js', 'affordCustomizerUpgradeVars', array('upgrade_text' => __('Upgrade to Premium', 'afford')));
    }
}
add_action( 'admin_enqueue_scripts', 'afford_admin_panel_style' );



/**
 * Gets the value of an option.
 * Also sets caching for default options.
 * 
 * @global array $afford_options Options cache.
 * @param string $id Option ID
 * @return string Option Value
 */
function afford_get_option($id = NULL) {
    global $afford_options;
    
    // Global array exists. Get value from memory
    if($afford_options && array_key_exists($id, $afford_options)) {
        return $afford_options[$id];
    } else {
        
        // No value in Memory. Try fetching from DB
        $saved_options = get_option('afford_theme_lite');
        
        if($saved_options && array_key_exists($id, $saved_options)){
            
            $afford_options = $saved_options;
            return $afford_options[$id];
            
        } else {
            
            // No value in Memory or DB. Get it from default options.
            $sane_options = afford_customizer_options('options');
            $afford_options = array();
            
            foreach($sane_options as $options) {
                if($id == $options['id'] ){
                    $afford_options[$options['id']] = $options['default'];
                    break;
                }                
            }

            return $afford_options[$id];

        }
    }
}


/**
 * Returns sanitization filter functions
 * 
 * @param string $type The type of input to be sanitized
 * @return string Sanitization function name
 */
function afford_get_sanitize_filter($type){
    $filters = array(
        'html' => 'afford_sanitize_html',
        'nohtml' => 'afford_sanitize_nohtml', // Only Text
        'url' => 'afford_sanitize_url',
        'checkbox' => 'afford_sanitize_checkbox',
        'color' => 'afford_sanitize_hex_color',
        'media_upload' => 'afford_sanitize_media_upload',
        'none' => 'afford_sanitize_none'
    );

    return $filters[$type];
}


/**
 * Returns the section based on shortname
 * 
 * @param string $shortname
 * @return string
 */
function afford_get_sections($shortname) {
    $sections = afford_customizer_options('sections');
    foreach ($sections as $section) {
        if($section['shortname'] == $shortname){
            return $section['id'];
        }
    }
}


/**
 * Sanitization Function for No HTML content (only text)
 *
 * @param string $nohtml
 * @return string
 */
function afford_sanitize_nohtml($nohtml) {
    return wp_filter_nohtml_kses( $nohtml );
}


/**
 * Sanitization Function for only HTML content
 *
 * @param string $html
 * @return string
 */
function afford_sanitize_html($html) {
    return wp_filter_post_kses( $html );
}


/**
 * Sanitization Function for URL
 * 
 * @param string $url
 * @return string
 */
function afford_sanitize_url($url){
    return esc_url_raw($url);
}


/**
 * Sanitization Function for Checkbox
 * 
 * @param boolean $checked
 * @return boolean
 */
function afford_sanitize_checkbox($checked){
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Sanitization Function for Hex Colors
 * 
 * @param string HEX color to sanitize
 * @param WP_Customize_Setting Setting instance
 */
function afford_sanitize_hex_color($hex_color, $setting){
    // Sanitize $input as a hex value without the hash prefix.
    $hex_color = sanitize_hex_color($hex_color);

    // If $input is a valid hex value, return it; otherwise, return the default.
    return ( ( $hex_color ) ? $hex_color : $setting->default );
}

/**
 * Sanitization Function for Image Upload via Media Manager
 * 
 * @param string Image filename
 * @param WP_Customize_Setting Setting instance
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function afford_sanitize_media_upload( $image, $setting ) {

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
 * Sanitizes nothing
 * 
 * This function is not used to sanitize customizer options.
 * 
 * It is used for displaying `About Afford Theme` section at the bottom of Customizer.
 * 
 * @see Afford_Customize_Important_Links_Control
 */
function afford_sanitize_none(){
    return;
}