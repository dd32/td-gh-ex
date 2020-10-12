<?php 
function enigma_scripts() {     

        /* Main CSS libraries */
        wp_enqueue_style('bootstrap', get_template_directory_uri() .'/css/bootstrap.css');
        wp_enqueue_style('enigma-default', get_template_directory_uri() . '/css/default.css');
        wp_enqueue_style('enigma-theme', get_template_directory_uri() . '/css/enigma-theme.css');
        wp_enqueue_style('enigma-media-responsive', get_template_directory_uri() . '/css/media-responsive.css');
        wp_enqueue_style('enigma-animations', get_template_directory_uri() . '/css/animations.css');
        wp_enqueue_style('enigma-theme-animtae', get_template_directory_uri() . '/css/theme-animtae.css');

        /* Font awesome library */
        
        wp_enqueue_style('fontawesome-all', get_template_directory_uri() . '/css/font-awesome-5.11.2/css/all.css');

        wp_enqueue_style('enigma-style-sheet', get_stylesheet_uri());

        /* Web Fonts */		
        wp_enqueue_style('enigma-google-fonts',esc_url(enigma_fonts_url()));
                
        // Js
        wp_enqueue_script('popper', get_template_directory_uri() .'/js/popper.js', array('jquery'), true, true );
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.js', array('jquery'), true, true );
       
        
        /*Carofredsul Slides*/
        wp_enqueue_script('jquery.caroufredsel', get_template_directory_uri() .'/js/caroufredsel-6.2.1/jquery.caroufredsel-6.2.1.js', array('jquery'), true, true );
        if ( is_front_page() ) {
                
            /*PhotoBox JS*/
            wp_enqueue_script('photobox-js', get_template_directory_uri() .'/js/jquery.photobox.js', array('jquery'), true, true );
            wp_enqueue_style('photobox', get_template_directory_uri() . '/css/photobox.css');

                //Footer JS//
        	wp_enqueue_script('enigma-footer-script', get_template_directory_uri() .'/js/enigma-footer-script.js', array('jquery'), true, true );
        }
        wp_enqueue_script('waypoints', get_template_directory_uri() .'/js/waypoints.js', array('jquery'), true, true );
        wp_enqueue_script('enigma-scroll', get_template_directory_uri() .'/js/scroll.js', array('jquery'), true, true );
        wp_enqueue_script( 'enigma-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), true, true );
         wp_enqueue_script('enigma-theme-script', get_template_directory_uri() .'/js/enigma_theme_script.js', array('jquery'), true, true );
         wp_enqueue_script('enigma-menu', get_template_directory_uri() .'/js/menu.js', array('jquery'), true, true );
       
        if ( is_singular() ) wp_enqueue_script( "comment-reply" );

        $image_speed = get_theme_mod('slider_image_speed' );
        if ( ! empty ( $image_speed ) ) {
            $image_speed = absint(get_theme_mod( 'slider_image_speed', '2000' ));
            $speed       = true;
        } else {
            $image_speed = '';
            $speed       = false;
        }

        $ajax_data = array(
            'blog_speed'  => absint(get_theme_mod( 'blog_speed', '2000' )),
            'autoplay'    => absint(get_theme_mod( 'autoplay', 1 )),
            'image_speed' => absint(get_theme_mod( 'slider_image_speed', '2000' )),
            'speed'       => $speed,
        );

        wp_enqueue_script( 'enigma-ajax-front', get_template_directory_uri() . '/js/enigma-ajax-front.js', array( 'jquery' ), true, true );
        wp_localize_script( 'enigma-ajax-front', 'ajax_admin', array(
            'ajax_url'      => admin_url( 'admin-ajax.php' ),
            'admin_nonce'   => wp_create_nonce( 'admin_ajax_nonce' ),
            'ajax_data'     => $ajax_data,
        ) );
}
add_action('wp_enqueue_scripts', 'enigma_scripts');

if ( ! function_exists( 'enigma_fonts_url' ) ) :
    /**
     * Register Google fonts.
     *
     * Create your own enigma_fonts_url() function to override in a child theme.
     *
     * @since league 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function enigma_fonts_url()
    {
        $fonts_url = '';
        $fonts     = array();

        if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'enigma' ) )
        {
            $fonts[] = 'Open+Sans:600,700';
        }
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'enigma' ) )
        {
            $fonts[] = 'Roboto:700';
        }
        if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'enigma' ) )
        {
            $fonts[] = 'Raleway:600';
        }
        

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), 'https://fonts.googleapis.com/css' );
        }
        return esc_url_raw( $fonts_url );
    }
endif;