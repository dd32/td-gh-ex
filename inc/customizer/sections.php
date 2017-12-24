<?php
/**
 * Add sections
 */


/* adding Header Options section*/
Kirki::add_section( 'bestblog_appearance_options', array(
    'title'          =>esc_attr__( 'Site Appearance', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 1,
) );

Kirki::add_section( 'bestblog_header_options', array(
    'title'          =>esc_attr__( 'Header Options', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 1,
) );

// slider options
Kirki::add_section( 'bestblog_slider_settings', array(
    'title'          =>esc_attr__( 'Slider Options ', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 1,
) );

Kirki::add_section( 'bestblog_postlayout_settings', array(
    'title'          =>esc_attr__( 'Post layout Options ', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 3,
) );

Kirki::add_section( 'bestblog_copyright_settings', array(
    'title'          =>esc_attr__( 'Footer Options ', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 3,
) );
