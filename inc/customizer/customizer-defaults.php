<?php
/**
 * Default theme options.
 *
 * @package arrival
 */

if (!function_exists('arrival_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function arrival_get_default_theme_options() {
    $prefix = 'arrival';
    $defaults = array();
    
    $defaults[$prefix.'_top_header_enable'] = 'on';
    $defaults[$prefix.'_top_header_email'] = 'webmaster@example.com';
    $defaults[$prefix.'_top_header_phone'] = '+977-9877-998769';
    $defaults[$prefix.'_top_right_header_content'] = 'menus';
    $defaults[$prefix.'_top_right_header_menus'] = 'top';
    $defaults[$prefix.'_main_nav_layout'] = 'boxed';
    $defaults[$prefix.'_main_nav_right_content'] = 'search';
    $defaults[$prefix.'_main_nav_right_btn'] = 0;
    $defaults[$prefix.'_one_page_menus'] = 'no';
    $defaults[$prefix.'_footer_widget_enable'] = 'yes';
    $defaults[$prefix.'_lazyload_image_enable'] = 'yes';
    $defaults[$prefix.'_theme_color'] = '#50bcda';
   

   

    // Pass through filter.
    $defaults = apply_filters('arrival_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
