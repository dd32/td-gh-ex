<?php

function theme_customize_register( $wp_customize ) {

    // Initial color
    $wp_customize->add_setting( 'initial_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'initial_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Initial color', 'northern-web-coders' ),
    ) ) );


    // Layout background
    $wp_customize->add_setting( 'layout_background', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'layout_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Layout background (article, aside and footer)', 'northern-web-coders' ),
    ) ) );


    // Layout color 
    $wp_customize->add_setting( 'layout_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'layout_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Layout color', 'northern-web-coders' ),
    ) ) );


    // Storytitle & Aside title border color 
    $wp_customize->add_setting( 'storytitleborder_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storytitleborder_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Storytitle & Aside title border color', 'northern-web-coders' ),
    ) ) );


    // Hamburger color
    $wp_customize->add_setting( 'hamburger_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hamburger_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Hamburger color', 'northern-web-coders' ),
    ) ) );


    // Hamburger checked color
    $wp_customize->add_setting( 'hamburgerchecked_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hamburgerchecked_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Hamburger checked color', 'northern-web-coders' ),
    ) ) );


    // Menu background
    $wp_customize->add_setting( 'menu_background', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Menu background', 'northern-web-coders' ),
    ) ) );


    // Menu color
    $wp_customize->add_setting( 'menu_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Menu color', 'northern-web-coders' ),
    ) ) );


    // Submenu background
    $wp_customize->add_setting( 'submenu_background', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Submenu background', 'northern-web-coders' ),
    ) ) );


    // Submenu color
    $wp_customize->add_setting( 'submenu_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Submenu color', 'northern-web-coders' ),
    ) ) );


    // Menuborder color
    $wp_customize->add_setting( 'menuborder_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menuborder_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Menuborder color', 'northern-web-coders' ),
    ) ) );


    // Submenuborder color
    $wp_customize->add_setting( 'submenuborder_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenuborder_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Submenuborder color', 'northern-web-coders' ),
    ) ) );


    // Arrow color
    $wp_customize->add_setting( 'arrow_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'arrow_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Arrow color', 'northern-web-coders' ),
    ) ) );


    // Second level arrow color
    $wp_customize->add_setting( 'slarrow_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slarrow_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Second level Arrow color', 'northern-web-coders' ),
    ) ) );


    // Mobile menu background
    $wp_customize->add_setting( 'mobile_menu_background', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile menu background', 'northern-web-coders' ),
    ) ) );


    // Mobile menu color
    $wp_customize->add_setting( 'mobile_menu_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile menu color', 'northern-web-coders' ),
    ) ) );


    // Mobile submenu background
    $wp_customize->add_setting( 'mobile_submenu_background', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_submenu_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile submenu background', 'northern-web-coders' ),
    ) ) );


    // Mobile submenu color
    $wp_customize->add_setting( 'mobile_submenu_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_submenu_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile submenu color', 'northern-web-coders' ),
    ) ) );


    // Mobile arrowbox background
    $wp_customize->add_setting( 'arrowbox_background', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'arrowbox_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile arrowbox background', 'northern-web-coders' ),
    ) ) );


    // Mobile arrow color
    $wp_customize->add_setting( 'mobile_arrow_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_arrow_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile arrow color', 'northern-web-coders' ),
    ) ) );


    // Mobile second arrowbox background
    $wp_customize->add_setting( 'secarrowbox_background', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secarrowbox_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile second arrowbox background', 'northern-web-coders' ),
    ) ) );


    // Mobile second arrow color
    $wp_customize->add_setting( 'mobile_secarrow_color', array(
      'default'   => '',
      'transport' => 'refresh','sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_secarrow_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Mobile second arrow color', 'northern-web-coders' ),
    ) ) );

}
add_action( 'customize_register', 'theme_customize_register' );



function theme_get_customizer_css() {
    ob_start();

    $initial_color = get_theme_mod( 'initial_color', '' );
    if ( ! empty( $initial_color ) ) {
      ?>
	header#header h1 a:first-letter
	{
		color:<?php echo $initial_color; ?>!important;
	}

      <?php
    }

    $layout_background = get_theme_mod( 'layout_background', '' );
    if ( ! empty( $layout_background ) ) {
      ?>
	#content, #content article, figure.wp-block-image figcaption, aside div.asidebox, footer, #respond p.form-submit input:hover
	{
		background:<?php echo $layout_background; ?>!important;
	}

      <?php
    }

    $layout_color = get_theme_mod( 'layout_color', '' );
    if ( ! empty( $layout_color ) ) {
      ?>
	#content, aside, .meta, article, article a, .wp-caption-text, .pagenav a, aside ul, aside a, #content table, pre, code, footer span, footer span a, h4.page-title, figcaption, .comment-body a, .comment-reply-title a, .logged-in-as a, #respond p.form-submit input, .woocommerce-Price-amount, time
	{
		color:<?php echo $layout_color; ?>!important;
	}
	hr, #content table td, #content table th
	{
		border-color:<?php echo $layout_color; ?>!important;
	}

      <?php
    }

    $storytitleborder_color = get_theme_mod( 'storytitleborder_color', '' );
    if ( ! empty( $storytitleborder_color ) ) {
      ?>
	h2.storytitle,
	aside h3
	{
		border-color:<?php echo $storytitleborder_color; ?>!important;
	}

      <?php
    }

    $hamburger_color = get_theme_mod( 'hamburger_color', '' );
    if ( ! empty( $hamburger_color ) ) {
      ?>
	label#expand-btn
	{
		border-color:<?php echo $hamburger_color; ?>!important;
	}

      <?php
    }


    $hamburgerchecked_color = get_theme_mod( 'hamburgerchecked_color', '' );
    if ( ! empty( $hamburgerchecked_color ) ) {
      ?>
	input[type="checkbox"]:checked ~ label#expand-btn
	{
		border-color:<?php echo $hamburgerchecked_color; ?>!important;
	}

      <?php
    }

    $menu_background = get_theme_mod( 'menu_background', '' );
    if ( ! empty( $menu_background ) ) {
      ?>
	#navbox nav
	{
		background:<?php echo $menu_background; ?>!important;
	}

      <?php
    }

    $menu_color = get_theme_mod( 'menu_color', '' );
    if ( ! empty( $menu_color ) ) {
      ?>
	nav a
	{
		color:<?php echo $menu_color; ?>!important;
	}

      <?php
    }

    $submenu_background = get_theme_mod( 'submenu_background', '' );
    if ( ! empty( $submenu_background ) ) {
      ?>
	nav ul.sub-menu, aside ul.sub-menu li a
	{
		background:<?php echo $submenu_background; ?>!important;
	}

      <?php
    }

    $submenu_color = get_theme_mod( 'submenu_color', '' );
    if ( ! empty( $submenu_color ) ) {
      ?>
	nav ul.sub-menu a, aside ul.menu ul.sub-menu li a
	{
		color:<?php echo $submenu_color; ?>!important;
	}

      <?php
    }

    $menuborder_color = get_theme_mod( 'menuborder_color', '' );
    if ( ! empty( $menuborder_color ) ) {
      ?>
	nav li, aside ul.menu li a
	{
		border-color:<?php echo $menuborder_color; ?>!important;
	}

	@media only screen and (max-width: 940px) {
		nav ul.sub-menu
			{
				border-color:<?php echo $menuborder_color; ?>!important;
			}
	}

      <?php
    }


    $submenuborder_color = get_theme_mod( 'submenuborder_color', '' );
    if ( ! empty( $submenuborder_color ) ) {
      ?>
	nav li li, nav ul li li li, ul.sub-menu:last-child, aside ul.menu li li, aside ul.menu ul.sub-menu li a
	{
		border-color:<?php echo $submenuborder_color; ?>!important;
	}

      <?php
    }


    $arrow_color = get_theme_mod( 'arrow_color', '' );
    if ( ! empty( $arrow_color ) ) {
      ?>
	nav li label.arrow
	{
		color:<?php echo $arrow_color; ?>!important;
	}

      <?php
    }


    $slarrow_color = get_theme_mod( 'slarrow_color', '' );
    if ( ! empty( $slarrow_color ) ) {
      ?>
	nav li li label.arrow
	{
		color:<?php echo $slarrow_color; ?>!important;
	}

      <?php
    }


    $mobile_menu_background = get_theme_mod( 'mobile_menu_background', '' );
    if ( ! empty( $mobile_menu_background ) ) {
      ?>

	@media only screen and (max-width: 940px) {
		nav ul.menu
		{
		background:<?php echo $mobile_menu_background; ?>!important;
		}
	}

      <?php
    }

    $mobile_menu_color = get_theme_mod( 'mobile_menu_color', '' );
    if ( ! empty( $mobile_menu_color ) ) {
      ?>
	
	@media only screen and (max-width: 940px) {
		nav ul.menu a
		{
		color:<?php echo $mobile_menu_color; ?>!important;
		}
	}

      <?php
    }

    $mobile_submenu_background = get_theme_mod( 'mobile_submenu_background', '' );
    if ( ! empty( $mobile_submenu_background ) ) {
      ?>
	@media only screen and (max-width: 940px) {
	nav ul.sub-menu
	{
		background:<?php echo $mobile_submenu_background; ?>!important;
	}
	}


      <?php
    }

    $mobile_submenu_color = get_theme_mod( 'mobile_submenu_color', '' );
    if ( ! empty( $mobile_submenu_color ) ) {
      ?>
        @media only screen and (max-width: 940px) {
	nav ul.sub-menu a
	{
		color:<?php echo $mobile_submenu_color; ?>!important;
	}}

      <?php
    }

    $arrowbox_background = get_theme_mod( 'arrowbox_background', '' );
    if ( ! empty( $arrowbox_background ) ) {
      ?>
	@media only screen and (max-width: 940px) {
	nav li label.arrow
	{
		background:<?php echo $arrowbox_background; ?>!important;
	}}

      <?php
    }

    $mobile_arrow_color = get_theme_mod( 'mobile_arrow_color', '' );
    if ( ! empty( $mobile_arrow_color ) ) {
      ?>
	@media only screen and (max-width: 940px) {
	nav li label.arrow
	{
		color:<?php echo $mobile_arrow_color; ?>!important;
	}}

      <?php
    }

    $secarrowbox_background = get_theme_mod( 'secarrowbox_background', '' );
    if ( ! empty( $secarrowbox_background ) ) {
      ?>
	@media only screen and (max-width: 940px) {
	nav li li label.arrow
	{
		background:<?php echo $secarrowbox_background; ?>!important;
	}}

      <?php
    }

    $mobile_secarrow_color = get_theme_mod( 'mobile_secarrow_color', '' );
    if ( ! empty( $mobile_secarrow_color ) ) {
      ?>
	@media only screen and (max-width: 940px) {
	nav li li label.arrow
	{
		color:<?php echo $mobile_secarrow_color; ?>!important;
	}}

      <?php
    }

    $css = ob_get_clean();
    return $css;
}


// Modify our styles registration like so:
function theme_enqueue_styles() {
  wp_enqueue_style( 'theme-styles', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
  $custom_css = theme_get_customizer_css();
  wp_add_inline_style( 'theme-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

