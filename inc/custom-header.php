<?php
/*Custom header*/
function apelleuno_customize_register( $wp_customize ) {
	/*bg*/
	$wp_customize->add_setting( 'header_textcolor' , array(
    'default'   => '007bff',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
) );

	$wp_customize->add_setting(
        'header_bg_color_setting',
        array(
            'default'     => '#343a40',
			'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label'      => __( 'Header Background Color', 'apelle-uno' ),
                'section'    => 'colors',
                'settings'   => 'header_bg_color_setting',
            ) )
    );
	/*color*/
	
	
	$wp_customize->add_setting(
        'header_color_setting_rgb',
        array(
            'default'     => '255,255,255',
			'transport' => 'refresh',
            'sanitize_callback' => 'apelleuno_sanitize_rgba',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Header Text Nav Color ', 'apelle-uno' ),
                'section'    => 'colors',
                'settings'   => 'header_color_setting_rgb',
            ) )
    );
}
function apelleuno_sanitize_rgba( $color ) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgba(0,0,0,0)';

   
    if ( false === strpos( $color, 'rgba' ) ) {
			list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        return $r.','.$g.','.$b;
    }

    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return $red.','.$green.','.$blue;}
add_action( 'customize_register', 'apelleuno_customize_register' );

add_action( 'wp_enqueue_scripts', 'apelleuno_customizer_css');
function apelleuno_customizer_css()
{
	$header_textcolor	=	 esc_html(get_theme_mod('header_textcolor', '007bff')); 
	$header_color_setting_rgba	=	 esc_html(get_theme_mod('header_color_setting_rgb', '255,255,255')); 
    $apelle_custom_css = "  .bg-apelleuno { background-color:  ".esc_html(get_theme_mod('header_bg_color_setting', '#343a40')) ." !important; }";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-brand{color:#".$header_textcolor."}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-brand:focus,.navbar-apelleuno .navbar-brand:hover{color:#" . $header_textcolor."; }";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-brand:focus,.navbar-apelleuno .navbar-brand:hover b{     opacity: 0.7; }";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-nav .nav-link{color:rgba(".$header_color_setting_rgba.",.5)}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-nav .nav-link:focus,.navbar-apelleuno .navbar-nav .nav-link:hover{color:rgba(" . $header_color_setting_rgba .",.75)}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-nav .nav-link.disabled{color:rgba(".$header_color_setting_rgba.",.25)}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-nav .active>.nav-link,.navbar-apelleuno .navbar-nav .nav-link.active,.navbar-apelleuno .navbar-nav .nav-link.show,.navbar-apelleuno .navbar-nav .show>.nav-link{color:" . $header_textcolor . "}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-toggler{color:rgba(" . $header_color_setting_rgba. ",.5);border-color:rgba(".$header_color_setting_rgba . ",.1)}";
	$apelle_custom_css .= " 	.navbar-apelleuno .navbar-toggler-icon{background-image:url(\"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(".$header_color_setting_rgba . " , 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E\")}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-text{color:rgba(".$header_color_setting_rgba.",.5)}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-text a{color:" . $header_textcolor ."}";
	$apelle_custom_css .= " .navbar-apelleuno .navbar-text a:focus,.navbar-dark .navbar-text a:hover{color:" . $header_textcolor."}";
    wp_add_inline_style( 'style', $apelle_custom_css );
}