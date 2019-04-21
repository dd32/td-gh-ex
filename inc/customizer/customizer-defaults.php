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
    $defaults[$prefix.'_top_header_email'] = '';
    $defaults[$prefix.'_top_header_phone'] = '';
    $defaults[$prefix.'_top_right_header_content'] = 'menus';
    $defaults[$prefix.'_blog_layout'] = 'list-layout';
    $defaults[$prefix.'_top_right_header_menus'] = 'top';
    $defaults[$prefix.'_main_nav_layout'] = 'boxed';
    $defaults[$prefix.'_main_nav_right_content'] = 'search';
    $defaults[$prefix.'_main_nav_right_btn'] = 0;
    $defaults[$prefix.'_one_page_menus'] = 'no';
    $defaults[$prefix.'_footer_widget_enable'] = 'yes';
    $defaults[$prefix.'_footer_icons_enable'] = 'yes';
    $defaults[$prefix.'_lazyload_image_enable'] = 'yes';
    $defaults[$prefix.'_top_header_bg_color'] = '#E12454';
    $defaults[$prefix.'_main_nav_bg_color'] = '#fafafa';
    $defaults[$prefix.'_footer_bg_color'] = '#223645';
    $defaults[$prefix.'_footer_text_color'] = '#fff';
    $defaults[$prefix.'_footer_link_color'] = '#fff';
    $defaults[$prefix.'_footer_copyright_border_top'] = true;
    $defaults[$prefix.'_main_nav_menu_color'] = '#333';
    $defaults[$prefix.'_link_color'] = '#333';
    $defaults[$prefix.'_main_container_width'] = 1170;
    $defaults[$prefix.'_sidebar_width'] = 440;
    $defaults[$prefix.'_header_box_shadow_disable'] = false;
    $defaults[$prefix.'_blog_excerpts'] = 580;
    $defaults[$prefix.'_single_post_sidebars'] = 'right_sidebar';
    $defaults[$prefix.'_nav_font_weight'] = 500;
    $defaults[$prefix.'_top_header_txt_color'] = '#fff';
    $defaults[$prefix.'_theme_color'] = '#E12454';
   

   

    // Pass through filter.
    $defaults = apply_filters('arrival_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
