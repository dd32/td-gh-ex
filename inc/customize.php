<?php

function writingboard_customize_register($wp_customize){

    
    $wp_customize->add_section('writingboard_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('Writing Board OPTIONS', 'writing-board'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can <a href="https://wordpress.org/support/view/theme-reviews/writing-board" target="_blank"><strong>Review Here</strong></a></span><br /><br /><span class="donation"> Need More Features and Options including Unlimited Slides and 100+ Advanced Features and Controls? Try <a href="https://d5creation.com/theme/writing-board/" target="_blank"><strong>Writing Board Extend</strong></a></span><br /> <br /><span class="donation"> You can Visit the Writing Board Extend Demo <a href="http://demo.d5creation.com/themes/?theme=Writing%20Board" target="_blank"><strong>Here</strong></a></span></div>'
    ));
	
// Portfolio Heading
    $wp_customize->add_setting('writingboard[heading_text]', array(
        'default'        	=> esc_html__('WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time','writing-board'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('writingboard_heading_text' , array(
        'label'      => esc_html__('Front Page Heading', 'writing-board'),
        'section'    => 'writingboard_options',
        'settings'   => 'writingboard[heading_text]'
    ));
	

//  Social Links
	foreach (range(1, 5 ) as $numslinksn) {
    $wp_customize->add_setting('writingboard[sl' . $numslinksn .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('writingboard_sl' . $numslinksn, array(
        'label'      => esc_html__('Social Link - ',  'writing-board'). $numslinksn,
        'section'    => 'writingboard_options',
        'settings'   => 'writingboard[sl' . $numslinksn .']',
		'description' => wp_kses_post(__('Input Your Social Page Link. Example: <b>http://profiles.wordpress.org/d5creation</b>', 'writing-board')),
    ));	
	}

}


add_action('customize_register', 'writingboard_customize_register');


	if ( ! function_exists( 'writingboard_get_option' ) ) :
	function writingboard_get_option( $writingboard_name, $writingboard_default = false ) {
	$writingboard_config = get_option( 'writingboard' );

	if ( ! isset( $writingboard_config ) ) : return $writingboard_default; else: $writingboard_options = $writingboard_config; endif;
	if ( isset( $writingboard_options[$writingboard_name] ) ):  return $writingboard_options[$writingboard_name]; else: return $writingboard_default; endif;
	}
	endif;