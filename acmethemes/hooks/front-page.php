<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @since AcmePhoto 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_featured_slider' ) ) :

    function acmephoto_featured_slider(){
        global $acmephoto_customizer_all_values;

        $acmephoto_enable_feature = $acmephoto_customizer_all_values['acmephoto-enable-feature'];
        if( is_front_page() && !is_home() && 1 == $acmephoto_enable_feature  ) :
            do_action( 'acmephoto_action_feature_slider' );
        endif;
    }

endif;
add_action( 'acmephoto_action_front_page', 'acmephoto_featured_slider', 10 );

if ( ! function_exists( 'acmephoto_front_page' ) ) :

    function acmephoto_front_page() {

        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        elseif( is_active_sidebar( 'acmephoto-home' ) ){
            dynamic_sidebar( 'acmephoto-home' );
        }
        else {
            include( get_page_template() );
        }

    }
endif;
add_action( 'acmephoto_action_front_page', 'acmephoto_front_page', 20 );