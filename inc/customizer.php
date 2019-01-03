<?php
    /**
     * Absolutte Theme Customizer.
     *
     * @package Absolutte
     */

    /**
     * Configuration sample for the Kirki Customizer.
     * The function's argument is an array of existing config values
     * The function returns the array with the addition of our own arguments
     * and then that result is used in the kirki_config filter
     *
     * @param $config the configuration array
     *
     * @return array
     */
    function absolutte_kirki_configuration_styling( $config ) {
        return wp_parse_args( array(
            'disable_loader' => true,
        ), $config );
    }
    add_filter( 'kirki_config', 'absolutte_kirki_configuration_styling' );

    if ( class_exists( 'Kirki' ) ) {

        // Define Kirki Config
        Kirki::add_config( 'absolutte', array(
            'capability'  => 'edit_theme_options',
            'option_type' => 'theme_mod',
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'        => 'upload',
            'settings'    => 'absolutte_logo_contrast',
            'label'       => esc_html__( 'Logo Contrast', 'absolutte' ),
            'description' => esc_html__( 'You have the option to use a logo with different contrast, this is useful when you use one logo for your home page and other for the rest of the pages.', 'absolutte' ),
            'section'     => 'title_tagline',
            'default'     => '',
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'        => 'upload',
            'settings'    => 'absolutte_logo_small',
            'label'       => esc_html__( 'Logo Small', 'absolutte' ),
            'description' => esc_html__( 'This is used for the Side Header, which is smaller than the regular logo (Works best with 1:1 logos).', 'absolutte' ),
            'section'     => 'title_tagline',
            'default'     => '',
            'transport'   => 'auto',
            'output'      => array(
                array(
                    'element'  => '.absolutte-footer-image',
                    'property' => 'background-image',
                ),
            ),
        ) );

        /*
        Colors
        ===================================================== */
        /*
        Featured
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_featured_color',
            'label'     => esc_html__( 'Featured Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#6683e2',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => absolutte_featured_color(),
                    'property' => 'color',
                ),
                array(
                    'element'  => absolutte_featured_background_color(),
                    'property' => 'background-color',
                ),
                array(
                    'element'  => absolutte_featured_border_color(),
                    'property' => 'border-color',
                ),
            ),
        ) );

        /*
        Secondary
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_secondary_color',
            'label'     => esc_html__( 'Secondary Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#2fc77c',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => absolutte_secondary_color(),
                    'property' => 'color',
                ),
                array(
                    'element'  => absolutte_secondary_background_color(),
                    'property' => 'background-color',
                ),
                array(
                    'element'  => absolutte_secondary_border_color(),
                    'property' => 'border-color',
                ),
            ),
        ) );

        /*
        Headings Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_headings_color',
            'label'     => esc_html__( 'Headings Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#222222',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => 'h1:not(.site-title), h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
					.blog-hype #content .post .entry-header .post-title a:hover',
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Text Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_text_color',
            'label'     => esc_html__( 'Text Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#808080',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => 'body',
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Link Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_link_color',
            'label'     => esc_html__( 'Link Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#6683e2',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => 'a, .widget #menu-social li a',
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Title
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'     => 'custom',
            'settings' => 'absolutte_title_color_footer',
            'label'    => esc_html__( 'Footer Colors', 'absolutte' ),
            'section'  => 'colors',
        ) );

        /*
        Footer Background Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_footer_background',
            'label'     => esc_html__( 'Footer Background Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#f8f9fa',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '.footer-wrap',
                    'property' => 'background-color',
                ),
            ),
        ) );

        /*
        Sub Footer Background Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_footer_background',
            'label'     => esc_html__( 'Sub Footer Background Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#f8f9fa',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '.sub-footer',
                    'property' => 'background-color',
                ),
            ),
        ) );

        /*
        Footer Text Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_footer_text_color',
            'label'     => esc_html__( 'Footer Text Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#8c8c8c',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '#footer',
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Footer Title Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_footer_title_color',
            'label'     => esc_html__( 'Footer Titles Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#ffffff',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '#footer .footer-column .widget-title',
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Sub Footer Text Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_footer_title_color',
            'label'     => esc_html__( 'Sub Footer Text Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#737373',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '.sub-footer',
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Title
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'     => 'custom',
            'settings' => 'absolutte_title_color_header',
            'label'    => esc_html__( 'Header Colors', 'absolutte' ),
            'section'  => 'colors',
        ) );

        /*
        Header Background Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_bck_color',
            'label'     => esc_html__( 'Header Background Color', 'absolutte' ),
            'section'   => 'colors',
            'choices'   => array(
                'alpha' => true,
            ),
            'default'   => '#ffffff',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '#header, .absolutte-header-side-small #header, .single-product #header, .absolutte-sidenav #header, .top-bar, .single-product .top-bar',
                    'property' => 'background-color',
                ),
            ),
        ) );

        /*
        Logo Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_logo_color',
            'label'     => esc_html__( 'Logo Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#222222',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '#header .absolutte-logo-wrap .site-title .ql_logo, .absolutte-header-side-small #header .absolutte-logo-wrap .site-title .absolutte-logo-small',
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Header Text Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_header_text_color',
            'label'     => esc_html__( 'Header Text Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#8c8c8c',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.main-navigation a',
                        '#header',
                        '#header .absolutte-icons-nav-wrap ul li a',
                        '.absolutte-header-side-small #header .absolutte-header-side-btn-wrap #absolutte-header-side-btn',
                        '.absolutte-header-side-small #header .main-navigation a',
                        '.absolutte-header-side-small #header .absolutte-icons-nav-wrap ul li a',
                        '#header .nav_social li a',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Header Hover Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_header_hover_color',
            'label'     => esc_html__( 'Header Hover Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#4d4d4d',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.no-touch #header .absolutte-icons-nav-wrap ul li a:hover',
                        '.no-touch .main-navigation a:hover',
                        '.no-touch .absolutte-header-side-small #header .absolutte-header-side-btn-wrap #absolutte-header-side-btn:hover',
                        '.no-touch .absolutte-header-side-small #header .main-navigation a:hover',
                        '.no-touch .absolutte-header-side-small #header .absolutte-icons-nav-wrap ul li a:hover',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Header Lines Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_lines_color',
            'label'     => esc_html__( 'Header Lines Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#e5e5e5',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => '.absolutte-sidenav #header .ql_cart-btn,
					.absolutte-sidenav #header .absolutte-login-btn,
					#jqueryslidemenu ul.nav > li,
					.absolutte-sidenav #header .logo_container,
					.ql_cart-btn,
					#header,
					.single-product #header,
					.top-bar,
					.absolutte-sidenav #header,
					.logo_container::before,
					.absolutte-header-2 #header .logo_container::before,
					.absolutte-header-2 #header #ql_nav_collapse #jqueryslidemenu ul.nav > li,
					.absolutte-header-2 #header #ql_nav_collapse #jqueryslidemenu ul.nav > li:last-child,
					.absolutte-header-2 #header .ql_cart-btn,
					.absolutte-sidenav #header .main-navigation ul li,
					#header.absolutte-header-style-8 .absolutte-main-nav-wrap',
                    'property' => 'border-color',
                ),
                array(
                    'element'  => '#header .absolutte-icons-nav-wrap::before',
                    'property' => 'background-color',
                ),
            ),
        ) );

        /*
        Title
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'     => 'custom',
            'settings' => 'absolutte_title_color_submenu',
            'label'    => esc_html__( 'Sub Menu Colors', 'absolutte' ),
            'section'  => 'colors',
        ) );

        /*
        Sub Menu Background Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_submenu_bck_color',
            'label'     => esc_html__( 'Sub Menu Background Color', 'absolutte' ),
            'section'   => 'colors',
            'choices'   => array(
                'alpha' => true,
            ),
            'default'   => '#ffffff',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array( '.main-navigation ul ul', '.absolutte-mega-menu .main-navigation ul ul' ),
                    'property' => 'background-color',
                ),
            ),
        ) );

        /*
        Sub Menu Items Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_submenu_items_color',
            'label'     => esc_html__( 'Sub Menu Items Color', 'absolutte' ),
            'section'   => 'colors',
            'choices'   => array(
                'alpha' => true,
            ),
            'default'   => '#4d4d4d',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.absolutte-mega-menu .main-navigation ul ul li a',
                        '.main-navigation ul ul a',
                        '.absolutte-header-side-small #header .main-navigation ul ul a',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Sub Menu Description Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_submenu_description_color',
            'label'     => esc_html__( 'Sub Menu Description Color', 'absolutte' ),
            'section'   => 'colors',
            'choices'   => array(
                'alpha' => true,
            ),
            'default'   => '#b9b9b9',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array( '.main-navigation ul ul a .description', '.absolutte-mega-menu .main-navigation ul li a .description' ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Sub Menu Icons Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'        => 'color',
            'settings'    => 'absolutte_header_submenu_icons_color',
            'label'       => esc_html__( 'Sub Menu Icons Color', 'absolutte' ),
            'description' => esc_html__( 'If you add icons to menu items and use Icon Fonts.', 'absolutte' ),
            'section'     => 'colors',
            'default'     => '#6683e2',
            'transport'   => 'auto',
            'output'      => array(
                array(
                    'element'  => array(
                        '.menu-item i._mi',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Sub Menu Hover Background Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_submenu_hover_bck_color',
            'label'     => esc_html__( 'Sub Menu Hover Background Color', 'absolutte' ),
            'section'   => 'colors',
            'choices'   => array(
                'alpha' => true,
            ),
            'default'   => 'rgba(0,0,0,0.05)',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.no-touch .absolutte-mega-menu .main-navigation ul ul li a:hover',
                        '.no-touch .main-navigation ul ul a:hover',
                        '.no-touch .absolutte-header-side-small #header .main-navigation a:hover',
                    ),
                    'property' => 'background-color',
                ),
            ),
        ) );

        /*
        Sub Menu Hover Item Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_submenu_hover_item_color',
            'label'     => esc_html__( 'Sub Menu Hover Item Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#222222',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.no-touch .absolutte-mega-menu .main-navigation ul ul li a:hover',
                        '.no-touch .main-navigation ul ul a:hover',
                        '.no-touch .absolutte-header-side-small #header .main-navigation ul ul li a:hover',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Sub Menu Hover Description Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_header_submenu_hover_description_color',
            'label'     => esc_html__( 'Sub Menu Hover Description Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#9e9e9e',
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.no-touch .absolutte-mega-menu .main-navigation ul ul li a:hover .description',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Title
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'     => 'custom',
            'settings' => 'absolutte_title_color_side_panel',
            'label'    => esc_html__( 'Side Panel Colors', 'absolutte' ),
            'section'  => 'colors',
        ) );

        /*
        Side Panel Text Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_side_panel_text_color',
            'label'     => esc_html__( 'Side Panel Text Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#9E9E9E',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.absolutte-side-panel-wrap',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Side Panel Titles Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_side_panel_titles_color',
            'label'     => esc_html__( 'Side Panel Titles Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#FFFFFF',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.absolutte-side-panel-wrap .absolutte-side-panel-content .widget .widget-title',
                    ),
                    'property' => 'color',
                ),
            ),
        ) );

        /*
        Side Panel Background Color
        ------------------------------ */
        Kirki::add_field( 'absolutte', array(
            'type'      => 'color',
            'settings'  => 'absolutte_sub_side_panel_background_color',
            'label'     => esc_html__( 'Side Panel Background Color', 'absolutte' ),
            'section'   => 'colors',
            'default'   => '#272727',
            'choices'   => array(
                'alpha' => true,
            ),
            'transport' => 'auto',
            'output'    => array(
                array(
                    'element'  => array(
                        '.absolutte-side-panel-wrap',
                    ),
                    'property' => 'background-color',
                ),
            ),
        ) );

        /*
        Site Options
        ===================================================== */
        Kirki::add_section( 'absolutte_site_options_section', array(
            'title'    => esc_html__( 'Site Options', 'absolutte' ),
            'priority' => 140,
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'     => 'switch',
            'settings' => 'absolutte_site_animations',
            'label'    => esc_html__( 'Enable/Disable Site Animations', 'absolutte' ),
            'section'  => 'absolutte_site_options_section',
            'default'  => '1',
            'choices'  => array(
                'on'  => esc_html__( 'On', 'absolutte' ),
                'off' => esc_html__( 'Off', 'absolutte' ),
            ),
        ) );

        /*
        Typography
        ------------------------------ */
        Kirki::add_section( 'absolutte_typography_section', array(
            'title'    => esc_html__( 'Typography', 'absolutte' ),
            'priority' => 150,
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'     => 'select',
            'settings' => 'absolutte_typography_font_family',
            'label'    => esc_html__( 'Font Family', 'absolutte' ),
            'section'  => 'absolutte_typography_section',
            'default'  => 'Lato',
            'priority' => 20,
            'choices'  => Kirki_Fonts::get_font_choices(),
            'output'   => array(
                array(
                    'element'  => 'body',
                    'property' => 'font-family',
                ),
            ),
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'     => 'select',
            'settings' => 'absolutte_typography_font_family_headings',
            'label'    => esc_html__( 'Headings Font Family', 'absolutte' ),
            'section'  => 'absolutte_typography_section',
            'default'  => 'Lato',
            'priority' => 22,
            'choices'  => Kirki_Fonts::get_font_choices(),
            'output'   => array(
                array(
                    'element'  => 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
                    'property' => 'font-family',
                ),
            ),
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'        => 'multicheck',
            'settings'    => 'absolutte_typography_subsets',
            'label'       => esc_html__( 'Google-Font subsets', 'absolutte' ),
            'description' => esc_html__( 'The subsets used from Google\'s API.', 'absolutte' ),
            'section'     => 'absolutte_typography_section',
            'default'     => '',
            'priority'    => 23,
            'choices'     => Kirki_Fonts::get_google_font_subsets(),
            'output'      => array(
                array(
                    'element'  => 'body',
                    'property' => 'font-subset',
                ),
            ),
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'      => 'slider',
            'settings'  => 'absolutte_typography_font_size',
            'label'     => esc_html__( 'Font Size', 'absolutte' ),
            'section'   => 'absolutte_typography_section',
            'default'   => 16,
            'priority'  => 25,
            'choices'   => array(
                'min'  => 7,
                'max'  => 48,
                'step' => 1,
            ),
            'output'    => array(
                array(
                    'element'  => 'html',
                    'property' => 'font-size',
                    'units'    => 'px',
                ),
            ),
            'transport' => 'postMessage',
            'js_vars'   => array(
                array(
                    'element'  => 'html',
                    'function' => 'css',
                    'property' => 'font-size',
                    'units'    => 'px',
                ),
            ),
        ) );

        /*
        Header Options
        ===================================================== */
        Kirki::add_section( 'absolutte_header_section', array(
            'title'    => esc_html__( 'Header Options', 'absolutte' ),
            'priority' => 170,
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'        => 'switch',
            'transport'   => 'postMessage',
            'settings'    => 'absolutte_header_absolute',
            'label'       => esc_html__( 'Absolutte Position', 'absolutte' ),
            'description' => esc_html__( 'If enable the header stays above the content, like position: absolute;.', 'absolutte' ),
            'section'     => 'absolutte_header_section',
            'default'     => '0',
            'choices'     => array(
                'on'  => esc_html__( 'On', 'absolutte' ),
                'off' => esc_html__( 'Off', 'absolutte' ),
            ),
        ) );

        Kirki::add_field( 'absolutte', array(
            'type'        => 'switch',
            'settings'    => 'absolutte_header_sticky',
            'label'       => esc_html__( 'Sticky Header', 'absolutte' ),
            'description' => esc_html__( 'If enable the header remains at the top of the window while scrolling down.', 'absolutte' ),
            'section'     => 'absolutte_header_section',
            'default'     => '0',
            'choices'     => array(
                'on'  => esc_html__( 'On', 'absolutte' ),
                'off' => esc_html__( 'Off', 'absolutte' ),
            ),
        ) );

    } else {

        //add_action( 'customize_register', 'absolutte_no_kirki' );

    } // If class_exists( 'Kirki' )

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function absolutte_no_kirki( $wp_customize ) {
        $wp_customize->add_section( 'absolutte_no_kirki_section', array(
            'title' => esc_html__( 'Install Kirki Plugin', 'absolutte' ),
        ) );

        $wp_customize->add_setting( 'absolutte_site_not_kirki', array( 'default' => '', 'sanitize_callback' => 'absolutte_sanitize_text' ) );
        $wp_customize->add_control( new absolutte_Display_Text_Control( $wp_customize, 'absolutte_site_not_kirki', array(
            'section' => 'absolutte_no_kirki_section', // Required, core or custom.
             'label'   => sprintf( esc_html__( 'To access Site Options make sure you have installed the %1$s Kirki Toolkit %2$s plugin.', 'absolutte' ), '<a href="' . get_admin_url( null, 'themes.php?page=tgmpa-install-plugins' ) . '">', '</a>' ),
        ) ) );
    }

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function absolutte_customize_register( $wp_customize ) {

        /**
         * Control for the PRO buttons
         */
        class absolutte_Pro_Version extends WP_Customize_Control {
            public function render_content() {
                $args = array(
                    'a'      => array(
                        'href'  => array(),
                        'title' => array(),
                    ),
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                );
                echo wp_kses( $this->label, $args );
            }
        }

        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

        $wp_customize->remove_control( 'header_textcolor' );

    }
    add_action( 'customize_register', 'absolutte_customize_register' );

    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    function absolutte_customize_preview_js() {

        wp_register_script( 'absolutte_customizer_preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview' ), '20151024', true );
        wp_localize_script( 'absolutte_customizer_preview', 'wp_customizer', array(
            'ajax_url'  => admin_url( 'admin-ajax.php' ),
            'theme_url' => get_template_directory_uri(),
            'site_name' => get_bloginfo( 'name' ),
        ) );
        wp_enqueue_script( 'absolutte_customizer_preview' );

    }
    add_action( 'customize_preview_init', 'absolutte_customize_preview_js' );

    /**
     * Load scripts on the Customizer not the Previewer (iframe)
     */
    function absolutte_customize_js() {

        wp_enqueue_script( 'absolutte_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-controls' ), '20151024', true );

    }
    add_action( 'customize_controls_enqueue_scripts', 'absolutte_customize_js' );

    /*
    Sanitize Callbacks
     */

    /**
     * Sanitize for post's categories
     */
    function absolutte_sanitize_categories( $value ) {
        if ( ! array_key_exists( $value, absolutte_categories_ar() ) ) {
            $value = '';
        }

        return $value;
    }

    /**
     * Sanitize return an non-negative Integer
     */
    function absolutte_sanitize_integer( $value ) {
        return absint( $value );
    }

    /**
     * Sanitize return pro version text
     */
    function absolutte_pro_version( $input ) {
        return $input;
    }

    /**
     * Sanitize Any
     */
    function absolutte_sanitize_any( $input ) {
        return $input;
    }

    /**
     * Sanitize Text
     */
    function absolutte_sanitize_text( $str ) {
        return sanitize_text_field( $str );
    }

    /**
     * Sanitize URL
     */
    function absolutte_sanitize_url( $url ) {
        return esc_url( $url );
    }

    /**
     * Sanitize Boolean
     */
    function absolutte_sanitize_bool( $string ) {
        return (bool)$string;
    }

    /**
     * Sanitize Text with html
     */
    function absolutte_sanitize_text_html( $str ) {
        $args = array(
            'a'      => array(
                'href'  => array(),
                'title' => array(),
            ),
            'br'     => array(),
            'em'     => array(),
            'strong' => array(),
            'span'   => array(),
        );
        return wp_kses( $str, $args );
    }

    /**
     * Sanitize array for multicheck
     * http://stackoverflow.com/a/22007205
     */
    function absolutte_sanitize_multicheck( $values ) {

        $multi_values = ( ! is_array( $values ) ) ? explode( ',', $values ) : $values;
        return ( ! empty( $multi_values ) ) ? array_map( 'sanitize_title', $multi_values ) : array();
    }

    /**
     * Sanitize GPS Latitude and Longitud
     * http://stackoverflow.com/a/22007205
     */
    function absolutte_sanitize_lat_long( $coords ) {
        if ( preg_match( '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $coords ) ) {
            return $coords;
        } else {
            return 'error';
        }
    }

    /**
     * Create the "PRO version" buttons
     */
    if ( ! function_exists( 'absolutte_pro_btns' ) ) {
        function absolutte_pro_btns( $args ) {

            $wp_customize = $args['wp_customize'];
            $title = $args['title'];
            $label = $args['label'];
            if ( isset( $args['priority'] ) || array_key_exists( 'priority', $args ) ) {
                $priority = $args['priority'];
            } else {
                $priority = 120;
            }
            if ( isset( $args['panel'] ) || array_key_exists( 'panel', $args ) ) {
                $panel = $args['panel'];
            } else {
                $panel = '';
            }

            $section_id = sanitize_title( $title );

            $wp_customize->add_section( $section_id, array(
                'title'    => $title,
                'priority' => $priority,
                'panel'    => $panel,
            ) );
            $wp_customize->add_setting( $section_id, array(
                'sanitize_callback' => 'absolutte_pro_version',
            ) );
            $wp_customize->add_control( new absolutte_Pro_Version( $wp_customize, $section_id, array(
                'section' => $section_id,
                'label'   => $label,
            )
            ) );
        }
    } //end if function_exists

    /**
     * Display Text Control
     * Custom Control to display text
     */
    if ( class_exists( 'WP_Customize_Control' ) ) {
        class absolutte_Display_Text_Control extends WP_Customize_Control {
            /**
             * Render the control's content.
             */
            public function render_content() {

                $wp_kses_args = array(
                    'a'      => array(
                        'href'         => array(),
                        'title'        => array(),
                        'data-section' => array(),
                    ),
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    'span'   => array(),
                );
            ?>
			<p><?php echo wp_kses( $this->label, $wp_kses_args ); ?></p>
		<?php
            }
                }
            }

            /*
             * AJAX call to retreive an image URI by its ID
             */
            add_action( 'wp_ajax_nopriv_absolutte_get_image_src', 'absolutte_get_image_src' );
            add_action( 'wp_ajax_absolutte_get_image_src', 'absolutte_get_image_src' );

            function absolutte_get_image_src() {
                if ( isset( $_POST['image_id'] ) ) {
                    $image_id = sanitize_text_field( wp_unslash( $_GET['image_id'] ) );
                }
                $image = wp_get_attachment_image_src( absint( $image_id ), 'full' );
                $image = $image[0];
                echo wp_kses_post( $image );
                die();
        }
