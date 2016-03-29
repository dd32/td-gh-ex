<?php
/**
 * Dynamic css
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_dynamic_css' ) ) :

    function acmephoto_dynamic_css() {

        global $acmephoto_customizer_all_values;
        /*Color options */
        $acmephoto_primary_color = $acmephoto_customizer_all_values['acmephoto-primary-color'];
        $custom_css = '';

        /*background*/
        if( get_header_image() ){
            $bg_image_url = get_header_image();
        }
        else{
            $bg_image_url =   get_template_directory_uri()."/assets/img/startup-slider.jpg";
        }
        $custom_css .= "
              .inner-main-title {
                background-image:url('{$bg_image_url}');
                background-repeat:no-repeat;
                background-size:cover;
                background-attachment:fixed;
            }";
        /*color*/
        $custom_css .= "
            a:hover,
            a:active,
            a:focus,
            .btn-primary:hover,
            .widget li a:hover,
            .posted-on a:hover,
            .cat-links a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .tags-links a:hover,
            .byline a:hover,
            .nav-links a:hover,
            .bx-controls-direction a:hover i,
             .main-navigation .current_page_item > a,
            .main-navigation .current-menu-item > a,
            .main-navigation .active > a,
            .main-navigation .current_page_ancestor > a{
                color: {$acmephoto_primary_color};
            }";

        /*background color*/
        $custom_css .= "
            .navbar .navbar-toggle:hover,
            .comment-form .form-submit input,
            .read-more,
            .btn-primary,
            .circle,
            .line > span,
            .wpcf7-form input.wpcf7-submit,
            .wpcf7-form input.wpcf7-submit:hover,
            .breadcrumb,
            .banner-search .search-block #searchsubmit{
                background-color: {$acmephoto_primary_color};
            }";

        /*borders*/
        $custom_css .= "
            .blog article.sticky,
            .btn-primary:before,
            .banner-search .search-block{
                border: 2px solid {$acmephoto_primary_color};
            }";

        $custom_css .= "
            .comment-form .form-submit input,
            .read-more{
                border: 1px solid {$acmephoto_primary_color};
            }";

        $custom_css .= "
            .wpcf7-form input.wpcf7-submit::before {
                border: 4px solid {$acmephoto_primary_color};
            }";

        $custom_css .= "
             .breadcrumb::after {
                border-left: 5px solid {$acmephoto_primary_color};
            }";

        /*custom css*/
        /*custom css*/
        $acmephoto_custom_css = wp_filter_nohtml_kses ( $acmephoto_customizer_all_values['acmephoto-custom-css'] );
        if ( ! empty( $acmephoto_custom_css ) ) {
            $custom_css .= $acmephoto_custom_css;
        }
        wp_add_inline_style( 'acmephoto-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'acmephoto_dynamic_css', 99 );