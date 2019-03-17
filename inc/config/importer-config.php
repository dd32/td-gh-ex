<?php
/**
 * Initialize  Importer
 */
$asp = 'add_'.'submenu_'.'page';

$settings      = array(
  'menu_parent' => 'themes.php',
  'menu_title'  => esc_html__('Wpop Demo Importer', 'arrival'),
  'menu_type'   => $asp,
  'menu_slug'   => 'wpop-import',
);

$opt_id = 'theme_mods_arrival';

/**
 * Front Page & Blog Page are page name strings. hence cannot be translated here
 */

$options        = array(

    'corporate' => array(
      'title'         => esc_html__('Corporate', 'arrival'),
      'preview_url'   => 'http://demo.wpoperation.com/arrival/',
      'front_page'    => 'Home', 
      'blog_page'     => 'blogs',
      'menus'         => array(
          'primary' => esc_html__( 'Primary', 'arrival' ),
          'top' => esc_html__( 'secondary', 'arrival' ),
      ),
    ),

    'construction' => array(
      'title'         => esc_html__('Construction', 'arrival'),
      'preview_url'   => 'http://demo.wpoperation.com/arrival/demo-two',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blogs',
      'menus'         => array(
          'primary' => esc_html__( 'Primary', 'arrival' ),
      ),
    ),

    'education' => array(
      'title'         => esc_html__('Education', 'arrival'),
      'preview_url'   => 'http://demo.wpoperation.com/arrival/demo-four',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blogs',
      'menus'         => array(
          'primary' => esc_html__( 'Primary', 'arrival' ),
      ),
    ),

    'gym' => array(
      'title'         => esc_html__('Gym & Fitness', 'arrival'),
      'preview_url'   => 'http://demo.wpoperation.com/arrival/demo-one',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blogs',
      'menus'         => array(
          'primary' => esc_html__( 'Primary', 'arrival' ),
      ),
    ),

    'restaurant' => array(
      'title'         => esc_html__('Restaurant', 'arrival'),
      'preview_url'   => 'http://demo.wpoperation.com/arrival/demo-three',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blogs',
      'menus'         => array(
          'primary' => esc_html__( 'Primary', 'arrival' ),
      ),
    ),

);

if( class_exists( 'Wpop_Demo_Importer' ) ) {
    Wpop_Demo_Importer::instance( $settings, $options, $opt_id );
}


