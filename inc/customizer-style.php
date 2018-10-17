<?php 
/**
 * Add color styling from theme
 */
function adri_customizer_styles() {
    wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/css/custom.css'
    );
        $color = get_theme_mod( 'link_color' ); //E.g. #FF0000
        $custom = "
                a,
                .adri-social a{
                        color: {$color};
                }";
        wp_add_inline_style( 'custom-style', $custom );
}
add_action( 'wp_enqueue_scripts', 'adri_customizer_styles' );