<?php

function design_customize_register($wp_customize){

    
    $wp_customize->add_section('design_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('DESIGN OPTIONS', 'd5-design'),
        'description'   => '<div class="infohead"><span class="donation"> Design is CSS3 Powered and WordPress Latest Version Ready Responsive Theme
<br />
<br />
You can Learn More about the Features from the <a href="'. esc_url('https://d5creation.com/theme/design/').'" target="_blank"><strong>Design Theme Page</strong></a>
<br />
<br />
You can visit the Live Demo <a href="'. esc_url('http://demo.d5creation.com/themes/?theme=Design').'" target="_blank"><strong>From Here</strong></a></span></div>'
    ));	
 
 	  
//  Banner Image/ Slide Image

		
    $wp_customize->add_setting('design[banner-image]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'banner-image', array(
        'label'    			=> esc_html__('Banner Image', 'd5-design'),
        'section'  			=> 'design_options',
        'settings' 			=> 'design[banner-image]',
		'description'   	=> esc_html__('Upload an image for the Front Page Banner.950px X 300px image is recommended', 'd5-design')
		
    )));
	

// Front Page Heading
    $wp_customize->add_setting('design[heading_text]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_heading_text' , array(
        'label'      => esc_html__('Front Page Heading', 'd5-design'),
        'section'    => 'design_options',
        'settings'   => 'design[heading_text]'
    ));
	
	
//  Footer Sidebar
    $wp_customize->add_setting('design[fsidebar]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_fsidebar', array(
        'label'      => esc_html__('Show the Footer Sidebar', 'd5-design'),
        'section'    => 'design_options',
        'settings'   => 'design[fsidebar]',
		'description' => esc_html__('Uncheck this if you do not want to show the footer sidebar (Widgets) automatically','d5-design'),
		'type' 		 => 'checkbox'
    ));
	

	foreach (range(1,3) as $fbsinumber) {
	  
//  Featured Image
    $wp_customize->add_setting('design[featured-image'. $fbsinumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image'. $fbsinumber, array(
        'label'    			=> esc_html__('Featured Image', 'd5-design') . '-' . $fbsinumber,
        'section'  			=> 'design_options',
        'settings' 			=> 'design[featured-image'. $fbsinumber .']',
		'description'   	=> esc_html__('Upload an image for the Featured Box. 270px X 200px image is recommended','d5-design')
    )));
  

// Featured Links
    $wp_customize->add_setting('design[featured-link' . $fbsinumber . ']', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_featured-link' . $fbsinumber  , array(
        'label'      => esc_html__('Featured Link', 'd5-design') . '-' . $fbsinumber,
        'section'    => 'design_options',
        'settings'   => 'design[featured-link' . $fbsinumber .']'
    ));
	
  }
  
  
 	foreach (range(1,2) as $fbsinumberd) {
	  
  
// Featured Image Title
    $wp_customize->add_setting('design[fcontent01-title' . $fbsinumberd . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_fcontent01-title' . $fbsinumberd, array(
        'label'      => esc_html__('Featured Title First Part, Black Color', 'd5-design'). '-' . $fbsinumberd,
        'section'    => 'design_options',
        'settings'   => 'design[fcontent01-title' . $fbsinumberd .']'
    ));


 	$wp_customize->add_setting('design[fcontent02-title' . $fbsinumberd . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_fcontent02-title' . $fbsinumberd, array(
        'label'      => esc_html__('Featured Title Second Part, Orange Color', 'd5-design'). '-' . $fbsinumberd,
        'section'    => 'design_options',
        'settings'   => 'design[fcontent02-title' . $fbsinumberd .']'
    ));

// Featured Image Description
    $wp_customize->add_setting('design[fcontent-description' . $fbsinumberd . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_fcontent-description' . $fbsinumberd  , array(
        'label'      => esc_html__('Featured Description', 'd5-design') . '-' . $fbsinumberd,
        'section'    => 'design_options',
        'settings'   => 'design[fcontent-description' . $fbsinumberd .']',
		'type' 		 => 'textarea'
    ));
	
// Featured Link
    $wp_customize->add_setting('design[fcontent-link' . $fbsinumberd . ']', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_fcontent-link' . $fbsinumberd  , array(
        'label'      => esc_html__('Featured Link', 'd5-design') . '-' . $fbsinumberd,
        'section'    => 'design_options',
        'settings'   => 'design[fcontent-link' . $fbsinumberd .']'
    ));
	
  }
  
 //  Quote Text
    $wp_customize->add_setting('design[bottom-quotation]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_bottom-quotation', array(
        'label'      => esc_html__('Quote Text', 'd5-design'),
        'section'    => 'design_options',
        'settings'   => 'design[bottom-quotation]',
		'type' 		 => 'textarea'
    )); 
  
 

//  Front Page Post
    $wp_customize->add_setting('design[fpost]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('design_fpost', array(
        'label'      => esc_html__('Do not show any Posts or Page in the Front Page', 'd5-design'),
        'section'    => 'design_options',
        'settings'   => 'design[fpost]',
		'description' => esc_html__('Check the Box if you do not want to show any Posts or Page in the Front Page','d5-design'),
		'type' 		 => 'checkbox'
    ));
	
	$wp_customize->add_setting('design[feat-image]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feat-image', array(
        'label'    			=> esc_html__('Featured Image Background with Posts/Pages', 'd5-design') . '-' . $fbsinumber,
        'section'  			=> 'design_options',
        'settings' 			=> 'design[feat-image]',
		'description'   	=> esc_html__('Upload an image for the Featured Image Background.600px X 200px image is recommended','d5-design')
    )));


}


add_action('customize_register', 'design_customize_register');


	if ( ! function_exists( 'design_get_option' ) ) :
	function design_get_option( $design_name, $design_default = false ) {
	$design_config = get_option( 'design' );

	if ( ! isset( $design_config ) ) : return $design_default; else: $design_options = $design_config; endif;
	if ( isset( $design_options[$design_name] ) ):  return $design_options[$design_name]; else: return $design_default; endif;
	}
	endif;