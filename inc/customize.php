<?php

function d5smartia_customize_register($wp_customize){

    
    $wp_customize->add_section('d5smartia_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('SMARTIA OPTIONS', 'd5-smartia'),
        'description'   => ' <div class="infohead">' . __('We appreciate an','d5-smartia') . ' <a href="http://wordpress.org/support/view/theme-reviews/d5-smartia" target="_blank">' . __('Honest Review','d5-smartia') . '</a> ' . __('of this Theme if you Love our Work','d5-smartia') . '<br /> <br />

' . __('Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try ','d5-smartia') . '<a href="' . esc_url('https://d5creation.com/theme/smartia/') .'
" target="_blank"><strong>' . __('Smartia Extend','d5-smartia') . '</strong></a><br /> <br /> 
        
        
' . __('You can Visit the Smartia Extend ','d5-smartia') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=Smartia') .'" target="_blank"><strong>' . __('Demo Here','d5-smartia') . '</strong></a> 
        </div>		
		'
    ));


//  Left Ad Image
    $wp_customize->add_setting('smartia[adcodel]', array(
        'default'           => get_template_directory_uri() . '/images/bannerad.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'adcodel', array(
        'label'    			=> __('Left Ad Image', 'd5-smartia'),
        'section'  			=> 'd5smartia_options',
        'settings' 			=> 'smartia[adcodel]',
		'description'   	=> __('180px X 150px image is recommended','d5-smartia')
    )));
	
//  Right Ad Image
    $wp_customize->add_setting('smartia[adcoder]', array(
        'default'           => get_template_directory_uri() . '/images/bannerad.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'adcoder', array(
        'label'    			=> __('Right Ad Image', 'd5-smartia'),
        'section'  			=> 'd5smartia_options',
        'settings' 			=> 'smartia[adcoder]',
		'description'   	=> __('180px X 150px image is recommended','d5-smartia')
    )));
  
  
  foreach (range(1, 2) as $opsinumber) {
	  
//  Slide Image
    $wp_customize->add_setting('smartia[slide-image-'. $opsinumber .']', array(
        'default'           => get_template_directory_uri() . '/images/slides/(' . $opsinumber . ').jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image-'. $opsinumber, array(
        'label'    			=> __('Sliding Image', 'd5-smartia') . '-' . $opsinumber,
        'section'  			=> 'd5smartia_options',
        'settings' 			=> 'smartia[slide-image-'. $opsinumber .']',
		'description'   	=> __('1300px X 300px image is recommended','d5-smartia')
    )));
  
// Slide Image Title
    $wp_customize->add_setting('smartia[slide-image-' . $opsinumber . '-title]', array(
        'default'        	=> __('Slide Image ','d5-smartia') . $opsinumber . __(' Title | Welcome to D5 Smartia Theme, Visit D5 Creation for Details','d5-smartia'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5smartia_slide-image-' . $opsinumber . '-title' , array(
        'label'      => __('Image Title', 'd5-smartia') . '-' . $opsinumber,
        'section'    => 'd5smartia_options',
        'settings'   => 'smartia[slide-image-' . $opsinumber .'-title]'
    ));


// Image Description
    $wp_customize->add_setting('smartia[slide-image-' . $opsinumber . '-description]', array(
        'default'        	=> __('You can use D5 Smartia for Black and White looking Smart Blogging, Personal or Corporate Websites.  This is a Sample Description and you can change these from Samrtia Options','d5-smartia'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5smartia_slide-image-' . $opsinumber . '-description' , array(
        'label'      => __('Image Description', 'd5-smartia') . '-' . $opsinumber,
        'section'    => 'd5smartia_options',
        'settings'   => 'smartia[slide-image-' . $opsinumber .'-description]',
		'type' 		 => 'textarea'
    ));
	
  }
 
 
//  Linked In Link
    $wp_customize->add_setting('smartia[lin_link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5smartia_lin_link', array(
        'label'      => __('Linked In Link', 'd5-smartia'),
        'section'    => 'd5smartia_options',
        'settings'   => 'smartia[lin_link]'
    ));
	
//  YouTube Link
    $wp_customize->add_setting('smartia[ytube_link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5smartia_ytube_link', array(
        'label'      => __('YouTube Link', 'd5-smartia'),
        'section'    => 'd5smartia_options',
        'settings'   => 'smartia[ytube_link]'
    ));


//  Blog/News Link
    $wp_customize->add_setting('smartia[blog_link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5smartia_blog_link', array(
        'label'      => __('Blog/News Link', 'd5-smartia'),
        'section'    => 'd5smartia_options',
        'settings'   => 'smartia[blog_link]'
    ));



}


add_action('customize_register', 'd5smartia_customize_register');


	if ( ! function_exists( 'd5smartia_get_option' ) ) :
	function d5smartia_get_option( $d5smartia_name, $d5smartia_default = false ) {
	$d5smartia_config = get_option( 'smartia' );

	if ( ! isset( $d5smartia_config ) ) : return $d5smartia_default; else: $d5smartia_options = $d5smartia_config; endif;
	if ( isset( $d5smartia_options[$d5smartia_name] ) ):  return $d5smartia_options[$d5smartia_name]; else: return $d5smartia_default; endif;
	}
	endif;