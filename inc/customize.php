<?php

function newspress_customize_register($wp_customize){

    
    $wp_customize->add_section('newspress_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('NewsPress Options', 'newspress-lite'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can<a href="https://wordpress.org/support/view/theme-reviews/newspress-lite?filter=5" target="_blank"> <strong>Review Here</strong></a></span><br /><br /><span class="donation">Need Logo Inserter, Multilayer Slider, Unlimited Slide Items, Links from Featured Boxes, More Control, More Features and Options? Try <a href="'.esc_url('https://d5creation.com/theme/newspress/').'" target="_blank"><strong>NewsPress Extend Edition</strong></a> for Many Exciting Features with Dedicated Support from D5 Creation team. There are Promotional Offers. You can avail those promotions from <a href="'.esc_url('https://d5creation.com/').'" target="_blank">D5 Creation Site</a></span><br /><br /><span class="donation"><a href="'.esc_url('http://demo.d5creation.com/themes/?theme=NewsPress').'" target="_blank">Live Demo</a> of NewsPress Extend</span></div>'
    ));
	

//  News Style Layout
    $wp_customize->add_setting('newspress[fpostex]', array(
        'default'        	=> '0',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('newspress_fpostex', array(
        'label'      => __('Set News Style Front Page without considering the WP Reading Settings', 'newspress-lite'),
        'section'    => 'newspress_options',
        'settings'   => 'newspress[fpostex]',
		'description' => __('If you select This Options the WordPress Settings > Reading will not be considered and the News Style Front Page will be displayed. This is recommended for News Sites','newspress-lite'),
		'type' 		 => 'checkbox'
    ));
	
//  Social Links
	foreach (range(1, 5 ) as $numslinksn) {
    $wp_customize->add_setting('newspress[sl' . $numslinksn .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('newspress_sl' . $numslinksn, array(
        'label'      => __('Social Link - ',  'newspress-lite'). $numslinksn,
        'section'    => 'newspress_options',
        'settings'   => 'newspress[sl' . $numslinksn .']',
		'description' => __('Input Your Social Page Link. Example: <b>http://profiles.wordpress.org/d5creation/</b>.  If you do not want to show anything here leave the box blank. This Version supports only WordPress, Dribbble, Github, Tumblr, YouTube, Flickr, Vimeo, Instagram, Codepen and LinkedIn  ', 'newspress-lite'),
    ));	
	}
	
	
//  Top Left Image
	$wp_customize->add_setting('newspress[adv03]', array(
        'default'           => get_template_directory_uri() . '/images/ad3.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'adv03', array(
        'label'    			=> __('Image: Left of Logo', 'newspress-lite'),
        'section'  			=> 'newspress_options',
        'settings' 			=> 'newspress[adv03]',
		'description'   	=> __('Upload/Select an Image. Recommended Size: 250px X 90px','newspress-lite')
		
    )));
	
//  Top Right Image
	$wp_customize->add_setting('newspress[adv04]', array(
        'default'           => get_template_directory_uri() . '/images/ad3.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'adv04', array(
        'label'    			=> __('Image: Right of Logo', 'newspress-lite'),
        'section'  			=> 'newspress_options',
        'settings' 			=> 'newspress[adv04]',
		'description'   	=> __('Upload/Select an Image. Recommended Size: 250px X 90px','newspress-lite')
		
    )));	
 

}


add_action('customize_register', 'newspress_customize_register');


	if ( ! function_exists( 'newspress_get_option' ) ) :
	function newspress_get_option( $newspress_name, $newspress_default = false ) {
	$newspress_config = get_option( 'newspress' );

	if ( ! isset( $newspress_config ) ) : return $newspress_default; else: $newspress_options = $newspress_config; endif;
	if ( isset( $newspress_options[$newspress_name] ) ):  return $newspress_options[$newspress_name]; else: return $newspress_default; endif;
	}
	endif;