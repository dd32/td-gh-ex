<?php
/**
 * App Landing Page functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package App_Landing_Page
 */


//define theme version
if ( ! defined( 'APP_LANDING_PAGE_THEME_VERSION' ) && ! defined( 'APP_LANDING_PAGE_THEME_NAME' ) && ! defined( 'APP_LANDING_PAGE_THEME_TEXTDOMAIN' ) ) {
	$theme_data = wp_get_theme();	
	define( 'APP_LANDING_PAGE_THEME_VERSION', $theme_data->get( 'Version' ) );
    define( 'APP_LANDING_PAGE_THEME_NAME', $theme_data->get( 'Name' ) );
    define( 'APP_LANDING_PAGE_THEME_TEXTDOMAIN', $theme_data->get( 'TextDomain' ) );
}
/**
 * Implement the Custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the WordPress Hooks.
 */
require get_template_directory() . '/inc/wp-hooks.php';

/**
 * Custom template function for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template hooks for this theme.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Meta Box.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Widget
 */
require get_template_directory() . '/inc/widgets/widgets.php';
/**
 * Info 
 */
require get_template_directory() . '/inc/customizer/info.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}