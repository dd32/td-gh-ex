<?php

function white_spektrum_custom_styles_setup() {
        $header_background = esc_url(get_theme_mod('header_image'));

        $custom_css = "
            .site-header.header-background-image {
                background: url({$header_background});
                background-size: cover!important;
            }
        ";
        wp_add_inline_style('white-spektrum-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'white_spektrum_custom_styles_setup');