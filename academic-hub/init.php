<?php
/**
 * The academic hub enqueu file for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Academic Hub
 */

if( !function_exists('academic_hub_file_directory') ){

    function academic_hub_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }//end condtion
    }
}


/*=========================================================================
 * Breadcrumb Trail - A breadcrumb menu script for WordPress.
==========================================================================*/
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/compatibility/class-breadcrumb-trail.php');

/*=========================================================================
=                         Core File Require
==========================================================================*/
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/core/custom-header.php');
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/core/template-tags.php');
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/core/template-functions.php');
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/core/customizer.php');

 /**============================================================================
 * =                     Academic Hub Action Hooks
 * =============================================================================*/
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/hooks/academic-huc-action-hooks.php');
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/hooks/theme-hooks.php');

 /**============================================================================
 * =                             Plugin Activation 
 * =============================================================================*/
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/tgm-plugin-activation/class-tgm-plugin-activation.php');
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/tgm-plugin-activation/plugin-required-list.php');

/**============================================================================
 * =                        define theme version
 * =============================================================================*/
if ( ! defined( 'ACADEMIC_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();	
	define ( 'ACADEMIC_THEME_VERSION', $theme_data->get( 'Version' ) );
}


/**============================================================================
 * =                     Core Excerpt
 * =============================================================================*/
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/core/excerpt.php');





/**============================================================================
 * =                     Core Excerpt
 * =============================================================================*/
load_template(trailingslashit( get_template_directory() ) . 'academic-hub/template-functions.php');
