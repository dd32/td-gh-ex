<?php
/*-----------------------------------------------
 * Function script and styles
-----------------------------------------------*/
if ( ! function_exists( 'igthemes_font_url' ) ) :

function igthemes_font_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /*
     * Translators: If there are characters in your language that are not supported
     * by Open Sans, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'base-wp' ) ) {
        $fonts[] = 'Open Sans:300italic,400italic,700italic,300,400,700';
    }

    /*
     * Translators: To add an additional character subset specific to your language,
     * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
     */
    $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, vietnamese)', 'base-wp' );

    if ( 'cyrillic' == $subset ) {
        $subsets .= ',cyrillic,cyrillic-ext';
    } elseif ( 'greek' == $subset ) {
        $subsets .= ',greek,greek-ext';
    } elseif ( 'devanagari' == $subset ) {
        $subsets .= ',devanagari';
    } elseif ( 'vietnamese' == $subset ) {
        $subsets .= ',vietnamese';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;

//add css and js
function igthemes_scripts() {
    wp_enqueue_style( 'igthemes-style', get_stylesheet_uri() );
//load fonts
    wp_enqueue_style( 'igthemes-fonts', igthemes_font_url(), array(), null );
//woocommerce css
    wp_enqueue_style( 'igthemes-main', get_template_directory_uri().'/core-framework/css/main-min.css' );
//woocommerce css
if ( class_exists( 'WooCommerce' )){
    wp_enqueue_style( 'igthemes-woocommerce', get_template_directory_uri().'/core-framework/css/woocommerce-min.css' );
}
//icon css
    wp_enqueue_style( 'igthemes-icon', get_template_directory_uri().'/core-framework/icon/icon.css' );
//lightbox css
if (is_singular() && 'product' != get_post_type() &&  igthemes_option('lightbox') == '1' ) {
    wp_enqueue_style( 'nivo-lightbox', get_template_directory_uri().'/core-framework/css/nivo-lightbox-min.css');
}
//carousel css
if ( class_exists( 'WooCommerce' ) && igthemes_option('shop_slide') == '1' || igthemes_option('post_slide') != 'none' ) {
    wp_enqueue_style( 'slick', get_template_directory_uri().'/core-framework/css/slick-min.css' );
}
//lightbox js
if (is_singular() && 'product' != get_post_type() && igthemes_option('lightbox') == '1' ) {
    wp_enqueue_script( 'nivo-lightbox-js', get_template_directory_uri() . '/core-framework/js/nivo-lightbox-min.js',array('jquery'),'1.2.0',true);
}
//carousel js
if ( class_exists( 'WooCommerce' ) && igthemes_option('shop_slide') == '1' || igthemes_option('post_slide') != 'none' ) {
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/core-framework/js/slick-min.js',array('jquery'),'1.5.7',true);
}
//main js
    wp_enqueue_script( 'igthemes-main', get_template_directory_uri() . '/core-framework/js/main-min.js', array('jquery'), '1.0', true );
//comment js
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}

}
add_action( 'wp_enqueue_scripts', 'igthemes_scripts' );

function igthemes_wp_head(){
    ?>
    <!--[if lt IE 9]>
       <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/core-framework/js/ie-fix.js"></script>
    <![endif]-->
    <!--[if IE 7]>
       <script src="<?php echo get_template_directory_uri(); ?>/core-framework/icon/lte-ie7.js"></script>
    <![endif]-->
    <?php
}
add_action('wp_head', 'igthemes_wp_head');
