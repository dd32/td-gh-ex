<?php

/**
 * Add Customizer Options for frontpage
 */

/**
 * Check for WP_Customizer_Control existence before adding custom control because WP_Customize_Control
 * is loaded on customizer page only
 *
 * @see _wp_customize_include()
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
  get_template_part( '/inc/customizer/class-customizer-toggle' );
}

/*******************************************************************************
 * Pannels
 ******************************************************************************/
function apex_business_general_setup( $wp_customize ) {

  // Add Panel Front Page
  $wp_customize->add_panel( 'apex-business-frontpage', array(
      'priority'       => 10,
      'capability'     => 'edit_theme_options',
      'title'          => __( 'Front Page Setup', 'apex-business' ),
      'description'    => '',
  ) );

/*******************************************************************************
 * Site Desctiption Switch
 ******************************************************************************/

  $wp_customize->add_setting( 'apex_business_site_description_switch_setting', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    'default'           => false
  ) );

  $wp_customize->add_control( new Apex_Business_Customizer_Toggle_Control( $wp_customize, 'apex-business-site-description-switch-control', array(
    'label'       => __( 'Enable Site Desctiption?', 'apex-business' ),
    'section'     => 'title_tagline',
    'settings'    => 'apex_business_site_description_switch_setting',
    'type'        => 'ios',
  ) ) );

/*******************************************************************************
 * Homepage Banner Section
 ******************************************************************************/

    $wp_customize->add_section( 'apex-business-banner-section', array(
      'title'       =>  __( 'Banner', 'apex-business' ),
      'priority'    =>  10,
      'panel'       =>  'apex-business-frontpage'
    ) );

    // Call banner page
    $wp_customize->add_setting( 'apex-business-banner-page-setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'apex-business-banner-page-control', array(
      'label'           => __( 'Banner Content', 'apex-business' ),
      'description'     =>  __( 'Select from your existing pages for banner content. Add Featured image to the page for the Background image.', 'apex-business' ),
      'section'         => 'apex-business-banner-section',
      'settings'        => 'apex-business-banner-page-setting',
      'type'            => 'dropdown-pages'
    ) ) );

    $wp_customize->selective_refresh->add_partial( "apex-business-banner-page-partial", array(
        'selector'            => '.ct-banner-title',
        'container_inclusive' => true,
        'settings'            => 'apex-business-banner-page-setting',
    ) );

/*******************************************************************************
 * Info Boxes
 ******************************************************************************/

    $wp_customize->add_section( 'apex-business-info-boxes-section', array(
      'title'       =>  __( 'Info Boxes', 'apex-business' ),
      'priority'    =>  20,
      'panel'       =>  'apex-business-frontpage'
    ) );

    // Info Boxes Switch
    $wp_customize->add_setting( 'apex-business-info-boxes-switch-setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
      'default'           => true
    ) );

    $wp_customize->add_control( new Apex_Business_Customizer_Toggle_Control( $wp_customize, 'apex-business-info-boxes-switch-control', array(
      'label'       => __( 'Enable Info Boxes?', 'apex-business' ),
      'section'     => 'apex-business-info-boxes-section',
      'settings'    => 'apex-business-info-boxes-switch-setting',
      'type'        => 'ios',
    ) ) );

    // Call Info Box page
    $wp_customize->add_setting( 'apex-business-info-boxes-setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    for ( $apex_business_count = 1; $apex_business_count < 4; $apex_business_count++ ) {
        // Call info box pages
        $wp_customize->add_setting( "apex-business-info-boxes-setting-$apex_business_count", array(
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'absint'
        ) );

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "apex-business-info-boxes-control-$apex_business_count", array(
          /* Translators: %s: Page number */
          'label'           => sprintf( __( 'Select Page %s', 'apex-business' ), $apex_business_count ),
          'description' =>  __( 'Select from your existing pages for info box title.', 'apex-business' ),
          'section'         => 'apex-business-info-boxes-section',
          'settings'        => "apex-business-info-boxes-setting-$apex_business_count",
          'type'            => 'dropdown-pages',
          'active_callback' => 'apex_business_flag_is_info_boxes_switch',
        ) ) );

        // Info Boxes Icon - Text Field
        $wp_customize->add_setting( "apex-business-info-boxes-icon-setting-$apex_business_count", array(
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
          'default'           =>  'fa-globe'
        ) );

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "apex-business-info-boxes-icon-control-$apex_business_count", array(
          /* Translators: %s: Icon numbers */
          'label'           => sprintf( __( 'Icon %s', 'apex-business' ), $apex_business_count ),
          /* Translators: %s: Font Awesome url */
          'description'     => sprintf( __( 'Please input icon as eg: fa-star. Find Font-awesome icons %1$shere%2$s', 'apex-business' ), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
          'section'         => 'apex-business-info-boxes-section',
          'settings'        => "apex-business-info-boxes-icon-setting-$apex_business_count",
          'type'            => 'text',
          'active_callback' => 'apex_business_flag_is_info_boxes_switch',
        ) ) );

        $wp_customize->selective_refresh->add_partial( "apex-business-info-boxes-partial-$apex_business_count", array(
            'selector'            => ".blurb-title-$apex_business_count",
            'container_inclusive' => true,
            'settings'            => "apex-business-info-boxes-setting-$apex_business_count",
        ) );
    }

/*******************************************************************************
 * Homepage Introduction Section
 ******************************************************************************/

    $wp_customize->add_section( 'apex-business-introduction-section', array(
      'title'       =>  __( 'Introduction', 'apex-business' ),
      'priority'    =>  30,
      'panel'       =>  'apex-business-frontpage'
    ) );

    // Introduction Switch
    $wp_customize->add_setting( 'apex-business-introduction-switch-setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
      'default'           => true
    ) );

    $wp_customize->add_control( new Apex_Business_Customizer_Toggle_Control( $wp_customize, 'apex-business-introduction-switch-control', array(
      'label'       => __( 'Enable Introduction?', 'apex-business' ),
      'section'     => 'apex-business-introduction-section',
      'settings'    => 'apex-business-introduction-switch-setting',
      'type'        => 'ios',
    ) ) );

    // Call Introduction page
    $wp_customize->add_setting( 'apex-business-introduction-page-setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'apex-business-introduction-page-control', array(
      'label'           => __( 'Introduction Content', 'apex-business' ),
      'description'     =>  __( 'Select from your existing pages for introduction content. Add Featured image to the page for the display image.', 'apex-business' ),
      'section'         => 'apex-business-introduction-section',
      'settings'        => 'apex-business-introduction-page-setting',
      'type'            => 'dropdown-pages',
      'active_callback' => 'apex_business_flag_is_introduction_switch',
    ) ) );

    $wp_customize->selective_refresh->add_partial( "apex-business-introduction-page-partial", array(
        'selector'            => '.ct-intro-prime-title',
        'container_inclusive' => true,
        'settings'            => 'apex-business-introduction-page-setting',
    ) );

 /*******************************************************************************
 * Homepage Portfolio Section
 ******************************************************************************/
      $wp_customize->add_section( 'apex-business-portfolio-section', array(
        'title'       =>  __( 'Portfolio', 'apex-business' ),
        'priority'    =>  40,
        'panel'       =>  'apex-business-frontpage'
      ) );

      // News Switch
      $wp_customize->add_setting( 'apex-business-portfolio-switch-setting', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'           => true
      ) );

      $wp_customize->add_control( new Apex_Business_Customizer_Toggle_Control( $wp_customize, 'apex-business-portfolio-switch-control', array(
        'label'       => __( 'Enable Introduction?', 'apex-business' ),
        'section'     => 'apex-business-portfolio-section',
        'settings'    => 'apex-business-portfolio-switch-setting',
        'type'        => 'ios',
      ) ) );

      // Portfolio Title - Text Field
      $wp_customize->add_setting( 'apex-business-portfolio-title-setting', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'apex-business-portfolio-title-control', array(
        'label'           => __( 'News Title', 'apex-business' ),
        'section'         => 'apex-business-portfolio-section',
        'settings'        => 'apex-business-portfolio-title-setting',
        'type'            => 'text',
        'active_callback' => 'apex_business_flag_is_portfolio_switch',
      ) ) );

      $wp_customize->selective_refresh->add_partial( "apex-business-portfolio-title-partial", array(
          'selector'            => ".ct-portfolio-title",
          'container_inclusive' => true,
          'settings'            => "apex-business-portfolio-title-setting",
      ) );

      for ( $apex_business_count = 1; $apex_business_count < 9; $apex_business_count++ ) {
          // Call portfolio pages
          $wp_customize->add_setting( "apex-business-portfolio-setting-$apex_business_count", array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
          ) );

          $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "apex-business-portfolio-control-$apex_business_count", array(
            /* Translators: %s: Page number */
            'label'           => sprintf( __( 'Select Page %s', 'apex-business' ), $apex_business_count ),
            'description' =>  __( 'Select from your existing pages for info box title.', 'apex-business' ),
            'section'         => 'apex-business-portfolio-section',
            'settings'        => "apex-business-portfolio-setting-$apex_business_count",
            'type'            => 'dropdown-pages',
            'active_callback' => 'apex_business_flag_is_portfolio_switch',
          ) ) );

          $wp_customize->selective_refresh->add_partial( "apex-business-portfolio-partial-$apex_business_count", array(
              'selector'            => ".ct-portfolio-sr-$apex_business_count",
              'container_inclusive' => true,
              'settings'            => "apex-business-portfolio-setting-$apex_business_count",
          ) );
      }

/*******************************************************************************
 * Homepage News Section
 ******************************************************************************/

    $wp_customize->add_section( 'apex-business-news-section', array(
      'title'       =>  __( 'News', 'apex-business' ),
      'priority'    =>  50,
      'panel'       =>  'apex-business-frontpage'
    ) );

    // News Switch
    $wp_customize->add_setting( 'apex-business-news-switch-setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
      'default'           => true
    ) );

    $wp_customize->add_control( new Apex_Business_Customizer_Toggle_Control( $wp_customize, 'apex-business-news-switch-control', array(
      'label'       => __( 'Enable Introduction?', 'apex-business' ),
      'section'     => 'apex-business-news-section',
      'settings'    => 'apex-business-news-switch-setting',
      'type'        => 'ios',
    ) ) );

    // News Title - Text Field
    $wp_customize->add_setting( 'apex-business-news-title-setting', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'apex-business-news-title-control', array(
      'label'           => __( 'News Title', 'apex-business' ),
      'section'         => 'apex-business-news-section',
      'settings'        => 'apex-business-news-title-setting',
      'type'            => 'text',
      'active_callback' => 'apex_business_flag_is_news_switch',
    ) ) );

    $wp_customize->selective_refresh->add_partial( "apex-business-news-title-partial", array(
        'selector'            => ".ct-news-title",
        'container_inclusive' => true,
        'settings'            => "apex-business-news-title-setting",
    ) );
}

add_action( 'customize_register', 'apex_business_general_setup' );

get_template_part( '/inc/customizer/active-callbacks' );
