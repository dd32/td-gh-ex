<?php
//start class
class IGthemes_Customizer {
	//start
    public function __construct() {
			add_action( 'customize_register',              array( $this, 'customize_register' ), 10 );
			add_action( 'wp_enqueue_scripts',              array( $this, 'add_customizer_css' ), 20 );
			add_action( 'customize_controls_print_styles', array( $this, 'customizer_custom_control_css' ), 30 );
    }
    /*+++++++++++++++++++++++++++++++++++++++++++++
    CUSTOMIZER SETTINGS AND OPTIONS
    +++++++++++++++++++++++++++++++++++++++++++++*/
    public function customize_register($wp_customize) {
        //DEFAULTS
        include dirname( __FILE__ ) . '/customizer-defaults.php';
        //PANEL
        $wp_customize->add_panel( 'igtheme_options', array(
          'title' => __( 'Theme Settings', 'basic-shop'),
          'description' => '', 
          'priority' => 10, 
        ) );
        // LAYOUT
        $wp_customize->add_section('layout-settings', array(
            'title' => __('Layout', 'basic-shop'),
            'panel' => 'igtheme_options',
            'priority' => 10, 
         ));
        // HEADER
        $wp_customize->add_section( 'header-settings' , array(
          'title' => __( 'Header', 'basic-shop'),
          'panel' => 'igtheme_options',
          'priority' => 20, 
        ) );
        // TYPOGRAPHY
        $wp_customize->add_section('typography-settings', array(
            'title' => __('Typography', 'basic-shop'),
            'panel' => 'igtheme_options',
            'priority' => 30, 
        ));
        // BUTTONS
        $wp_customize->add_section('buttons-settings', array(
            'title' => __('Buttons', 'basic-shop'),
            'panel' => 'igtheme_options',
            'priority' => 40, 
         ));
        // FOOTER
        $wp_customize->add_section('footer-settings', array(
            'title' => __('Footer', 'basic-shop'),
            'panel' => 'igtheme_options',
            'priority' => 50, 
        ));
        // SOCIAL
        $wp_customize->add_section('social-settings', array(
            'title' => __('Social', 'basic-shop'),
            'panel' => 'igtheme_options',
            'priority' => 60, 
        ));
        /*****************************************************************
        * PREMIUM
        ******************************************************************/
        if ( apply_filters( 'igthemes_customizer_more', true ) ) {

            $wp_customize->add_section( 'upgrade_premium' , array(
                'title'      		=> __( 'More Options', 'basic-shop' ),
                'panel'             => 'igtheme_options',
                'priority'   		=> 1,
            ) );

            $wp_customize->add_setting( 'upgrade_premium', array(
                'default'    		=> null,
                'sanitize_callback' => 'igthemes_sanitize_text',
            ) );

            $wp_customize->add_control( new IGthemes_More_Control( $wp_customize, 'upgrade_premium', array(
                'label'    			=> __( 'Looking for more options?', 'basic-shop' ),
                'section'  			=> 'upgrade_premium',
                'settings' 			=> 'upgrade_premium',
                'priority' 			=> 1,
            ) ) );
        }
            //THEME IPTIONS
            include dirname( __FILE__ ) . '/customizer-options.php';
            //END
        }

    /*+++++++++++++++++++++++++++++++++++++++++++++
    CUSTOM CONTROL CSS
    +++++++++++++++++++++++++++++++++++++++++++++*/
    public function customizer_custom_control_css() {
        ?>
        <style>
        .customize-control-radio-image .image.ui-buttonset input[type=radio] {
            height: auto;
        }
        .customize-control-radio-image .image.ui-buttonset label {
            display: inline-block;
            width: 30%;
            padding: 1%;
            box-sizing: border-box;
        }
        .customize-control-radio-image .image.ui-buttonset label.ui-state-active {
            background: none;
        }
        .customize-control-radio-image .customize-control-radio-buttonset label {
            background: #f7f7f7;
            line-height: 35px;
        }
        .customize-control-radio-image label img {
            border: 2px solid #eee;
        }
        #customize-controls .customize-control-radio-image label img {
            height: auto;
        }
        .customize-control-radio-image label.ui-state-active img {
            border: 2px solid #fff;
            background: #fff;
        }
        .customize-control-radio-image label.ui-state-hover img {
            border: 2px solid #fff;
        }
        .customize-control-heading {
            background: #fafafa;
            margin: 0 -12px 12px -12px;
            padding: 12px 12px 8px 12px;
            border-top: 1px solid #eaeaea;
            border-bottom: 1px solid #eaeaea;
        }
        #customize-control-upgrade_premium .button-upgrade {
              background: #fc3;
              border: 1px solid #e6ac00;
              color: #5d4b16;
              text-transform: uppercase;
              display: inline-block;
              text-decoration: none;
              font-size: 13px;
              line-height: 30px;
              height: 32px;
              margin: 15px 0;
              padding: 0 20px 1px;
              cursor: pointer;
              -webkit-appearance: none;
              -webkit-border-radius: 2px;
              border-radius: 2px;
              white-space: nowrap;
              -webkit-box-sizing: border-box;
              -moz-box-sizing: border-box;
              box-sizing: border-box;
              text-shadow: 2px 2px #fd3;
        }
        #customize-control-upgrade_premium .button-upgrade:hover {
            background: #fd3;
            color: #5d4b16;
            border-color: #ffc61a;
        }
        #customize-control-upgrade_premium ul {
            list-style: square;
            margin: 10px 16px;
        }
        </style>
        <?php 
    }
    /*+++++++++++++++++++++++++++++++++++++++++++++
    CUSTOMIZER PRINT CSS
    +++++++++++++++++++++++++++++++++++++++++++++*/
    public function add_customizer_css() {
            wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css');

            //DEFAULTS
            include dirname( __FILE__ ) . '/customizer-defaults.php';
            
            $bg_color =  get_theme_mod('background_color', $background_color);

            $style = '
            .site-header {
                background:'. get_theme_mod( 'header_background_color', $header_background_color ) .';
                border-bottom:1px solid '. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ),-15) .';
            }
            .site-description {
                color:'. get_theme_mod( 'header_text_color', $header_text_color ) .';
            }
            .header-nav ul li a,
            .site-title a {
                color:'. get_theme_mod('header_link_normal', $header_link_normal ) .';
            }
            .header-nav {
                background:'. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ), -5) .';
                border-bottom: 1px solid '. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ),-15) .';
            }
            .header-nav ul li a:hover {
                color:'. get_theme_mod('header_link_hover', $header_link_hover ) .';
            }
            .main-navigation a {
                color:'. get_theme_mod( 'header_link_normal', $header_link_normal ) .';
            }
            .main-navigation a:hover {
                color:'. get_theme_mod( 'header_link_hover', $header_link_hover ) .';
            }
            .main-navigation ul ul {
               background: '. get_theme_mod('header_background_color', $header_background_color ) .';      
            }
            .main-navigation ul li:hover > a {
                color: '. get_theme_mod( 'header_link_hover', $header_link_hover ) .';
            }
            .site-footer {
                background:'. get_theme_mod('footer_background_color', $footer_background_color) .';
                color:'. get_theme_mod('footer_text_color', $footer_text_color) .';
                border-top:1px solid '. igthemes_color_brightness(get_theme_mod('header_background_color', $header_background_color ),-15) .';
            }
            .site-footer .site-info {
                background:'. igthemes_color_brightness(get_theme_mod('footer_background_color', $footer_background_color), -5) .';
            }
            .site-footer a {
                color:'. get_theme_mod('footer_link_normal', $footer_link_normal) .';
            }
            .site-footer a:hover,
            .site-footer a:focus {
                color:'. get_theme_mod('footer_link_hover', $footer_link_hover) .';
            }
            .site-footer h1,
            .site-footer h2,
            .site-footer h3,
            .site-footer h4,
            .site-footer h5,
            .site-footer h6 {
                color:'. get_theme_mod('footer_headings_color', $footer_headings_color) .';
            }
            .site-content {
                color: '. get_theme_mod('body_text_color', $body_text_color) .';
            }
            .site-content a {
                color: '. get_theme_mod('body_link_normal', $body_link_normal) .';
            }
            .site-content a:hover,
            .site-content a:focus,
            .archive .entry-title a:hover {
                color: '. get_theme_mod('body_link_hover', $body_link_hover) .';
            }
            .site-content h1,
            .site-content h2,
            .site-content h3,
            .site-content h4,
            .site-content h5,
            .site-content h6,
            .archive .entry-title a {
                color: '. get_theme_mod('body_headings_color', $body_headings_color) .';
            }
            .site .button,
            .site input[type="button"],
            .site input[type="reset"],
            .site input[type="submit"] {
                border-color: '. get_theme_mod('button_background_normal', $button_background_normal) .'!important;
                background-color: '. get_theme_mod('button_background_normal', $button_background_normal) .'!important;
                color: '. get_theme_mod('button_text_normal', $button_text_normal) .'!important;
            }
            .site .button:hover,
            .site input[type="button"]:hover,
            .site input[type="reset"]:hover,
            .site input[type="submit"]:hover,
            .site input[type="button"]:focus,
            .site input[type="reset"]:focus,
            .site input[type="submit"]:focus {
                border-color: '. get_theme_mod('button_background_hover', $button_background_hover) .'!important;
                background-color: '. get_theme_mod('button_background_hover', $button_background_hover) .'!important;
                color: '. get_theme_mod('button_text_hover', $button_text_hover) .'!important;
            }
            .posted-on:before,
            .byline:before,
            .cat-links:before ,
            .tags-links:before,
            .comments-link:before,
            .format-quote .entry-title:before,
            .format-video .entry-title:before,
            .format-image .entry-title:before,
            .format-link .entry-title:before,
            .format-gallery .entry-title:before,
            .format-audio .entry-title:before,
            .format-status .entry-title:before,
            .format-chat .entry-title:before,
            .sticky .entry-title:before {
                color: '. get_theme_mod('body_link_hover', $body_link_hover) .';
            }
            ';
            wp_add_inline_style( 'custom-style',  wp_kses( $style, array( "\'", '\"' ) ) );
        }//end custom css
//END OF CLASS
}
return new IGthemes_Customizer();
