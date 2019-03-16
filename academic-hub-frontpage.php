<?php
/**
 * Front Page Template
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Front Page Template
 * @package Academic_Hub
 */

get_header(); 

if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
    load_template(get_home_template());
    
}else{ 
    /**
     * Homepage Sort Section
     * 
     * @since 1.0.0
     */
    $defaults = array(
                'academic_hub_slider',
                'academic_hub_notices',
                'academic_hub_special_info_section',
                'academic_hub_event',
                'academic_hub_blog',
                'academic_hub_about_us'
            );
    foreach( get_theme_mod('academic_hub_home_page_sort',$defaults) as $homepage_item ){
        $homepage_function = $homepage_item;
        $homepage_function();
    }
}
get_footer();