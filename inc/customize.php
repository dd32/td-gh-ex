<?php

function awesome_customize_register($wp_customize){

    
    $wp_customize->add_section('awesome_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('AWESOME OPTIONS', 'awesome'),
        'description'   => '<div class="infohead"><span class="donation"> Awesome is CSS3 Powered and WordPress Latest Version Ready Responsive Theme. You can Learn More about the Features from the <a href="'. esc_url('http://d5creation.com/theme/awesome/').'" target="_blank"><strong>Awesome Theme Page</strong></a></span></div>'
    ));
	
//  Social Links
	foreach (range(1, 5 ) as $awesome_numslinksn) {
    $wp_customize->add_setting('awesome[sl' . $awesome_numslinksn .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_sl' . $awesome_numslinksn, array(
        'label'      => __('Social Link - ',  'awesome'). $awesome_numslinksn,
        'section'    => 'awesome_options',
        'settings'   => 'awesome[sl' . $awesome_numslinksn .']',
		'description' => __('Input Your Social Page Link. Example: <b>http://wordpress.org/d5creation</b>.  If you do not want to show anything here leave the box blank. Supported Links are: wordpress.org, wordpress.com, dribbble.com, github.com, tumblr.com, youtube.com, flickr.com, vimeo.com, codepen.io, linkedin.com', 'awesome'),
    ));	
	}
	
//  Banner Images/ Slide Images

	foreach (range(1, 3 ) as $awesome_sldksn) {

    $wp_customize->add_setting('awesome[slide-back'.$awesome_sldksn.']', array(
        'default'           => get_template_directory_uri() . '/images/slide/slideback'.$awesome_sldksn.'.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-back'.$awesome_sldksn, array(
        'label'    			=> __('Slide Image-', 'awesome') . $awesome_sldksn,
        'section'  			=> 'awesome_options',
        'settings' 			=> 'awesome[slide-back'.$awesome_sldksn.']',
		'description'   	=> __('Upload or Input the Slide Image URL Here. Recommended Size: 1600px X 600px','awesome')
		
    )));
	
	}
	
	
// Heading
    $wp_customize->add_setting('awesome[abouttitle]', array(
        'default'        	=> __('We are <em>D5 Creation</em>','awesome'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_abouttitle' , array(
        'label'      => __('About Heading', 'awesome'),
        'section'    => 'awesome_options',
        'settings'   => 'awesome[abouttitle]'
    ));
	
// Sub Heading
    $wp_customize->add_setting('awesome[aboutsubtitle]', array(
        'default'        	=> __('Where Passion and Creativity Meets Experience','awesome'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_aboutsubtitle' , array(
        'label'      => __('About Sub Heading', 'awesome'),
        'section'    => 'awesome_options',
        'settings'   => 'awesome[aboutsubtitle]'
    ));
	
// Description
    $wp_customize->add_setting('awesome[aboutdes]', array(
        'default'        	=> __('We are a small team of industry veterans having decades of experience in <em>web development</em> and design. Our work is our passion. We hand craft every piece of the work we do and we take pride in our hand crafted design and clean codes','awesome'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_aboutdes' , array(
        'label'      => __('About Description', 'awesome'),
        'section'    => 'awesome_options',
        'settings'   => 'awesome[aboutdes]',
		'type' 		 => 'textarea'
    ));

	
	
	foreach (range(1,3) as $awesome_fbsinumber) {
	  
// Featured Title
    $wp_customize->add_setting('awesome[featured-title' . $awesome_fbsinumber . ']', array(
        'default'        	=> __('Awesome Responsive','awesome'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_featured-title' . $awesome_fbsinumber, array(
        'label'      => __('Featured Title', 'awesome'). '-' . $awesome_fbsinumber,
        'section'    => 'awesome_options',
        'settings'   => 'awesome[featured-title' . $awesome_fbsinumber .']'
    ));


// Featured Description
    $wp_customize->add_setting('awesome[featured-description' . $awesome_fbsinumber . ']', array(
        'default'        	=> __('The Color changing options of Awesome will give the WordPress Driven Site an attractive look. Awesome is super elegant and Professional Responsive Theme which will create the business widely expressed','awesome'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_featured-description' . $awesome_fbsinumber  , array(
        'label'      => __('Featured Description', 'awesome') . '-' . $awesome_fbsinumber,
        'section'    => 'awesome_options',
        'settings'   => 'awesome[featured-description' . $awesome_fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }
	

}


add_action('customize_register', 'awesome_customize_register');


	if ( ! function_exists( 'awesome_get_option' ) ) :
	function awesome_get_option( $awesome_name, $awesome_default = false ) {
	$awesome_config = get_option( 'awesome' );

	if ( ! isset( $awesome_config ) ) : return $awesome_default; else: $awesome_options = $awesome_config; endif;
	if ( isset( $awesome_options[$awesome_name] ) ):  return $awesome_options[$awesome_name]; else: return $awesome_default; endif;
	}
	endif;