<?php
/**
 * Academic HubTheme Customizer
 *
 * @package Academic_Hub
 */

 //Call All Panel Section
$academic_hub_panels   = array( 'header','general', 'home' );
$academic_hub_sub_sections = array(
    'header'     => array( 'logo-brand','top-header' ),
    'home'       => array('slider','academic-notice','academic-about','academic-special-info','academic-event','academic-blog','sort'),
    'general'    => array( 'basic' ),
);

foreach( $academic_hub_panels as $panel ){
    load_template(trailingslashit( get_template_directory() ) . 'academic-hub/customizer/panels/' . $panel . '.php');
}

foreach( $academic_hub_sub_sections as $k => $v ){
    foreach( $v as $w ){    
        load_template(trailingslashit( get_template_directory() ) . 'academic-hub/customizer/panels/' . $k . '/' . $w . '.php');
    }
}

/**
 * Basic Js File enqueue Section
 */
function academic_hub_customize_preview_js() {
	wp_enqueue_style( 'academic-hub-customizer', get_template_directory_uri() . '/academic-hub/customizer/css/customizer.css', array(), ACADEMIC_THEME_VERSION );
    wp_enqueue_script( 'academic_hub_customizer', get_template_directory_uri() . '/academic-hub/customizer/js/customizer.js', array( 'customize-preview', 'customize-selective-refresh' ), ACADEMIC_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'academic_hub_customize_preview_js' );


function academic_hub_customizer_scripts() {
    wp_enqueue_style( 'academic-hub-customize',get_template_directory_uri().'/academic-hub/customizer/css/customize.css', ACADEMIC_THEME_VERSION, 'screen' );
    wp_enqueue_script( 'academic-hub-customize', get_template_directory_uri() . '/academic-hub/customizer/js/customize-homepage.js', array( 'jquery' ), ACADEMIC_THEME_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'academic_hub_customizer_scripts' );



/**
 * Sanitize callback for checkbox
*/
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/customizer/sanitization-functions.php');
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/customizer/customizer-callback.php');