<?php

function selfie_customize_register($wp_customize){

    
    $wp_customize->add_section('selfie_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('Selfie Options', 'selfie'),
        'description'   => '<div class="infohead"><span class="donation">'. __('Selfie is CSS3 Powered and WordPress Latest Version Ready Responsive Theme. You can Learn More about the Features from the', 'selfie').' <a href="'. esc_url('https://d5creation.com/theme/selfie/').'" target="_blank"><strong>'. __('Selfie Theme Page', 'selfie').'</strong></a></span></div>'
    ));
	
//  Banner Image
    $wp_customize->add_setting('selfie[banner-image]', array(
        'default'           => get_template_directory_uri() . '/images/banner-image.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'banner-image', array(
        'label'    			=> __('Slide Banner Image', 'selfie'),
        'section'  			=> 'selfie_options',
        'settings' 			=> 'selfie[banner-image]',
		'description'   	=> __('Upload or Input the Image URL Here. Recommended Size: 2000px X 900px','selfie')
		
    )));
	
// Contact Number
    $wp_customize->add_setting('selfie[contactnumber]', array(
        'default'        	=> __('(000) 111-222','selfie'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('selfie_contactnumber' , array(
        'label'      => __('Contact Number', 'selfie'),
        'section'    => 'selfie_options',
        'settings'   => 'selfie[contactnumber]'
    ));

// Heading
    $wp_customize->add_setting('selfie[heading_text1]', array(
        'default'        	=> __('WordPress is web <em>software you can use to create websites!</em>','selfie'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('selfie_heading_text1' , array(
        'label'      => __('Front Page Heading', 'selfie'),
        'section'    => 'selfie_options',
        'settings'   => 'selfie[heading_text1]'
    ));
	
// Description
    $wp_customize->add_setting('selfie[heading_des1]', array(
        'default'        	=> __('It is Amazing!  <em>Over 60 million people</em> have chosen WordPress to power the place on the web','selfie'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('selfie_heading_des1' , array(
        'label'      => __('Front Page Heading Description', 'selfie'),
        'section'    => 'selfie_options',
        'settings'   => 'selfie[heading_des1]',
		'type' 		 => 'textarea'
    ));
	
// Button Link
    $wp_customize->add_setting('selfie[heading_btn1_link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('selfie_heading_btn1_link' , array(
        'label'      => __('Front Page Heading Button Link', 'selfie'),
        'section'    => 'selfie_options',
        'settings'   => 'selfie[heading_btn1_link]'
    ));
	
//  Social Links
	foreach (range(1, 5 ) as $selfie_numslinksn) {
    $wp_customize->add_setting('selfie[sl' . $selfie_numslinksn .']', array(
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('selfie_sl' . $selfie_numslinksn, array(
        'label'      => __('Social Link - ',  'selfie'). $selfie_numslinksn,
        'section'    => 'selfie_options',
        'settings'   => 'selfie[sl' . $selfie_numslinksn .']',
		'description' => __('Social Page Link. Example: <b>https://facebook.com/d5creation</b>', 'selfie'),
    ));	
	}

}

add_action('customize_register', 'selfie_customize_register');

	if ( ! function_exists( 'selfie_get_option' ) ) :
	function selfie_get_option( $selfie_name, $selfie_default = false ) {
	$selfie_config = get_option( 'selfie' );

	if ( ! isset( $selfie_config ) ) : return $selfie_default; else: $selfie_options = $selfie_config; endif;
	if ( isset( $selfie_options[$selfie_name] ) ):  return $selfie_options[$selfie_name]; else: return $selfie_default; endif;
	}
	endif;