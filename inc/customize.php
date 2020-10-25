<?php

function spark_customize_register($wp_customize){

    
    $wp_customize->add_section('spark_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('SPARK OPTIONS', 'spark'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can <a href="https://wordpress.org/support/view/theme-reviews/spark" target="_blank"><strong>Review Here</strong></a>.</span><br /><br /><br /><span class="donation"> Need More Features and Options including 3D Slides, Unlimited Slide Images, Links from Featured Boxes and 100+ Advanced Features and Controls? Try <a href="'.esc_url('https://d5creation.com/theme/spark/').'" target="_blank"><strong>SPARK Extend</strong></a></span><br /> <br /><br /><span class="donation"> You can Visit the SPARK Extend <a href="'.esc_url('http://demo.d5creation.com/themes/?theme=SPARK').'" target="_blank"><strong>DEMO 1</strong></a> and <a href="'.esc_url('http://demo.d5creation.com/themes/?theme=SPARK-2').'" target="_blank"><strong>DEMO 2</strong></a></span></div>'
    ));
	
	
//  Banner Image/ Slide Image 01
    $wp_customize->add_setting('spark[slide-image1]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image1', array(
        'label'    			=> esc_html__('Banner Image', 'spark'),
        'section'  			=> 'spark_options',
        'settings' 			=> 'spark[slide-image1]',
		'description'   	=> esc_html__('Upload a Banner Image. 1050px X 400px image is recommended','spark')
    )));

	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_heading', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> '&nbsp;&nbsp;&nbsp;&nbsp; - '.esc_html__('Front Page Heading', 'spark'),
        'description'   => ''
    ));	


// Front Page Heading
    $wp_customize->add_setting('spark[heading_text]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_heading_text' , array(
        'label'      => esc_html__('Front Page Heading', 'spark'),
        'section'    => 'spark_heading',
        'settings'   => 'spark[heading_text]'
    ));
	
// Front Page Heading Description
    $wp_customize->add_setting('spark[heading_des]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_heading_des' , array(
        'label'      => esc_html__('Front Page Heading Description', 'spark'),
        'section'    => 'spark_heading',
        'settings'   => 'spark[heading_des]',
		'type' 		 => 'textarea'
    )); 
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_featuredb', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> '&nbsp;&nbsp;&nbsp;&nbsp; - '.esc_html__('Featured Boxes', 'spark'),
        'description'   => ''
    ));		
	
//  First Row Subject
    $wp_customize->add_setting('spark[featuredr-title]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredr-title', array(
        'label'      => esc_html__('Input your Row Title Heret', 'spark'),
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featuredr-title]',
		'description' => esc_html__('Input your Row Title Here','spark')
    ));

//  First Row Description
    $wp_customize->add_setting('spark[featuredr-description]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredr-description', array(
        'label'      => esc_html__('Row Description', 'spark'),
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featuredr-description]',
		'description' => esc_html__('Input the description of Featured Areas','spark'),
		'type' 		 => 'textarea'
    ));
	

  	$fbsin=array("1","2","3");
	foreach ($fbsin as $fbsinumber) {
	  
//  Featured Image
    $wp_customize->add_setting('spark[featured-image'. $fbsinumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image'. $fbsinumber, array(
        'label'    			=> esc_html__('First Row Featured Image', 'spark') . '-' . $fbsinumber,
        'section'  			=> 'spark_featuredb',
        'settings' 			=> 'spark[featured-image'. $fbsinumber .']',
		'description'   	=> esc_html__('Upload an image for the Featured Box. 230px X 115px image is recommended','spark')
    )));
  
// Featured Image Title
    $wp_customize->add_setting('spark[featured-title' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-title' . $fbsinumber, array(
        'label'      => esc_html__('Title', 'spark'). '-' . $fbsinumber,
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featured-title' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('spark[featured-description' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-description' . $fbsinumber  , array(
        'label'      => esc_html__('Description', 'spark') . '-' . $fbsinumber,
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featured-description' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }
	

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_featuredc', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> '&nbsp;&nbsp;&nbsp;&nbsp; - '.esc_html__('Featured Contents', 'spark'),
        'description'   => ''
    ));	
  
  
//  Show Second Row Featured Boxs
    $wp_customize->add_setting('spark[srfbox]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_srfbox', array(
        'label'      => esc_html__('Show Second Row Featured Boxs', 'spark'),
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[srfbox]',
		'description' => esc_html__('Uncheck this if you do not want to show the Second Row Featured Boxs','spark'),
		'type' 		 => 'checkbox'
    ));
  
  
//  Second Row Subject
    $wp_customize->add_setting('spark[featuredrsecond-title]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredrsecond-title', array(
        'label'      => esc_html__('Row Subject', 'spark'),
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featuredrsecond-title]',
		'description' => esc_html__('Input your Row Title Here','spark')
    ));

//  Second Row Description
    $wp_customize->add_setting('spark[featuredrsecond-description]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredrsecond-description', array(
        'label'      => esc_html__('Second Row Description', 'spark'),
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featuredrsecond-description]',
		'description' => esc_html__('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive','spark'),
		'type' 		 => 'textarea'
    ));
  
  	foreach (range(1, 3) as $fbsinumber) {
  
// Featured Image Title
    $wp_customize->add_setting('spark[featured-title2' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-title2' . $fbsinumber, array(
        'label'      => esc_html__('Title', 'spark'). '-' . $fbsinumber,
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featured-title2' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('spark[featured-description2' . $fbsinumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-description2' . $fbsinumber  , array(
        'label'      => esc_html__('Description', 'spark') . '-' . $fbsinumber,
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featured-description2' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_staffb', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> '&nbsp;&nbsp;&nbsp;&nbsp; - '.esc_html__('Staff Box', 'spark'),
        'description'   => ''
    ));	

 
 // Staff Box Heading
    $wp_customize->add_setting('spark[staffboxes-heading]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-heading' , array(
        'label'      => esc_html__('Staff Boxes Heading', 'spark'),
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-heading]'
    ));
	
// Staff Box Description
    $wp_customize->add_setting('spark[staffboxes-heading-des]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-heading-des' , array(
        'label'      => esc_html__('Staff Boxes Heading Description', 'spark'),
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-heading-des]',
		'type' 		 => 'textarea'
    ));

  
 	  
//  Staff Boxes

	foreach (range(1, 6 ) as $staffboxsnumber) {
	
//  Staff Box Image
    $wp_customize->add_setting('spark[staffboxes-image' . $staffboxsnumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'staffboxes-image' . $staffboxsnumber, array(
        'label'    			=> esc_html__('Staff Image', 'spark') . '-' .$staffboxsnumber ,
        'section'  			=> 'spark_staffb',
        'settings' 			=> 'spark[staffboxes-image' . $staffboxsnumber .']',
		'description'   	=> esc_html__('Uoload the Staff Image. The Sample Image is 300px X 200px','spark')
		
    )));
	
// Staff Box Title
    $wp_customize->add_setting('spark[staffboxes-title' . $staffboxsnumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-title' . $staffboxsnumber, array(
        'label'      => esc_html__('Staff Name', 'spark'). '-' . $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-title' . $staffboxsnumber .']'
    ));
	
	
// Staff Box Caption
    $wp_customize->add_setting('spark[staffboxes-description' . $staffboxsnumber . ']', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-description' . $staffboxsnumber, array(
        'label'      => esc_html__('Staff Designation', 'spark'). '-' . $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-description' . $staffboxsnumber .']',
		'type' 		 => 'textarea'
    ));
	
	$wp_customize->add_setting('spark[staffboxes-linka' . $staffboxsnumber .']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-linka' . $staffboxsnumber, array(
        'label'      => esc_html__('Staff Social Links - ',  'spark'). $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-linka' . $staffboxsnumber .']',
		'description' => esc_html__('Input Your Social Page Link. Example: https://wordpress.org/themes/author/d5creation', 'spark'),
    ));	
	
	$wp_customize->add_setting('spark[staffboxes-linkb' . $staffboxsnumber .']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-linkb' . $staffboxsnumber, array(
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-linkb' . $staffboxsnumber .']',

    ));	
	
	$wp_customize->add_setting('spark[staffboxes-linkc' . $staffboxsnumber .']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-linkc' . $staffboxsnumber, array(
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-linkc' . $staffboxsnumber .']',

    ));	
	
	$wp_customize->add_setting('spark[staffboxes-link' . $staffboxsnumber .']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-link' . $staffboxsnumber, array(
        'label'      => esc_html__('Profile Link - ',  'spark'). $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-link' . $staffboxsnumber .']',
		'description' => esc_html__('Input Your Profile Page Link here','spark'),
    ));	
	
	}
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_sociall', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> '&nbsp;&nbsp;&nbsp;&nbsp; - '.esc_html__('Social Links', 'spark'),
        'description'   => esc_html__('Input Your Social Page Link. Example: http://wordpress.org/d5creation', 'spark')
    ));	

//  Social Links
	foreach (range(1, 5 ) as $numslinksn) {
    $wp_customize->add_setting('spark[sl' . $numslinksn .']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_sl' . $numslinksn, array(
        'label'      => esc_html__('Social Link - ',  'spark'). $numslinksn,
        'section'    => 'spark_sociall',
        'settings'   => 'spark[sl' . $numslinksn .']',
		'description' => '',
    ));	
	}
}


add_action('customize_register', 'spark_customize_register');


	if ( ! function_exists( 'spark_get_option' ) ) :
	function spark_get_option( $spark_name, $spark_default = false ) {
	$spark_config = get_option( 'spark' );

	if ( ! isset( $spark_config ) ) : return $spark_default; else: $spark_options = $spark_config; endif;
	if ( isset( $spark_options[$spark_name] ) ):  return $spark_options[$spark_name]; else: return $spark_default; endif;
	}
	endif;