<?php
/**
 * Describe child theme functions
 *
 * @package Aerobics
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'aerobics_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aerobics_setup() {

	    $aerobics_theme_info = wp_get_theme();
	    $GLOBALS['aerobics_version'] = $aerobics_theme_info->get( 'Version' );
	}
	endif;

add_action( 'after_setup_theme', 'aerobics_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'aerobics_fonts_url' ) ) :
	/**
	 * Register Google fonts
	 *
	 * @return string Google fonts URL for the theme.
	 */
    function aerobics_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Dosis, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Merriweather+Sans font: on or off', 'aerobics' ) ) {
            $font_families[] = 'Merriweather+Sans:300,300i,400,400i,700,700i,900,900i';
        }

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/*-------------------------------------------------------------------------------------------------------------------------------*/
	
if( ! function_exists( 'aerobics_customize_register' ) ) :
	/**
	 * Managed the theme default color
	 */
	function aerobics_customize_register( $wp_customize ) {
		
		global $wp_customize;

		$wp_customize->get_setting( 'swipewp_primary_theme_color' )->default = '#ff8e48';
	}
endif;

add_action( 'customize_register', 'aerobics_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'aerobics_scripts', 20 );

function aerobics_scripts() {
    
    global $aerobics_version;
    
    wp_enqueue_style( 'aerobics-google-font', aerobics_fonts_url(), array(), null );
    
    wp_dequeue_style( 'swipewp-style' );
    wp_dequeue_style( 'swipewp-responsive-style' );

    wp_enqueue_style( 'lightslider-style', get_stylesheet_directory_uri() . '/assets/library/lightslider/css/lightslider.min.css', array(), '1.1.3' );
    
	wp_enqueue_style( 'swipewp-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $aerobics_version ) );
    
    wp_enqueue_style( 'swipewp-parent-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), esc_attr( $aerobics_version ) );
    
    wp_enqueue_style( 'aerobics', get_stylesheet_uri(), array(), esc_attr( $aerobics_version ) );

    wp_enqueue_script( 'lightslider-scripts', get_stylesheet_directory_uri() . '/assets/library/lightslider/js/lightslider.min.js', array( 'jquery' ), '1.1.3' );

    wp_enqueue_script( 'aerobics-custom-scripts', get_stylesheet_directory_uri() . '/assets/js/custom-scripts.js', array('jquery'), esc_attr( $aerobics_version ) );

    $aerobics_theme_color = esc_attr( get_theme_mod( 'swipewp_primary_theme_color', '#ff8e48' ) );
    $output_css = '';

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.reply .comment-reply-link,.widget_search .search-submit, #masthead .search-form-wrapper .search-close, .side-menu-toggle-off,.woocommerce .price-cart:after,.woocommerce ul.products li.product .price-cart .button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.added_to_cart.wc-forward, .woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt[disabled]:disabled,.woocommerce #respond input#submit.alt[disabled]:disabled:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt[disabled]:disabled,.woocommerce a.button.alt[disabled]:disabled:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt[disabled]:disabled,.woocommerce button.button.alt[disabled]:disabled:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt[disabled]:disabled,.woocommerce input.button.alt[disabled]:disabled:hover, .woocommerce select .selected, .page .woocommerce-info, .woocommerce-noreviews, p.no-comments, .mt-scroll-to-top-wrapper, #section-cta .cta-button.cta-button1 a:hover{ background: ". esc_attr( $aerobics_theme_color ) ."}\n";

        $output_css .= "#preloader-background, a, a:hover, a:focus, a:active, .comment-author .fn .url:hover,.top-header-wrapper .top-element.phone::before, .top-header-wrapper .top-element.email::before, .top-header-wrapper .top-element.address::before, .social-link a:hover, #masthead #primary-menu li a:hover, .banner-btn-wrap a:hover,#secondary .widget-title:before, #secondary .widget a:hover,.cat-links a:hover::before,.edit-link a:hover::before,.widget a:hover::before,.widget li:hover::before,.posted-on a:hover::before,.comments-link a:hover::before, .banner-btn-wrap a:hover, .post-more-btn:hover:after, .post-more-btn:hover,#section-team .post-position, #section-blog .post-title a:hover,#colophon .widget_archive a:hover, #colophon .widget_categories a:hover, #colophon .widget_recent_entries a:hover, #colophon .widget_meta a:hover, #colophon .widget_pages li a:hover, #colophon .widget_nav_menu li a:hover, #colophon .cat-links a:hover, #colophon .edit-link a:hover, #colophon .site-info a:hover, .trail-items .trail-item::before, .trail-items li a:hover,.navigation .nav-links a:hover,.entry-date.published:hover,.author a:hover, .entry-title a:hover,.search-results .search-result-detail .entry-meta a:hover, .woocommerce .woocommerce-message:before,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .woocommerce-message:before,.woocommerce div.product p.price ins,.woocommerce div.product span.price ins,.woocommerce div.product p.price del,.woocommerce .woocommerce-info:before, .search-icon i:hover, .side-menu-toggle i:hover, #section-portfolio .post-more-btn:hover, #section-portfolio .post-more-btn:hover::after, #masthead .widget .mt-social-icons-wrapper a:hover, .widget_archive a:hover, .widget_categories a:hover, .widget_recent_entries a:hover, .widget_meta a:hover, .widget_recent_comments li:hover, .widget_rss li:hover, .widget_pages li a:hover, .widget_nav_menu li a:hover, .single .cat-links a:hover, .entry-footer a:hover, #section-service .sec-post-title a:hover, #section-testimonials .lSAction > a:hover{ color: ". esc_attr( $aerobics_theme_color ) ."}\n";
        
        $output_css .= "#masthead.header-sticky, .widget_search .search-submit, .custom-header .custom-header-wrapper, .btn, button, input[type='button'], input[type='reset'], input[type='submit'], .comment-list .comment-body, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select, #section-cta .cta-button.cta-button1 a:hover { border-color: ". esc_attr( $aerobics_theme_color ) ."}\n";

    $refine_output_css = swipewp_css_strip_whitespace( $output_css );

    wp_add_inline_style( 'aerobics', $refine_output_css );

}   
