<?php
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * Dynamic css
 *
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('aeonblog_dynamic_css')) :

    function aeonblog_dynamic_css()
    {

        global $aeonblog_theme_options;
        $aeonblog_font_family = wp_kses_post( $aeonblog_theme_options['aeonblog-font-family'] );
        $aeonblog_font_size = absint( $aeonblog_theme_options['aeonblog-font-size'] );
        $aeonblog_font_line_height = esc_attr( $aeonblog_theme_options['aeonblog-font-line-height'] );
        $aeonblog_font_letter_spacing = absint( $aeonblog_theme_options['aeonblog-letter-spacing'] );
        $aeonblog_primary_color = esc_attr( $aeonblog_theme_options['aeonblog-primary-color'] );
        $custom_css = '';

        /* Typography Section */
        if (!empty($aeonblog_font_family)) {
            $custom_css .= "body { font-family: {$aeonblog_font_family}; }";
        }

        if (!empty($aeonblog_font_size)) {
            $custom_css .= "body { font-size: {$aeonblog_font_size}px; }";
        }

        if (!empty($aeonblog_font_line_height)) {
            $custom_css .= "body { line-height : {$aeonblog_font_line_height}; }";
        }

        if (!empty($aeonblog_font_letter_spacing)) {
            $custom_css .= "body { letter-spacing : {$aeonblog_font_letter_spacing}px; }";
        }

        /* Primary Color Section */
        if (!empty($aeonblog_primary_color)) {
            $custom_css .= ".breadcrumbs span.breadcrumb, .search-form input[type=submit], #toTop, .aeonblog-pagination .page-numbers.current, .aeonblog-pagination .page-numbers:hover, .slider-section .carousel-caption .slide-content>a, .comments-wrapper .form-submit input, #toTop, .entry-header .entry-meta li .posted-in a, .breadcrumb, .breadcrumbs { background : {$aeonblog_primary_color}; }";

            $custom_css .= ".search-form input.search-field, .sticky .p-15, .related-post-entries li, .aeonblog-pagination .page-numbers, .entry-footer .more-link { border-color : {$aeonblog_primary_color}; }";

            $custom_css .= ".error-404 h1, .no-results h1, a, a:visited, .related-post-entries .title:hover, .entry-title a:hover, .featured-post-title a:hover, .entry-meta.entry-category a,.widget li a:hover, .widget h1 a:hover, .widget h2 a:hover, .widget h3 a:hover, .site-title a, .site-title a:visited, .main-navigation ul li a:hover, .single .nav-links .nav-next:after, .single .nav-links .nav-previous:after { color : {$aeonblog_primary_color}; }";
            
            $custom_css .=".btn-primary { border: 2px solid {$aeonblog_primary_color};}";

        }

        wp_add_inline_style('aeonblog-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'aeonblog_dynamic_css', 99);