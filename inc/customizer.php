<?php
/**
 * Simple Life Theme Customizer
 *
 * @package Simple Life
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_life_customize_register( $wp_customize ) {

  global $simple_life_default_options;

  if ( ! function_exists( 'simple_life_customizer_validate_excerpt_length' ) ) {
    function simple_life_customizer_validate_excerpt_length($input){
      if ( intval( $input ) < 1 ) {
        $input = 40;
      }
      return $input;
    }
  }
  if ( ! function_exists( 'simple_life_customizer_validate_read_more_text' ) ) {
    function simple_life_customizer_validate_read_more_text($input){
      if ( empty( $input ) ) {
        $input = __( 'Read more', 'simple-life' );
      }
      return $input;
    }
  }

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  // Add Panel
  $wp_customize->add_panel( 'simple_life_options_panel',
     array(
        'title'       => __( 'Simple Life Options', 'simple-life' ),
        'priority'    => 100,
        'capability'  => 'edit_theme_options',
     )
  );

  // General Section
  $wp_customize->add_section( 'simple_life_options_general',
     array(
        'title'      => __( 'General', 'simple-life' ),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'simple_life_options_panel',
     )
  );

  // site_layout
  $wp_customize->add_setting( 'simple_life_options[site_layout]',
     array(
        'default'              => $simple_life_default_options['site_layout'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[site_layout]', array(
          'label'    => __( 'Site Layout', 'simple-life' ),
          'section'  => 'simple_life_options_general',
          'type'     => 'select',
          'priority' => 105,
          'choices'  => array(
            'content-sidebar' => __( 'Content-Sidebar', 'simple-life' ),
            'sidebar-content' => __( 'Sidebar-Content', 'simple-life' ),
            'full-width'      => __( 'Full Width', 'simple-life' ),
            ),
  ));

  // content_layout
  $wp_customize->add_setting( 'simple_life_options[content_layout]',
     array(
        'default'              => $simple_life_default_options['content_layout'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[content_layout]', array(
          'label'    => __( 'Content Layout', 'simple-life' ),
          'section'  => 'simple_life_options_general',
          'type'     => 'select',
          'priority' => 115,
          'choices'  => array(
            'full'          => __( 'Full Post', 'simple-life' ),
            'excerpt'       => __( 'Excerpt', 'simple-life' ),
            'excerpt-thumb' => __( 'Excerpt with thumbnail', 'simple-life' ),
            ),
  ));

  // Blog Section
  $wp_customize->add_section( 'simple_life_options_blog',
     array(
        'title'      => __( 'Blog', 'simple-life' ),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'simple_life_options_panel',
     )
  );

  // read_more_text
  $wp_customize->add_setting( 'simple_life_options[read_more_text]',
     array(
        'default'              => $simple_life_default_options['read_more_text'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'simple_life_customizer_validate_read_more_text',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[read_more_text]', array(
        'label'    => __( 'Read more text', 'simple-life' ),
        'section'  => 'simple_life_options_blog',
        'type'     => 'text',
        'priority' => 210,
  ));

  // excerpt_length
  $wp_customize->add_setting( 'simple_life_options[excerpt_length]',
     array(
        'default'              => $simple_life_default_options['excerpt_length'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'simple_life_customizer_validate_excerpt_length',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[excerpt_length]', array(
          'label'    => __( 'Excerpt Length', 'simple-life' ),
          'section'  => 'simple_life_options_blog',
          'type'     => 'text',
          'priority' => 220,
  ));

  // Footer Section
  $wp_customize->add_section( 'simple_life_options_footer',
     array(
        'title'      => __( 'Footer', 'simple-life' ),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'simple_life_options_panel',
     )
  );

  // footer_widgets
  $wp_customize->add_setting( 'simple_life_options[footer_widgets]',
     array(
        'default'              => $simple_life_default_options['footer_widgets'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[footer_widgets]', array(
          'label'    => __( 'Footer Widgets', 'simple-life' ),
          'section'  => 'simple_life_options_footer',
          'type'     => 'select',
          'priority' => 905,
          'choices'  => array(
            '0' => __( 'No Widget', 'simple-life' ),
            '1' => sprintf( __( '%s Widget', 'simple-life' ), 1 ),
            '2' => sprintf( __( '%s Widgets', 'simple-life' ), 2 ),
            '3' => sprintf( __( '%s Widgets', 'simple-life' ), 3 ),
            '4' => sprintf( __( '%s Widgets', 'simple-life' ), 4 ),
            '6' => sprintf( __( '%s Widgets', 'simple-life' ), 6 ),
            ),
  ));

  // copyright_text
  $wp_customize->add_setting( 'simple_life_options[copyright_text]',
     array(
        'default'              => $simple_life_default_options['copyright_text'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
        'transport'            => 'postMessage',
     )
  );
  $wp_customize->add_control('simple_life_options[copyright_text]', array(
          'label'    => __( 'Copyright text', 'simple-life' ),
          'section'  => 'simple_life_options_footer',
          'type'     => 'text',
          'priority' => 910,
  ));

  // powered_by
  $wp_customize->add_setting( 'simple_life_options[powered_by]',
     array(
        'default'              => $simple_life_default_options['powered_by'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[powered_by]', array(
          'label'    => __( 'Show Powered By', 'simple-life' ),
          'section'  => 'simple_life_options_footer',
          'type'     => 'checkbox',
          'priority' => 920,
  ));

  // go_to_top
  $wp_customize->add_setting( 'simple_life_options[go_to_top]',
     array(
        'default'              => $simple_life_default_options['go_to_top'],
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[go_to_top]', array(
          'label'    => __( 'Enable Go To Top', 'simple-life' ),
          'section'  => 'simple_life_options_footer',
          'type'     => 'checkbox',
          'priority' => 920,
  ));



}
add_action( 'customize_register', 'simple_life_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simple_life_customize_preview_js() {
	wp_enqueue_script( 'simple_life_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simple_life_customize_preview_js' );

////////////////////////////////////////////////////////////////////


