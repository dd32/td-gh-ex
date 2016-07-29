<?php
//ad customizer css
add_action( 'customize_controls_print_styles', 	'igthemes_customizer_custom_control_css' );
function igthemes_customizer_custom_control_css() {
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
    </style>
    <?php
}

//style options
add_action( 'wp_enqueue_scripts', 'igthemes_customizer_css' );
if ( ! function_exists( 'igthemes_customizer_css' ) ) {
    function igthemes_customizer_css() {
        wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css');
        
        $bg_color =  get_theme_mod('background_color', '#ffffff');
        
        $header_background_color =  get_theme_mod('header_background_color', '#fff');
        $header_text_color =  get_theme_mod('header_text_color', '#666666');
        $header_link_normal = get_theme_mod('header_link_normal', '#444444');
        $header_link_hover = get_theme_mod('header_link_hover', '#ff9900');

        $body_text_color =  get_theme_mod('body_text_color', '#666666');
        $body_headings_color =  get_theme_mod('body_headings_color', '#444444');
        $body_link_normal =  get_theme_mod('body_link_normal', '#444444');
        $body_link_hover =  get_theme_mod('body_link_hover', '#ff9900');

        $footer_background_color =  get_theme_mod('footer_background_color', '#ffffff');
        $footer_text_color =  get_theme_mod('footer_text_color', '#666666');
        $footer_headings_color =  get_theme_mod('footer_headings_color', '#444444');
        $footer_link_normal =  get_theme_mod('footer_link_normal', '#444444');
        $footer_link_hover =  get_theme_mod('footer_link_normal', '#ff9900');

        $button_background_normal =  get_theme_mod('button_background_normal', '#444444');
        $button_background_hover =  get_theme_mod('button_background_hover', '#ff9900');
        $button_text_normal =  get_theme_mod('button_text_normal', '#ffffff');
        $button_text_hover =  get_theme_mod('button_text_hover', '#ffffff');


        $style = '
        input[type="text"],
        input[type="email"],
        input[type="url"],
        input[type="password"],
        input[type="search"],
        input[type="number"],
        input[type="tel"],
        textarea,
        select  {
            background:  '. igthemes_adjust_color_brightness($bg_color,5) .';
            border: 1px solid '. igthemes_adjust_color_brightness($bg_color,-20) .';
            color:'. $body_text_color .';
        }
        table {
            border:1px solid '. igthemes_adjust_color_brightness($bg_color,-20) .'; 
            background:'. $bg_color .';
        }
        table th {
            background:'. igthemes_adjust_color_brightness($bg_color,-5) .';
            border-bottom: 1px solid '. igthemes_adjust_color_brightness($bg_color,-20) .';
        }
        table td {
            background: '. igthemes_adjust_color_brightness($bg_color,5 ).';
            border: 1px solid '. igthemes_adjust_color_brightness($bg_color,-20) .';
        }
        .site-header {
            background:'. $header_background_color .'
        }
        .site-branding .site-description {
            color:'. $header_text_color .';
        }
        .site-branding .site-title a {
            color:'.$header_link_normal.';
        }
        .header-nav ul li a {
            color:'. $header_link_normal .';
        }
        .main-navigation {
            background: '. igthemes_adjust_color_brightness($header_background_color,5) .';        
        }
        .main-navigation a {
            color: '. $header_link_normal .';
        }
        .main-navigation a:hover {
            color: '. $header_link_hover .';
        }
        .main-navigation ul ul {
           background: '. $header_link_hover .';
        }
        .main-navigation ul li:hover > a {
            color: '. $header_link_hover .';
        }
        .main-navigation ul ul.light a {
            color:'. igthemes_adjust_color_brightness($header_link_hover,-125) .';
        }
        .main-navigation ul ul.light a:hover {
            background:'.  igthemes_adjust_color_brightness($header_link_hover,-5) .';
            color:'. igthemes_adjust_color_brightness($header_link_hover,-125) .';
        }
        .main-navigation ul ul.dark a {
            color:'. igthemes_adjust_color_brightness($header_link_hover,125) .';
        }
        .main-navigation ul ul.dark a:hover {
            background:'. igthemes_adjust_color_brightness($header_link_hover,5).';
            color:'. igthemes_adjust_color_brightness($header_link_hover,125) .';
        }
        .site-footer {
            background:'. $footer_background_color .';
            color:'. $footer_text_color .';
        }
        .site-footer a,
        .site-footer a:hover,
        .site-footer a:focus {
            color:'. $footer_link_normal .';
        }
        .site-footer h1,
        .site-footer h2,
        .site-footer h3,
        .site-footer h4,
        .site-footer h5,
        .site-footer h6 {
            color:'. $footer_headings_color .';
        }
        .site-content {
            color: '. $body_text_color .';
        }
        .site-content a {
            color: '. $body_link_normal .';
        }
        .site-content a:hover,
        .site-content a:focus,
        .archive .entry-title a:hover {
            color: '. $body_link_hover .';
        }
        .site-content h1,
        .site-content h2,
        .site-content h3,
        .site-content h4,
        .site-content h5,
        .site-content h6,
        .archive .entry-title a {
            color: '. $body_headings_color .';
        }
        .site .button,
        .site input[type="button"],
        .site input[type="reset"],
        .site input[type="submit"] {
            border-color: '. $button_background_normal .'!important;
            background-color: '. $button_background_normal .'!important;
            color: '. $button_text_normal .'!important;
        }
        .site .button:hover,
        .site input[type="button"]:hover,
        .site input[type="reset"]:hover,
        .site input[type="submit"]:hover,
        .site input[type="button"]:focus,
        .site input[type="reset"]:focus,
        .site input[type="submit"]:focus{
            border-color: '. $button_background_hover .'!important;
            background-color: '. $button_background_hover .'!important;
            color: '. $button_text_hover .'!important;
        }
        ';
        wp_add_inline_style( 'custom-style', $style );
    }//end custom css
}
