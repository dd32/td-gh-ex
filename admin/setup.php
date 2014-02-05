<?php
//register setting
function blue_planet_register_settings(){
    register_setting('blue-planet-options-group', 'blueplanet_options', 'blue_planet_validate_options' );
}
add_action('admin_init', 'blue_planet_register_settings' );
//////
//Add theme option menu in sidebar
function blue_planet_theme_options_start() {
    add_theme_page( __('Blue Planet Theme Options','blue-planet'), __('Blue Planet Theme Options','blue-planet'), 'edit_theme_options', 'theme_options', 'blue_planet_theme_options_page' );
}

add_action( 'admin_menu', 'blue_planet_theme_options_start' );
////
function blue_planet_theme_options_page(){
    if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;

    require get_template_directory() . '/admin/view.php';

    global $blueplanet_options_settings;
    $bp_options = $blueplanet_options_settings;

}

//option validation
function blue_planet_validate_options($input){
    //validate here

    //General settings validation
    $input['custom_favicon'] = esc_url_raw($input['custom_favicon']);
    $input['feedburner_url'] = esc_url_raw($input['feedburner_url']);
    $input['custom_css']     = dumb_css_sanitize($input['custom_css']);

    //Header settings validation
    $input['banner_background_color'] = sanitize_hex_color($input['banner_background_color']);
    $input['banner_background_color'] = (!empty($input['banner_background_color']))?$input['banner_background_color']:'#00adb3';
    $input['search_placeholder']      = sanitize_text_field($input['search_placeholder']);

    //Footer settings validation
    $input['number_of_footer_widgets'] = (absint($input['number_of_footer_widgets'])) ? absint($input['number_of_footer_widgets']) : 3 ;
    $input['copyright_text']           = sanitize_text_field($input['copyright_text']);

    //Blog settings validation
    $input['read_more_text'] = htmlentities( sanitize_text_field ( $input[ 'read_more_text' ] ), ENT_QUOTES, 'UTF-8' );
    $input['excerpt_length'] = (absint($input['excerpt_length']))? absint($input['excerpt_length']):40;


    //Social URl validation
    $input['social_facebook']    = esc_url_raw($input['social_facebook']);
    $input['social_twitter']     = esc_url_raw($input['social_twitter']);
    $input['social_googleplus']  = esc_url_raw($input['social_googleplus']);
    $input['social_youtube']     = esc_url_raw($input['social_youtube']);
    $input['social_pinterest']   = esc_url_raw($input['social_pinterest']);
    $input['social_linkedin']    = esc_url_raw($input['social_linkedin']);
    $input['social_vimeo']       = esc_url_raw($input['social_vimeo']);
    $input['social_flickr']      = esc_url_raw($input['social_flickr']);
    $input['social_tumblr']      = esc_url_raw($input['social_tumblr']);
    $input['social_dribbble']    = esc_url_raw($input['social_dribbble']);
    $input['social_deviantart']  = esc_url_raw($input['social_deviantart']);
    $input['social_wordpress']   = esc_url_raw($input['social_wordpress']);
    $input['social_rss']         = esc_url_raw($input['social_rss']);
    $input['social_slideshare']  = esc_url_raw($input['social_slideshare']);
    $input['social_instagram']   = esc_url_raw($input['social_instagram']);
    $input['social_skype']       = esc_url_raw($input['social_skype']);
    $input['social_500px']       = esc_url_raw($input['social_500px']);
    $input['social_weibo']       = esc_url_raw($input['social_weibo']);
    $input['social_email']       = sanitize_email($input['social_email']);
    $input['social_forrst']      = esc_url_raw($input['social_forrst']);
    $input['social_stumbleupon'] = esc_url_raw($input['social_stumbleupon']);
    $input['social_digg']        = esc_url_raw($input['social_digg']);

    //Administration settings validation
    $input['javascript_header'] = esc_js($input['javascript_header']);
    $input['javascript_footer'] = esc_js($input['javascript_footer']);

    //Slider settings validation
    $input['slider_status']     = esc_attr($input['slider_status']);
    $input['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] ) ;
    $input['direction_nav']     = absint( $input['direction_nav'] );
    $input['slider_autoplay']   = absint( $input['slider_autoplay'] );
    $input['transition_delay']  = ( absint($input['transition_delay'] ) ) ? absint( $input['transition_delay'] ) : 4 ;
    $input['transition_length'] = ( absint($input['transition_length'] ) ) ? absint( $input['transition_length'] ) : 1 ;
    for( $i=0 ; $i < 5 ; $i++ ) {
        $input['main_slider_image'][$i]   = esc_url_raw($input['main_slider_image'][$i]);
        $input['main_slider_caption'][$i] = sanitize_text_field($input['main_slider_caption'][$i]);
        $input['main_slider_url'][$i]     = esc_url_raw($input['main_slider_url'][$i]);
        $input['main_slider_new_tab'][$i] = absint($input['main_slider_new_tab'][$i]);
    }

    $input['slider_status_2']     = esc_attr($input['slider_status_2']);
    $input['number_of_slides_2']  = ( absint($input['number_of_slides_2'] ) ) ? absint( $input['number_of_slides_2'] ) : 3 ;
    $input['slider_category_2']   = ( absint($input['slider_category_2'] ) ) ? absint( $input['slider_category_2'] ) : 1 ;
    $input['transition_effect_2'] = wp_filter_nohtml_kses( $input['transition_effect_2'] ) ;
    $input['control_nav_2']       = absint( $input['control_nav_2'] );
    $input['direction_nav_2']     = absint( $input['direction_nav_2'] );
    $input['slider_autoplay_2']   = absint( $input['slider_autoplay_2'] );
    $input['slider_caption_2']    = absint( $input['slider_caption_2'] );
    $input['transition_delay_2']  = ( absint($input['transition_delay_2'] ) ) ? absint( $input['transition_delay_2'] ) : 4 ;
    $input['transition_length_2'] = ( absint($input['transition_length_2'] ) ) ? absint( $input['transition_length_2'] ) : 1 ;

    return $input;
}


