<?php
/**
 * Implement a custom header for Artwork
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */

/**
 * Set up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses theme_header_style() to style front-end.
 *
 * @since Artwork 1.0
 */
function theme_custom_header_setup() {
    $args = array(
        // Text color and image (empty to use none).
        'default-text-color' => '676767',
        // Callbacks for styling the header and the admin preview.
        'wp-head-callback' => 'theme_header_style',
        'admin-head-callback' => 'theme_header_style',
        'admin-preview-callback' => 'theme_header_style',
    );

    add_theme_support('custom-header', $args);
}

add_action('after_setup_theme', 'theme_custom_header_setup', 11);

/**
 * Style the header text displayed on the blog.
 *
 * get_header_textcolor() options: Hide text (returns 'blank'), or any hex value.
 *
 * @since Artwork 1.0
 */
function theme_header_style() {
    $theme_header_text_color = get_header_textcolor();
    $theme_color_text = get_option('theme_color_text');
    $theme_brand_color = get_option('theme_color_primary');
    $theme_second_brand_color = get_option('theme_color_second');
    $theme_third_brand_color = get_option('theme_color_third');
    $theme_fourth_brand_color = get_option('theme_color_fourth');

    $theme_font_family = get_theme_mod("theme_title_font_family", "Roboto");
    $theme_font_weight_style = get_theme_mod("theme_title_font_weight");
    $theme_font_weight = preg_replace("/[^0-9?! ]/", "", $theme_font_weight_style);
    $theme_font_style = preg_replace("/[^A-Za-z?! ]/", "", $theme_font_weight_style);
    $theme_font_size = get_theme_mod("theme_title_font_size", "90px");
    if ($theme_font_style == "") {
        $theme_font_style = "normal";
    }
    if ($theme_font_weight == "") {
        $theme_font_weight = "700";
    }
    if (strcasecmp($theme_font_family, "Roboto") != 0) {
        ?>
        <link id='theme-title-font-family' href="http://fonts.googleapis.com/css?family=<?php echo str_replace(" ", "+", $theme_font_family) . ":" . $theme_font_weight_style . ( $theme_font_weight_style != '400' ? ',400' : '' ); ?>" rel='stylesheet' type='text/css'>

    <?php }
    ?>
    <style type="text/css" id="theme-header-css">
        .site-header .site-title,
        .site-footer .site-title{
            <?php
            if (strcasecmp($theme_font_family, "Roboto") != 0) {
                ?>
                font-family:<?php echo $theme_font_family; ?>;
            <?php } ?>
            font-weight:<?php echo $theme_font_weight; ?>;
            font-style:<?php echo $theme_font_style; ?>;
        }
            .site-header .site-title{
            font-size:<?php echo $theme_font_size; ?>;
        }
        
        <?php if ($theme_header_text_color != '676767' && $theme_header_text_color != ''): 
            ?>
        .sf-menu ul ,
            .site-header .site-tagline,
            .sf-menu > li>a{
                color:#<?php echo $theme_header_text_color; ?>;
            }
        <?php endif; ?>
        <?php if ($theme_color_text != THEME_TEXT_COLOR && $theme_color_text != '') : ?>
            body,
            .site-footer .site-tagline,
            .form-control ,
            input[type="text"],
            input[type="url"],
            input[type="email"],
            input[type="number"],
            input[type="password"],
            input[type="search"],
            input[type="tel"],
            select,
            textarea,
            .work-post.format-link .entry-header a:after{
                color:<?php echo $theme_color_text; ?>;
            }
            .form-control ,
            input[type="text"],
            input[type="url"],
            input[type="email"],
            input[type="number"],
            input[type="password"],
            input[type="search"],
            input[type="tel"],
            textarea,
            .form-control:focus {   
                border-color:  <?php echo $theme_color_text; ?>;
            }
            .radio-labelauty+ label > span.labelauty-checked-image:before{
                background:<?php echo $theme_color_text; ?>;
            }
        <?php endif; ?>
        <?php if ($theme_brand_color != THEME_BRAND_COLOR && $theme_brand_color != '') : ?>
            a:hover,
            a:focus,
            .site-footer a:hover,
            .site-footer a:focus,
            .search-form button,
            blockquote:before,
            .brand-color{
                color:<?php echo $theme_brand_color; ?>;
            }
            .two-col-works .work-element:nth-child(4n+2),
            .page-wrapper:nth-child(4n+2) {
                background-color: <?php echo $theme_brand_color; ?>;
            }
            .work-post .category-wrapper,
            .button:hover, .button:focus, button:hover, button:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus{
                background: <?php echo $theme_brand_color; ?>;
            }
            blockquote{
                border-color:<?php echo $theme_brand_color; ?>;
            }
            <?php if (is_plugin_active('motopress-content-editor/motopress-content-editor.php') || is_plugin_active('motopress-content-editor-lite/motopress-content-editor.php')) : ?>
                .artwork .motopress-cta-obj .motopress-button-wrap .mp-theme-button-white:hover, .artwork .motopress-cta-obj .motopress-button-wrap .mp-theme-button-white:focus,
                .mp-theme-icon-brand, .motopress-ce-icon-obj.mp-theme-icon-bg-brand .motopress-ce-icon-preview,
                .motopress-list-obj .motopress-list-type-icon .fa,
                .artwork .motopress-button-obj .mp-theme-button-white:hover, .artwork .motopress-button-obj .mp-theme-button-white:focus, .artwork .motopress-modal-obj .mp-theme-button-white:hover, .artwork .motopress-modal-obj .mp-theme-button-white:focus, .artwork .motopress-download-button-obj .mp-theme-button-white:hover, .artwork .motopress-download-button-obj .mp-theme-button-white:focus, .artwork .motopress-button-group-obj .mp-theme-button-white:hover, .artwork .motopress-button-group-obj .mp-theme-button-white:focus,
                .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-rounded .motopress-ce-icon-bg .motopress-ce-icon-preview, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-circle .motopress-ce-icon-bg .motopress-ce-icon-preview, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-square .motopress-ce-icon-bg .motopress-ce-icon-preview{
                    color: <?php echo $theme_brand_color; ?>;
                }
                .motopress-countdown_timer.mp-theme-countdown-timer-brand .countdown-section,
                .motopress-cta-style-brand,
                .motopress-accordion-obj.ui-accordion.mp-theme-accordion-brand .ui-accordion-header .ui-icon,
                .motopress-service-box-obj.motopress-service-box-brand .motopress-service-box-icon-holder-rounded, .motopress-service-box-obj.motopress-service-box-brand .motopress-service-box-icon-holder-square, .motopress-service-box-obj.motopress-service-box-brand .motopress-service-box-icon-holder-circle,
                .artwork .motopress-service-box-obj .motopress-service-box-button-section .mp-theme-button-brand:hover, .artwork .motopress-service-box-obj .motopress-service-box-button-section .mp-theme-button-brand:focus, .artwork .motopress-button-group-obj .mp-theme-button-brand:hover, .artwork .motopress-button-group-obj .mp-theme-button-brand:focus, .artwork .motopress-button-obj .mp-theme-button-brand:hover, .artwork .motopress-button-obj .mp-theme-button-brand:focus, .artwork .motopress-modal-obj .mp-theme-button-brand:hover, .artwork .motopress-modal-obj .mp-theme-button-brand:focus, .artwork .motopress-download-button-obj .mp-theme-button-brand:hover, .artwork .motopress-download-button-obj .mp-theme-button-brand:focus ,
                .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-rounded .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-square .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-circle .motopress-ce-icon-bg{
                    background: <?php echo $theme_brand_color; ?>;
                }
                .artwork .motopress-button-obj .mp-theme-button-white:hover, .artwork .motopress-button-obj .mp-theme-button-white:focus, .artwork .motopress-modal-obj .mp-theme-button-white:hover, .artwork .motopress-modal-obj .mp-theme-button-white:focus, .artwork .motopress-download-button-obj .mp-theme-button-white:hover, .artwork .motopress-download-button-obj .mp-theme-button-white:focus, .artwork .motopress-button-group-obj .mp-theme-button-white:hover, .artwork .motopress-button-group-obj .mp-theme-button-white:focus,
                .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-rounded .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-circle .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-square .motopress-ce-icon-bg {
                    border-color: <?php echo $theme_brand_color; ?>;
                }
                .artwork .motopress-tabs-obj.ui-tabs.motopress-tabs-vertical .ui-tabs-nav li.ui-state-active a, .artwork .motopress-tabs-obj.ui-tabs.motopress-tabs-no-vertical .ui-tabs-nav li.ui-state-active a {
                    border-color: <?php echo $theme_brand_color; ?> !important;
                    color: <?php echo $theme_brand_color; ?> !important;
                }
            <?php endif; ?>
            <?php if (is_plugin_active('woocommerce/woocommerce.php')) : ?>
                .woocommerce-pagination a:hover, .woocommerce-pagination span, .woocommerce-pagination a.page-numbers:hover, .woocommerce-pagination .page-numbers.current,
                .woocommerce span.onsale{
                    background: <?php echo $theme_brand_color; ?>;
                }
                .widget.widget_product_search .woocommerce-product-search:before,
                .woocommerce p.stars a.active:after, .woocommerce p.stars a:hover:after,
                .single-product ol.commentlist time,
                .woocommerce .star-rating span{
                    color: <?php echo $theme_brand_color; ?> ;
                }
                .woocommerce .woocommerce-message, .woocommerce .woocommerce-info,
                .wc-tabs li.active a{
                    border-color: <?php echo $theme_brand_color; ?>;
                }                    
            <?php endif; ?>
            <?php if (is_plugin_active('bbpress/bbpress.php')) : ?>  
                #bbp-search-form:before{
                    color: <?php echo $theme_brand_color; ?> ;
                }
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($theme_second_brand_color != THEME_SECOND_BRAND_COLOR && $theme_second_brand_color != '') : ?> 
            .page-wrapper:nth-child(4n+2) .category-wrapper,
            .page-wrapper:nth-child(4n+3) .category-wrapper,
            .page-wrapper,
            .two-col-works .work-element{
                background-color: <?php echo $theme_second_brand_color; ?>;
            }
        <?php endif; ?>
        <?php if ($theme_third_brand_color != THEME_THIRD_BRAND_COLOR && $theme_third_brand_color != '') : ?> 
            .two-col-works .work-element:nth-child(4n+3),
            .page-wrapper:nth-child(4n+3){
                background-color: <?php echo $theme_third_brand_color; ?>;
            }
        <?php endif; ?>
        <?php if ($theme_fourth_brand_color != THEME_FOURTH_BRAND_COLOR && $theme_fourth_brand_color != '') : ?> 
            .two-col-works .work-element:nth-child(4n+4),
            .page-wrapper:nth-child(4n+4){
                background-color: <?php echo $theme_fourth_brand_color; ?>;
            }
        <?php endif; ?>

    </style>
    <?php
}
