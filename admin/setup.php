<?php
//register setting
add_action('admin_init', 'blue_sky_register_settings' );
function blue_sky_register_settings(){
    register_setting('blue-sky-options-group', 'bs_options', 'bs_validate_options' );
}
//////
//Add theme option menu in sidebar
function bs_theme_options_start() {
    add_theme_page( __('BS Theme Options','blue-sky'), __('BS Theme Options','blue-sky'), 'edit_theme_options', 'theme_options', 'bs_theme_options_page' );
}

add_action( 'admin_menu', 'bs_theme_options_start' );
////
function bs_theme_options_page(){
    if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;

    require get_template_directory() . '/admin/view.php';

    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

}

//option validation
function bs_validate_options($input){
    //validate here

    //General settings validation
    $input['custom_favicon'] = esc_url($input['custom_favicon']);
    $input['feedburner_url'] = esc_url($input['feedburner_url']);

    //Header settings validation
    $input['custom_logo'] = esc_url($input['custom_logo']);
    $input['banner_background_color'] = sanitize_hex_color($input['banner_background_color']);
    $input['banner_background_color'] = (!empty($input['banner_background_color']))?$input['banner_background_color']:'#00adb3';

    $input['search_placeholder'] = wp_filter_nohtml_kses($input['search_placeholder']);

    //Footer settings validation
    $input['number_of_footer_widgets'] = (absint($input['number_of_footer_widgets']))?
        absint($input['number_of_footer_widgets']):3;
    $input['copyright_text'] = wp_filter_kses($input['copyright_text']);

    //Blog settings validation
    $input['read_more_text'] = esc_attr($input['read_more_text']);
    $input['excerpt_length'] = (absint($input['excerpt_length']))?
        absint($input['excerpt_length']):40;


    //Social URl validation
    $input['social_facebook'] = esc_url($input['social_facebook']);
    $input['social_twitter'] = esc_url($input['social_twitter']);
    $input['social_googleplus'] = esc_url($input['social_googleplus']);
    $input['social_youtube'] = esc_url($input['social_youtube']);
    $input['social_pinterest'] = esc_url($input['social_pinterest']);
    $input['social_linkedin'] = esc_url($input['social_linkedin']);
    $input['social_vimeo'] = esc_url($input['social_vimeo']);
    $input['social_flickr'] = esc_url($input['social_flickr']);
    $input['social_tumblr'] = esc_url($input['social_tumblr']);
    $input['social_dribbble'] = esc_url($input['social_dribbble']);
    $input['social_deviantart'] = esc_url($input['social_deviantart']);
    $input['social_rss'] = esc_url($input['social_rss']);
    $input['social_instagram'] = esc_url($input['social_instagram']);
    $input['social_skype'] = esc_url($input['social_skype']);
    $input['social_digg'] = esc_url($input['social_digg']);
    $input['social_stumbleupon'] = esc_url($input['social_stumbleupon']);
    $input['social_forrst'] = esc_url($input['social_forrst']);
    $input['social_500px'] = esc_url($input['social_500px']);
    $input['social_email'] = esc_attr($input['social_email']);

    //Administration settings validation
    $input['javascript_header'] = esc_js($input['javascript_header']);
    $input['javascript_footer'] = esc_js($input['javascript_footer']);


    return $input;
}


