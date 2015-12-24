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
function actuate_customizer_options($type){
    
    $options = array();
    $sections = array();
    $panels = array();
    
    $panels[] = array(
        'id' => 'actuate_panel_general',
        'title' => __('General','actuate'),
        'description' => '',
        'priority' => 20,
    );

    $panels[] = array(
        'id' => 'actuate_panel_header',
        'title' => __('Header','actuate'),
        'description' => '',
        'priority' => 40,
    );

    $sections[] = array(
        'id' => 'actuate_section_header_logo',
        'title' => __('Site Logo','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_header',
        'priority' => 100,
        'shortname' => 'section_header_logo',
    );

    $options[] = array(
        'id' => 'site_logo',
        'default' => '',
        'label' => __('Site Logo','actuate'),
        'description' => '',
        'type' => 'media_upload',
        'sanitize_type' => 'media_upload',
        'section' => 'section_header_logo',
        'extended_class' => 'WP_Customize_Image_Control',
        'transport' => 'refresh'
    );

    $panels[] = array(
        'id' => 'actuate_panel_layout',
        'title' => __('Layout','actuate'),
        'description' => '',
        'priority' => 60,
    );

    $sections[] = array(
        'id' => 'actuate_section_layout_header',
        'title' => __('Header','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_layout',
        'priority' => 100,
        'shortname' => 'section_layout_header',
    );

    $options[] = array(
        'id' => 'disable_header',
        'default' => false,
        'label' => __('Hide Header','actuate'),
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
        'label' => __('Hide Site Description','actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_header',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'actuate_section_layout_nav',
        'title' => __('Navigation','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_layout',
        'priority' => 120,
        'shortname' => 'section_layout_nav',
    );

    $options[] = array(
        'id' => 'disable_menu',
        'default' => false,
        'label' => __('Hide Primary Menu','actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_nav',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'actuate_section_layout_blog',
        'title' => __('Blog','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_layout',
        'priority' => 140,
        'shortname' => 'section_layout_blog',
    );

    $options[] = array(
        'id' => 'disable_blog_p_meta',
        'default' => false,
        'label' => __('Hide Blog (Post Meta)','actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_blog',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $options[] = array(
        'id' => 'disable_blog_p_meta_comments',
        'default' => false,
        'label' => __('Hide Blog (Post Comments)','actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_blog',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $options[] = array(
        'id' => 'disable_thumb',
        'default' => false,
        'label' => __('Hide Blog (Post Thumbnails)','actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_blog',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'actuate_section_layout_posts',
        'title' => __('Posts','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_layout',
        'priority' => 160,
        'shortname' => 'section_layout_posts',
    );

    $options[] = array(
        'id' => 'disable_post_meta',
        'default' => false,
        'label' => __('Hide Post Meta','actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_posts',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'actuate_section_layout_social',
        'title' => __('Social','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_layout',
        'priority' => 180,
        'shortname' => 'section_layout_social',
    );

    $options[] = array(
        'id' => 'disable_social_section',
        'default' => false,
        'label' => __('Disable Social Section', 'actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_social',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'actuate_section_layout_footer',
        'title' => __('Footer','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_layout',
        'priority' => 200,
        'shortname' => 'section_layout_footer',
    );

    $options[] = array(
        'id' => 'disable_footer',
        'default' => false,
        'label' => __('Disable Footer', 'actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_footer',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $options[] = array(
        'id' => 'show_copyright',
        'default' => true,
        'label' => __('Show Copyright', 'actuate'),
        'description' => '',
        'type' => 'checkbox',
        'sanitize_type' => 'checkbox',
        'section' => 'section_layout_footer',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $options[] = array(
        'id' => 'footer_name',
        'default' => '',
        'label' => __('Company Name', 'actuate'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'html',
        'section' => 'section_layout_footer',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $panels[] = array(
        'id' => 'actuate_panel_colors',
        'title' => __('Colors','actuate'),
        'description' => '',
        'priority' => 80,
    );

    $sections[] = array(
        'id' => 'actuate_section_colors_global',
        'title' => __('Global','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_colors',
        'priority' => 100,
        'shortname' => 'section_colors_global',
    );

    $sections[] = array(
        'id' => 'actuate_section_colors_header',
        'title' => __('Header','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_colors',
        'priority' => 101,
        'shortname' => 'section_colors_header',
    );

    $options[] = array(
        'id' => 'color_site_title',
        'default' => '#555555',
        'label' => __('Site Title Color','actuate'),
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
        'label' => __('Site Description Color','actuate'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_header',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $sections[] = array(
        'id' => 'actuate_section_colors_post',
        'title' => __('Posts','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_colors',
        'priority' => 102,
        'shortname' => 'section_colors_posts',
    );


    $options[] = array(
        'id' => 'color_posts_title',
        'default' => '#000000',
        'label' => __('Post Title Color','actuate'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_posts_meta',
        'default' => '#000000',
        'label' => __('Post Meta Color','actuate'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $options[] = array(
        'id' => 'color_posts_content',
        'default' => '#000000',
        'label' => __('Post Content Color','actuate'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_posts',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $sections[] = array(
        'id' => 'actuate_section_colors_blog',
        'title' => __('Blog','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_colors',
        'priority' => 103,
        'shortname' => 'section_colors_blog',
    );

    $options[] = array(
        'id' => 'color_blog_p_title',
        'default' => '#444444',
        'label' => __('Post Title Color (Blog)','actuate'),
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
        'label' => __('Post Meta Color (Blog)','actuate'),
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
        'label' => __('Post Content Color (Blog)','actuate'),
        'description' => '',
        'type' => 'color',
        'sanitize_type' => 'color',
        'section' => 'section_colors_blog',
        'extended_class' => 'WP_Customize_Color_Control',
        'transport' => 'postMessage'
    );

    $panels[] = array(
        'id' => 'actuate_panel_social',
        'title' => __('Social','actuate'),
        'description' => '',
        'priority' => 100,
    );

    $sections[] = array(
        'id' => 'actuate_section_social_profiles',
        'title' => __('Social Profiles','actuate'),
        'description' => '',
        'panel' => 'actuate_panel_social',
        'priority' => 100,
        'shortname' => 'section_social_profiles',
    );

    $options[] = array(
        'id' => 'facebook',
        'default' => '',
        'label' => __('Facebook', 'actuate'),
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
        'label' => __('Twitter','actuate'),
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
        'label' => __('RSS','actuate'),
        'description' => '',
        'type' => 'text',
        'sanitize_type' => 'url',
        'section' => 'section_social_profiles',
        'extended_class' => false,
        'transport' => 'refresh'
    );

    $sections[] = array(
        'id' => 'actuate_section_about',
        'title' => __('About Actuate Theme','actuate'),
        'description' => '',
        'panel' => '',
        'priority' => 120,
        'shortname' => 'section_about',
    );

    $options[] = array(
        'id' => 'important_links',
        'default' => '',
        'label' => __('','actuate'),
        'description' => '',
        'type' => 'important_links',
        'sanitize_type' => 'none',
        'section' => 'section_about',
        'extended_class' => 'Actuate_Customize_Important_Links_Control',
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
function actuate_customizer_setup($wp_customize) {
    
    /**
     * Exit if $wp_customize does not exist.
     */
    if( !isset($wp_customize)) {
        return;
    }
    
    $panels = actuate_customizer_options('panels');
    $sections = actuate_customizer_options('sections');
    $options = actuate_customizer_options('options');
    
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
        $wp_customize->add_setting('actuate_theme_lite['.$option['id'].']', array(
            'type' => 'option',
            'default' => $option['default'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => actuate_get_sanitize_filter($option['sanitize_type']),
            'transport' => $option['transport'],
        ));

        if (!$option['extended_class']) {
            $wp_customize->add_control('actuate_theme_lite[' . $option['id'] . ']', array(
                'label' => $option['label'],
                'description' => $option['description'],
                'type' => $option['type'],
                'section' => actuate_get_sections($option['section']),
                'setting' => $option['id'],
            ));
        } else {
            $wp_customize->add_control(new $option['extended_class'](
                $wp_customize, 'actuate_theme_lite[' . $option['id'] . ']', array(
                'label' => $option['label'],
                'description' => $option['description'],
                'section' => actuate_get_sections($option['section']),
                'setting' => $option['id'],
                )
            ));
        }
    }
	
    // WP Defaults
    $wp_customize->get_section('title_tagline')->panel = 'actuate_panel_general';
    $wp_customize->get_section('static_front_page')->panel = 'actuate_panel_general';
    $wp_customize->get_control('background_color')->section = 'actuate_section_colors_global';
    $wp_customize->get_control('background_image')->section = 'actuate_section_colors_global';
    $wp_customize->remove_section('background_image');
}
add_action( 'customize_register', 'actuate_customizer_setup' );



/**
 * Enqueue Customizer Live Preview Scripts
 * 
 * @todo complete this
 */
function actuate_live_preview_scripts(){
    wp_enqueue_script('actuate-themecustomizer-live-preview', ACTUATE_ADMIN_JS_URL . 'customizer.js', array('jquery', 'customize-preview'),'', true);
}
add_action('customize_preview_init','actuate_live_preview_scripts');



/**
 * Enqueue admin panel CSS - (Primarily for customizer)
 *
 * @since 1.0
 */
function actuate_admin_panel_style($hook) {
    
    if($hook == 'widgets.php'){
        wp_enqueue_style('actuate-admin-panel-css', ACTUATE_ADMIN_CSS_URL . 'admin.css');
        wp_enqueue_script('actuate-admin-panel-js', ACTUATE_ADMIN_JS_URL . 'admin.js', array('jquery'), '1.0.0', TRUE);
        wp_localize_script('actuate-admin-panel-js', 'actuateCustomizerUpgradeVars', array('upgrade_text' => __('Learn about Premium', 'actuate')));
    }
}
add_action( 'admin_enqueue_scripts', 'actuate_admin_panel_style' );



/**
 * Gets the value of an option.
 * Also sets caching for default options.
 * 
 * @global array $actuate_options Options cache.
 * @param string $id Option ID
 * @return string Option Value
 */
function actuate_get_option($id = NULL) {
    global $actuate_options;
    
    // Global array exists. Get value from memory
    if($actuate_options && array_key_exists($id, $actuate_options)) {
        return $actuate_options[$id];
    } else {
        
        // No value in Memory. Try fetching from DB
        $saved_options = get_option('actuate_theme_lite');
        
        if($saved_options && array_key_exists($id, $saved_options)){
            
            $actuate_options = $saved_options;
            return $actuate_options[$id];
            
        } else {
            
            // No value in Memory or DB. Get it from default options.
            $sane_options = actuate_customizer_options('options');
            $actuate_options = array();
            
            foreach($sane_options as $options) {
                if($id == $options['id'] ){
                    $actuate_options[$options['id']] = $options['default'];
                    break;
                }                
            }

            return $actuate_options[$id];

        }
    }
}


/**
 * Returns sanitization filter functions
 * 
 * @param string $type The type of input to be sanitized
 * @return string Sanitization function name
 */
function actuate_get_sanitize_filter($type){
    $filters = array(
        'html' => 'actuate_sanitize_html',
        'nohtml' => 'actuate_sanitize_nohtml', // Only Text
        'url' => 'actuate_sanitize_url',
        'checkbox' => 'actuate_sanitize_checkbox',
        'color' => 'actuate_sanitize_hex_color',
        'media_upload' => 'actuate_sanitize_media_upload',
        'none' => 'actuate_sanitize_none'
    );

    return $filters[$type];
}


/**
 * Returns the section based on shortname
 * 
 * @param string $shortname
 * @return string
 */
function actuate_get_sections($shortname) {
    $sections = actuate_customizer_options('sections');
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
function actuate_sanitize_nohtml($nohtml) {
    return wp_filter_nohtml_kses( $nohtml );
}


/**
 * Sanitization Function for only HTML content
 *
 * @param string $html
 * @return string
 */
function actuate_sanitize_html($html) {
    return wp_filter_post_kses( $html );
}


/**
 * Sanitization Function for URL
 * 
 * @param string $url
 * @return string
 */
function actuate_sanitize_url($url){
    return esc_url_raw($url);
}


/**
 * Sanitization Function for Checkbox
 * 
 * @param boolean $checked
 * @return boolean
 */
function actuate_sanitize_checkbox($checked){
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Sanitization Function for Hex Colors
 * 
 * @param string HEX color to sanitize
 * @param WP_Customize_Setting Setting instance
 */
function actuate_sanitize_hex_color($hex_color, $setting){
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
function actuate_sanitize_media_upload( $image, $setting ) {

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
 * Sanitizes nothing (Used for Theme Upgrade Text)
 */
function actuate_sanitize_none(){
    return;
}