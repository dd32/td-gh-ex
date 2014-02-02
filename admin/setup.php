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
    $input['custom_favicon'] = esc_url($input['custom_favicon']);
    $input['feedburner_url'] = esc_url($input['feedburner_url']);

    //Header settings validation
    $input['banner_background_color'] = sanitize_hex_color($input['banner_background_color']);
    $input['banner_background_color'] = (!empty($input['banner_background_color']))?$input['banner_background_color']:'#00adb3';
    $input['search_placeholder']      = wp_filter_nohtml_kses($input['search_placeholder']);

    //Footer settings validation
    $input['number_of_footer_widgets'] = (absint($input['number_of_footer_widgets']))? absint($input['number_of_footer_widgets']):3;
    $input['copyright_text']           = wp_filter_kses($input['copyright_text']);

    //Blog settings validation
    $input['read_more_text'] = esc_attr($input['read_more_text']);
    $input['excerpt_length'] = (absint($input['excerpt_length']))? absint($input['excerpt_length']):40;


    //Social URl validation
    $input['social_facebook']    = esc_url($input['social_facebook']);
    $input['social_twitter']     = esc_url($input['social_twitter']);
    $input['social_googleplus']  = esc_url($input['social_googleplus']);
    $input['social_youtube']     = esc_url($input['social_youtube']);
    $input['social_pinterest']   = esc_url($input['social_pinterest']);
    $input['social_linkedin']    = esc_url($input['social_linkedin']);
    $input['social_vimeo']       = esc_url($input['social_vimeo']);
    $input['social_flickr']      = esc_url($input['social_flickr']);
    $input['social_tumblr']      = esc_url($input['social_tumblr']);
    $input['social_dribbble']    = esc_url($input['social_dribbble']);
    $input['social_deviantart']  = esc_url($input['social_deviantart']);
    $input['social_wordpress']   = esc_url($input['social_wordpress']);
    $input['social_rss']         = esc_url($input['social_rss']);
    $input['social_slideshare']  = esc_url($input['social_slideshare']);
    $input['social_instagram']   = esc_url($input['social_instagram']);
    $input['social_skype']       = esc_url($input['social_skype']);
    $input['social_500px']       = esc_url($input['social_500px']);
    $input['social_weibo']       = esc_url($input['social_weibo']);
    $input['social_email']       = esc_attr($input['social_email']);
    $input['social_forrst']      = esc_attr($input['social_forrst']);
    $input['social_stumbleupon'] = esc_url($input['social_stumbleupon']);
    $input['social_digg']        = esc_url($input['social_digg']);

    //Administration settings validation
    $input['javascript_header'] = esc_js($input['javascript_header']);
    $input['javascript_footer'] = esc_js($input['javascript_footer']);


    return $input;
}


