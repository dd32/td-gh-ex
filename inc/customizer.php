<?php
/**
 * AccessPress Lite Theme Customizer
 *
 * @package AccessPress Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function accesspress_lite_customize_register( $wp_customize ) {

    /** Default Settings */        
    $wp_customize->add_panel( 
        'accesspress_lite_default_panel',
         array(
            'priority' => 5,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Default Settings', 'accesspress-lite' ),
            'description' => esc_html__( 'Setup default WordPress Customizer options.', 'accesspress-lite' ),
        ) 
    );
    
    $wp_customize->get_section( 'title_tagline' )->panel     = 'accesspress_lite_default_panel';
    $wp_customize->get_section( 'colors' )->panel            = 'accesspress_lite_default_panel';
    $wp_customize->get_section( 'header_image' )->panel      = 'accesspress_lite_default_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'accesspress_lite_default_panel';    
    $wp_customize->get_section( 'static_front_page' )->panel = 'accesspress_lite_default_panel';
    $wp_customize->get_section( 'custom_css' )->panel = 'accesspress_lite_default_panel';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    require trailingslashit( get_template_directory() ) . '/inc/admin-panel/accesspress-lite-sanitize.php';
}
add_action( 'customize_register', 'accesspress_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function accesspress_lite_customize_preview_js() {
	wp_enqueue_script( 'accesspress_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'accesspress_lite_customize_preview_js' );


if( !function_exists('accesspress_lite_category_lists')){
    function accesspress_lite_category_lists(){
        $accesspress_lite_category   =   get_categories();
        $accesspress_lite_cat_list   =   array();
        $accesspress_lite_cat_list[0]=   esc_html__('Select Category','accesspress-lite');
        foreach ($accesspress_lite_category as $accesspress_lite_cat) {
            $accesspress_lite_cat_list[$accesspress_lite_cat->term_id]    =   $accesspress_lite_cat->name;
        }
        return $accesspress_lite_cat_list;
    }
}
if( !function_exists('accesspress_lite_post_list')){
    function accesspress_lite_post_list(){
        $allposts  =   new WP_Query( array( 'post_type' => 'post','posts_per_page' => -1 ));
        $post_list   =   array();
        $post_list[0]=   esc_html__('Select Post','accesspress-lite');
        while($allposts->have_posts()) {
            $allposts->the_post();
            $post_list[get_the_ID()]    =   get_the_title();
        }
        return $post_list;
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
if(!function_exists('accesspress_lite_kirki_i18n')){
    function accesspress_lite_kirki_i18n( $accesspress_lite_config ) {

        $accesspress_lite_config['i18n'] = array(
            'background-color'      => esc_html__( 'Background Color', 'accesspress-lite' ),
            'background-image'      => esc_html__( 'Background Image', 'accesspress-lite' ),
            'no-repeat'             => esc_html__( 'No Repeat', 'accesspress-lite' ),
            'repeat-all'            => esc_html__( 'Repeat All', 'accesspress-lite' ),
            'repeat-x'              => esc_html__( 'Repeat Horizontally', 'accesspress-lite' ),
            'repeat-y'              => esc_html__( 'Repeat Vertically', 'accesspress-lite' ),
            'inherit'               => esc_html__( 'Inherit', 'accesspress-lite' ),
            'background-repeat'     => esc_html__( 'Background Repeat', 'accesspress-lite' ),
            'cover'                 => esc_html__( 'Cover', 'accesspress-lite' ),
            'contain'               => esc_html__( 'Contain', 'accesspress-lite' ),
            'background-size'       => esc_html__( 'Background Size', 'accesspress-lite' ),
            'fixed'                 => esc_html__( 'Fixed', 'accesspress-lite' ),
            'scroll'                => esc_html__( 'Scroll', 'accesspress-lite' ),
            'background-attachment' => esc_html__( 'Background Attachment', 'accesspress-lite' ),
            'left-top'              => esc_html__( 'Left Top', 'accesspress-lite' ),
            'left-center'           => esc_html__( 'Left Center', 'accesspress-lite' ),
            'left-bottom'           => esc_html__( 'Left Bottom', 'accesspress-lite' ),
            'right-top'             => esc_html__( 'Right Top', 'accesspress-lite' ),
            'right-center'          => esc_html__( 'Right Center', 'accesspress-lite' ),
            'right-bottom'          => esc_html__( 'Right Bottom', 'accesspress-lite' ),
            'center-top'            => esc_html__( 'Center Top', 'accesspress-lite' ),
            'center-center'         => esc_html__( 'Center Center', 'accesspress-lite' ),
            'center-bottom'         => esc_html__( 'Center Bottom', 'accesspress-lite' ),
            'background-position'   => esc_html__( 'Background Position', 'accesspress-lite' ),
            'background-opacity'    => esc_html__( 'Background Opacity', 'accesspress-lite' ),
            'ON'                    => esc_html__( 'ON', 'accesspress-lite' ),
            'OFF'                   => esc_html__( 'OFF', 'accesspress-lite' ),
            'all'                   => esc_html__( 'All', 'accesspress-lite' ),
            'cyrillic'              => esc_html__( 'Cyrillic', 'accesspress-lite' ),
            'cyrillic-ext'          => esc_html__( 'Cyrillic Extended', 'accesspress-lite' ),
            'devanagari'            => esc_html__( 'Devanagari', 'accesspress-lite' ),
            'greek'                 => esc_html__( 'Greek', 'accesspress-lite' ),
            'greek-ext'             => esc_html__( 'Greek Extended', 'accesspress-lite' ),
            'khmer'                 => esc_html__( 'Khmer', 'accesspress-lite' ),
            'latin'                 => esc_html__( 'Latin', 'accesspress-lite' ),
            'latin-ext'             => esc_html__( 'Latin Extended', 'accesspress-lite' ),
            'vietnamese'            => esc_html__( 'Vietnamese', 'accesspress-lite' ),
            'serif'                 => esc_html_x( 'Serif', 'font style', 'accesspress-lite' ),
            'sans-serif'            => esc_html_x( 'Sans Serif', 'font style', 'accesspress-lite' ),
            'monospace'             => esc_html_x( 'Monospace', 'font style', 'accesspress-lite' ),
        );

        return $accesspress_lite_config;

    }
}
add_filter( 'kirki/config', 'accesspress_lite_kirki_i18n' );

if(!function_exists('accesspress_lite_kirki_fields')) {
    function accesspress_lite_kirki_fields( $wp_customize ) {    
        /** added customizer panels*/
        load_template( dirname( __FILE__ ) . '/admin-panel/accesspress-lite-customizer.php', false);        
    }
}
add_filter( 'kirki/fields', 'accesspress_lite_kirki_fields' );