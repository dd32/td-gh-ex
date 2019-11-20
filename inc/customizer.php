<?php
/**
 * AccessPress Root Theme Customizer
 *
 * @package AccessPress Root
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function accesspress_root_customize_register( $wp_customize ) {
    /** Default Settings */        
    $wp_customize->add_panel( 
        'accesspress_root_default_panel',
         array(
            'priority' => 5,
            'capability' => 'edit_theme_options',
            'title' => esc_html__( 'Default Settings', 'accesspress-root' ),
            'description' => esc_html__( 'Setup default WordPress Customizer options.', 'accesspress-root' ),
        ) 
    );
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'title_tagline' )->panel     = 'accesspress_root_default_panel';
    $wp_customize->get_section( 'colors' )->panel            = 'accesspress_root_default_panel';
    $wp_customize->get_section( 'header_image' )->panel      = 'accesspress_root_default_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'accesspress_root_default_panel';    
    $wp_customize->get_section( 'static_front_page' )->panel = 'accesspress_root_default_panel';
    $wp_customize->get_section( 'custom_css' )->panel = 'accesspress_root_default_panel';
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    require trailingslashit( get_template_directory() ) . '/inc/panel/accesspress-root-sanitize.php';
}
add_action( 'customize_register', 'accesspress_root_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function accesspress_root_customize_preview_js() {
	wp_enqueue_script( 'accesspress_root_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'accesspress_root_customize_preview_js' );

if( !function_exists('accesspress_root_category_lists')){
        function accesspress_root_category_lists(){
            $accesspress_root_category   =   get_categories();
            $accesspress_root_cat_list   =   array();
            $accesspress_root_cat_list[0]=   esc_html__('Select Category','accesspress-root');
            foreach ($accesspress_root_category as $accesspress_root_cat) {
                $accesspress_root_cat_list[$accesspress_root_cat->term_id]    =   $accesspress_root_cat->name;
            }
            return $accesspress_root_cat_list;
        }
    }
    if( !function_exists('accesspress_root_page_list')){
        function accesspress_root_page_list(){
            $allposts  =   new WP_Query( array( 'post_type' => 'page','posts_per_page' => -1 ));
            $page_list   =   array();
            $page_list[0]=   esc_html__('Select Page','accesspress-root');
            while($allposts->have_posts()) {
                $allposts->the_post();
                $page_list[get_the_ID()]    =   get_the_title();
            }
            return $page_list;
        }
    }
    if( !class_exists('Kirki')){
        return;
    }
    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin this is not needed.
     */
    if(!function_exists('accesspress_root_kirki_i18n')){
        function accesspress_root_kirki_i18n( $accesspress_root_config ) {

            $accesspress_root_config['i18n'] = array(
                'background-color'      => esc_html__( 'Background Color', 'accesspress-root' ),
                'background-image'      => esc_html__( 'Background Image', 'accesspress-root' ),
                'no-repeat'             => esc_html__( 'No Repeat', 'accesspress-root' ),
                'repeat-all'            => esc_html__( 'Repeat All', 'accesspress-root' ),
                'repeat-x'              => esc_html__( 'Repeat Horizontally', 'accesspress-root' ),
                'repeat-y'              => esc_html__( 'Repeat Vertically', 'accesspress-root' ),
                'inherit'               => esc_html__( 'Inherit', 'accesspress-root' ),
                'background-repeat'     => esc_html__( 'Background Repeat', 'accesspress-root' ),
                'cover'                 => esc_html__( 'Cover', 'accesspress-root' ),
                'contain'               => esc_html__( 'Contain', 'accesspress-root' ),
                'background-size'       => esc_html__( 'Background Size', 'accesspress-root' ),
                'fixed'                 => esc_html__( 'Fixed', 'accesspress-root' ),
                'scroll'                => esc_html__( 'Scroll', 'accesspress-root' ),
                'background-attachment' => esc_html__( 'Background Attachment', 'accesspress-root' ),
                'left-top'              => esc_html__( 'Left Top', 'accesspress-root' ),
                'left-center'           => esc_html__( 'Left Center', 'accesspress-root' ),
                'left-bottom'           => esc_html__( 'Left Bottom', 'accesspress-root' ),
                'right-top'             => esc_html__( 'Right Top', 'accesspress-root' ),
                'right-center'          => esc_html__( 'Right Center', 'accesspress-root' ),
                'right-bottom'          => esc_html__( 'Right Bottom', 'accesspress-root' ),
                'center-top'            => esc_html__( 'Center Top', 'accesspress-root' ),
                'center-center'         => esc_html__( 'Center Center', 'accesspress-root' ),
                'center-bottom'         => esc_html__( 'Center Bottom', 'accesspress-root' ),
                'background-position'   => esc_html__( 'Background Position', 'accesspress-root' ),
                'background-opacity'    => esc_html__( 'Background Opacity', 'accesspress-root' ),
                'ON'                    => esc_html__( 'ON', 'accesspress-root' ),
                'OFF'                   => esc_html__( 'OFF', 'accesspress-root' ),
                'all'                   => esc_html__( 'All', 'accesspress-root' ),
                'cyrillic'              => esc_html__( 'Cyrillic', 'accesspress-root' ),
                'cyrillic-ext'          => esc_html__( 'Cyrillic Extended', 'accesspress-root' ),
                'devanagari'            => esc_html__( 'Devanagari', 'accesspress-root' ),
                'greek'                 => esc_html__( 'Greek', 'accesspress-root' ),
                'greek-ext'             => esc_html__( 'Greek Extended', 'accesspress-root' ),
                'khmer'                 => esc_html__( 'Khmer', 'accesspress-root' ),
                'latin'                 => esc_html__( 'Latin', 'accesspress-root' ),
                'latin-ext'             => esc_html__( 'Latin Extended', 'accesspress-root' ),
                'vietnamese'            => esc_html__( 'Vietnamese', 'accesspress-root' ),
                'serif'                 => esc_html_x( 'Serif', 'font style', 'accesspress-root' ),
                'sans-serif'            => esc_html_x( 'Sans Serif', 'font style', 'accesspress-root' ),
                'monospace'             => esc_html_x( 'Monospace', 'font style', 'accesspress-root' ),
            );

            return $accesspress_root_config;

        }
    }
    add_filter( 'kirki/config', 'accesspress_root_kirki_i18n' );

    if(!function_exists('accesspress_root_kirki_fields')) {
        function accesspress_root_kirki_fields( $wp_customize ) {    
            /** added customizer panels*/
            load_template( dirname( __FILE__ ) . '/panel/accesspress-root-customizer.php', false);        
        }
    }
    add_filter( 'kirki/fields', 'accesspress_root_kirki_fields' );