<?php
/**
 * Add sections
 */


/* adding Header Options section*/
Kirki::add_section( 'bestblog_upgradepro_options', array(
    'title'          =>esc_attr__( 'About Theme Info ', 'best-blog' ),
     'panel'          => 'upgradepro_options', // Not typically needed.
    'priority'       => 1,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_section( 'bestblog_appearance_options', array(
    'title'          =>esc_attr__( 'Site Appearance', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-admin-customizer'
) );

Kirki::add_section( 'bestblog_header_options', array(
    'title'          =>esc_attr__( 'Header Options', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );

// slider options
Kirki::add_section( 'bestblog_slider_settings', array(
    'title'          =>esc_attr__( 'Slider Options ', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-format-gallery'
) );

Kirki::add_section( 'bestblog_postlayout_settings', array(
    'title'          =>esc_attr__( 'Post layout Options ', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 3,
      'icon' => 'dashicons-layout'
) );

Kirki::add_section( 'bestblog_copyright_settings', array(
    'title'          =>esc_attr__( 'Footer Options ', 'best-blog' ),
     'panel'          => 'bestblog_theme_options', // Not typically needed.
    'priority'       => 3,
    'icon' => 'dashicons-feedback'
) );
