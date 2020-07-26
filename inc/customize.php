<?php

function green_customize_register($wp_customize){

    
    $wp_customize->add_section('green_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('GREEN EYE OPTIONS', 'green-eye'),
        'description'   => ' <div class="infohead">' . esc_html__('We appreciate an','green-eye') . ' <a href="http://wordpress.org/support/view/theme-reviews/green-eye" target="_blank">' . esc_html__('Honest Review','green-eye') . '</a> ' . __('of this Theme if you Love our Work','green-eye') . '<br /> <br />

' . esc_html__('Need More Features and Options including Exciting 3D Slide and 100+ Advanced Features? Try ','green-eye') . '<a href="' . esc_url('https://d5creation.com/theme/green-eye/') .'
" target="_blank"><strong>' . esc_html__('GREEN EYE Extend','green-eye') . '</strong></a><br /> <br /> 
        
        
' . esc_html__('You can Visit the GREEN EYE Extend ','green-eye') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=GREEN%20 EYE') .'" target="_blank"><strong>' . esc_html__('Demo Here','green-eye') . '</strong></a> 
        </div>		
		'
    ));
	
 	
  foreach (range(1, 1) as $opsinumber) {
	  
//  Slide Image
    $wp_customize->add_setting('green[slide-image'. $opsinumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image'. $opsinumber, array(
        'label'    			=> esc_html__('Sliding Image', 'green-eye') . '-' . $opsinumber,
        'section'  			=> 'green_options',
        'settings' 			=> 'green[slide-image'. $opsinumber .']',
		'description'   	=> esc_html__('400px X 400px image is recommended','green-eye')
    )));
  
// Slide Image Title
    $wp_customize->add_setting('green[slide-image' . $opsinumber . '-title]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_slide-image' . $opsinumber . '-title' , array(
        'label'      => esc_html__('Image Title', 'green-eye') . '-' . $opsinumber,
        'section'    => 'green_options',
        'settings'   => 'green[slide-image' . $opsinumber .'-title]'
    ));


// Image Description
    $wp_customize->add_setting('green[slide-image' . $opsinumber . '-caption]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_slide-image' . $opsinumber . '-caption' , array(
        'label'      => esc_html__('Image Description', 'green-eye') . '-' . $opsinumber,
        'section'    => 'green_options',
        'settings'   => 'green[slide-image' . $opsinumber .'-caption]',
		'type' 		 => 'textarea'
    ));
	
// Image Link
    $wp_customize->add_setting('green[slide-image' . $opsinumber . '-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_slide-image' . $opsinumber . '-link' , array(
        'label'      => esc_html__('Image Link', 'green-eye') . '-' . $opsinumber,
        'section'    => 'green_options',
        'settings'   => 'green[slide-image' . $opsinumber .'-link]',
		'description'   	=> 'Input the URL where the image will redirect the visitors'
    ));

  }
 
// Front Page Heading
    $wp_customize->add_setting('green[heading_text]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_heading_text' , array(
        'label'      => esc_html__('Front Page Heading', 'green-eye'),
        'section'    => 'green_options',
        'settings'   => 'green[heading_text]'
    ));
	
// Front Page Heading Description
    $wp_customize->add_setting('green[heading_des]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_heading_des' , array(
        'label'      => esc_html__('Front Page Heading Description', 'green-eye'),
        'section'    => 'green_options',
        'settings'   => 'green[heading_des]',
		'type' 		 => 'textarea'
    ));
	
	

	foreach (range(1,8) as $fbsinumber) {
	  
//  Featured Image
    $wp_customize->add_setting('green[featured-image'. $fbsinumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image'. $fbsinumber, array(
        'label'    			=> esc_html__('Featured Image', 'green-eye') . '-' . $fbsinumber,
        'section'  			=> 'green_options',
        'settings' 			=> 'green[featured-image'. $fbsinumber .']',
		'description'   	=> esc_html__('Upload an image for the Featured Box. 200px X 100px image is recommended','green-eye')
    )));
  
// Featured Image Title
    $wp_customize->add_setting('green[featured-title' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_featured-title' . $fbsinumber, array(
        'label'      => esc_html__('Featured Title', 'green-eye'). '-' . $fbsinumber,
        'section'    => 'green_options',
        'settings'   => 'green[featured-title' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('green[featured-description' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_featured-description' . $fbsinumber  , array(
        'label'      => esc_html__('Featured Description', 'green-eye') . '-' . $fbsinumber,
        'section'    => 'green_options',
        'settings'   => 'green[featured-description' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }
  
 //  Quote Text
    $wp_customize->add_setting('green[bottom-quotation]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_bottom-quotation', array(
        'label'      => esc_html__('Quote Text', 'green-eye'),
        'section'    => 'green_options',
        'settings'   => 'green[bottom-quotation]',
		'type' 		 => 'textarea'
    )); 
  

//  Responsive Layout
    $wp_customize->add_setting('green[responsive]', array(
        'default'        	=> '0',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_responsive', array(
        'label'      => esc_html__('Use Responsive Layout', 'green-eye'),
        'section'    => 'green_options',
        'settings'   => 'green[responsive]',
		'description' => __('Check the Box if you want the Responsive Layout of your Website','green-eye'),
		'type' 		 => 'checkbox'
    ));


//  Google Plus Link
    $wp_customize->add_setting('green[gplus-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_gplus-link', array(
        'label'      => esc_html__('Google Plus Link', 'green-eye'),
        'section'    => 'green_options',
        'settings'   => 'green[gplus-link]'
    ));


//  Linked In Link
    $wp_customize->add_setting('green[li-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_li-link', array(
        'label'      => esc_html__('Linked In Link', 'green-eye'),
        'section'    => 'green_options',
        'settings'   => 'green[li-link]'
    ));

//  Feed or Blog Link
    $wp_customize->add_setting('green[feed-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('green_feed-link', array(
        'label'      => esc_html__('Feed or Blog Link', 'green-eye'),
        'section'    => 'green_options',
        'settings'   => 'green[feed-link]'
    ));




}


add_action('customize_register', 'green_customize_register');


	if ( ! function_exists( 'green_get_option' ) ) :
	function green_get_option( $green_name, $green_default = false ) {
	$green_config = get_option( 'green' );

	if ( ! isset( $green_config ) ) : return $green_default; else: $green_options = $green_config; endif;
	if ( isset( $green_options[$green_name] ) ):  return $green_options[$green_name]; else: return $green_default; endif;
	}
	endif;