<?php

function spark_customize_register($wp_customize){

    
    $wp_customize->add_section('spark_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('SPARK OPTIONS', 'spark'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can <a href="https://wordpress.org/support/view/theme-reviews/spark" target="_blank"><strong>Review Here</strong></a>.</span><br /><br /><br /><span class="donation"> Need More Features and Options including 3D Slides, Unlimited Slide Images, Links from Featured Boxes and 100+ Advanced Features and Controls? Try <a href="'.esc_url('https://d5creation.com/theme/spark/').'" target="_blank"><strong>SPARK Extend</strong></a></span><br /> <br /><br /><span class="donation"> You can Visit the SPARK Extend <a href="'.esc_url('http://demo.d5creation.com/themes/?theme=SPARK').'" target="_blank"><strong>DEMO 1</strong></a> and <a href="'.esc_url('http://demo.d5creation.com/themes/?theme=SPARK-2').'" target="_blank"><strong>DEMO 2</strong></a></span></div>'
    ));
	
	
//  Banner Image/ Slide Image 01
    $wp_customize->add_setting('spark[slide-image1]', array(
        'default'           => get_template_directory_uri() . '/images/slide-image/slide-image1.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image1', array(
        'label'    			=> __('Banner Image', 'spark'),
        'section'  			=> 'spark_options',
        'settings' 			=> 'spark[slide-image1]',
		'description'   	=> __('Upload a Banner Image. 1050px X 400px image is recommended','spark')
    )));

	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_heading', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Heading', 'spark'),
        'description'   => ''
    ));	


// Front Page Heading
    $wp_customize->add_setting('spark[heading_text]', array(
        'default'        	=> __('Welcome to the SPARK WordPress Theme!','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_heading_text' , array(
        'label'      => __('Front Page Heading', 'spark'),
        'section'    => 'spark_heading',
        'settings'   => 'spark[heading_text]'
    ));
	
// Front Page Heading Description
    $wp_customize->add_setting('spark[heading_des]', array(
        'default'        	=> __('You can use SPARK Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_heading_des' , array(
        'label'      => __('Front Page Heading Description', 'spark'),
        'section'    => 'spark_heading',
        'settings'   => 'spark[heading_des]',
		'type' 		 => 'textarea'
    )); 
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_featuredb', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Featured Boxes', 'spark'),
        'description'   => ''
    ));		
	
//  First Row Subject
    $wp_customize->add_setting('spark[featuredr-title]', array(
        'default'        	=> __('Recent Works',  'spark'),
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredr-title', array(
        'label'      => __('Input your Row Title Heret', 'spark'),
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featuredr-title]',
		'description' => __('Input your Row Title Here','spark')
    ));

//  First Row Description
    $wp_customize->add_setting('spark[featuredr-description]', array(
        'default'        	=> __('The Color changing options of SPARK will give the WordPress Driven Site an attractive look',  'spark'),
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredr-description', array(
        'label'      => __('Row Description', 'spark'),
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featuredr-description]',
		'description' => __('Input the description of Featured Areas','spark'),
		'type' 		 => 'textarea'
    ));
	

  	$fbsin=array("1","2","3");
	foreach ($fbsin as $fbsinumber) {
	  
//  Featured Image
    $wp_customize->add_setting('spark[featured-image'. $fbsinumber .']', array(
        'default'           => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image'. $fbsinumber, array(
        'label'    			=> __('First Row Featured Image', 'spark') . '-' . $fbsinumber,
        'section'  			=> 'spark_featuredb',
        'settings' 			=> 'spark[featured-image'. $fbsinumber .']',
		'description'   	=> __('Upload an image for the Featured Box. 230px X 115px image is recommended','spark')
    )));
  
// Featured Image Title
    $wp_customize->add_setting('spark[featured-title' . $fbsinumber . ']', array(
        'default'        	=> __('SPARK Theme for Small Business','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-title' . $fbsinumber, array(
        'label'      => __('Title', 'spark'). '-' . $fbsinumber,
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featured-title' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('spark[featured-description' . $fbsinumber . ']', array(
        'default'        	=> __('SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-description' . $fbsinumber  , array(
        'label'      => __('Description', 'spark') . '-' . $fbsinumber,
        'section'    => 'spark_featuredb',
        'settings'   => 'spark[featured-description' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }
	

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_featuredc', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Featured Contents', 'spark'),
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
        'label'      => __('Show Second Row Featured Boxs', 'spark'),
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[srfbox]',
		'description' => __('Uncheck this if you do not want to show the Second Row Featured Boxs','spark'),
		'type' 		 => 'checkbox'
    ));
  
  
//  Second Row Subject
    $wp_customize->add_setting('spark[featuredrsecond-title]', array(
        'default'        	=> __('Our Services',  'spark'),
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredrsecond-title', array(
        'label'      => __('Row Subject', 'spark'),
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featuredrsecond-title]',
		'description' => __('Input your Row Title Here','spark')
    ));

//  Second Row Description
    $wp_customize->add_setting('spark[featuredrsecond-description]', array(
        'default'        	=> __('SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed',  'spark'),
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featuredrsecond-description', array(
        'label'      => __('Second Row Description', 'spark'),
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featuredrsecond-description]',
		'description' => __('Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive','spark'),
		'type' 		 => 'textarea'
    ));
  
  	foreach (range(1, 3) as $fbsinumber) {
  
// Featured Image Title
    $wp_customize->add_setting('spark[featured-title2' . $fbsinumber . ']', array(
        'default'        	=> __('SPARK Theme for Business','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-title2' . $fbsinumber, array(
        'label'      => __('Title', 'spark'). '-' . $fbsinumber,
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featured-title2' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('spark[featured-description2' . $fbsinumber . ']', array(
        'default'        	=> __('SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed. The Color changing options of SPARK will give the WordPress Driven Site an attractive look','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_featured-description2' . $fbsinumber  , array(
        'label'      => __('Description', 'spark') . '-' . $fbsinumber,
        'section'    => 'spark_featuredc',
        'settings'   => 'spark[featured-description2' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_staffb', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Staff Box', 'spark'),
        'description'   => ''
    ));	

 
 // Staff Box Heading
    $wp_customize->add_setting('spark[staffboxes-heading]', array(
        'default'        	=> __('WE ARE INSIDE','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-heading' , array(
        'label'      => __('Staff Boxes Heading', 'spark'),
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-heading]'
    ));
	
// Staff Box Description
    $wp_customize->add_setting('spark[staffboxes-heading-des]', array(
        'default'        	=> __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-heading-des' , array(
        'label'      => __('Staff Boxes Heading Description', 'spark'),
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-heading-des]',
		'type' 		 => 'textarea'
    ));

  
 	  
//  Staff Boxes

	foreach (range(1, 6 ) as $staffboxsnumber) {
	
//  Staff Box Image
    $wp_customize->add_setting('spark[staffboxes-image' . $staffboxsnumber .']', array(
        'default'           => get_template_directory_uri() . '/images/stf.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'staffboxes-image' . $staffboxsnumber, array(
        'label'    			=> __('Staff Image', 'spark') . '-' .$staffboxsnumber ,
        'section'  			=> 'spark_staffb',
        'settings' 			=> 'spark[staffboxes-image' . $staffboxsnumber .']',
		'description'   	=> __('Uoload the Staff Image. The Sample Image is 300px X 200px','spark')
		
    )));
	
// Staff Box Title
    $wp_customize->add_setting('spark[staffboxes-title' . $staffboxsnumber . ']', array(
        'default'        	=> __('OUR PROUD STAFF ',  'spark'). $staffboxsnumber,
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-title' . $staffboxsnumber, array(
        'label'      => __('Staff Name', 'spark'). '-' . $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-title' . $staffboxsnumber .']'
    ));
	
	
// Staff Box Caption
    $wp_customize->add_setting('spark[staffboxes-description' . $staffboxsnumber . ']', array(
        'default'        	=> __('SPARK  is a Professional Responsive Theme','spark'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-description' . $staffboxsnumber, array(
        'label'      => __('Staff Designation', 'spark'). '-' . $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-description' . $staffboxsnumber .']',
		'type' 		 => 'textarea'
    ));
	
	$wp_customize->add_setting('spark[staffboxes-linka' . $staffboxsnumber .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-linka' . $staffboxsnumber, array(
        'label'      => __('Staff Social Links - ',  'spark'). $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-linka' . $staffboxsnumber .']',
		'description' => __('Input Your Social Page Link. Example: <b>https://wordpress.org/themes/author/d5creation</b>', 'spark'),
    ));	
	
	$wp_customize->add_setting('spark[staffboxes-linkb' . $staffboxsnumber .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-linkb' . $staffboxsnumber, array(
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-linkb' . $staffboxsnumber .']',

    ));	
	
	$wp_customize->add_setting('spark[staffboxes-linkc' . $staffboxsnumber .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-linkc' . $staffboxsnumber, array(
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-linkc' . $staffboxsnumber .']',

    ));	
	
	$wp_customize->add_setting('spark[staffboxes-link' . $staffboxsnumber .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_staffboxes-link' . $staffboxsnumber, array(
        'label'      => __('Profile Link - ',  'spark'). $staffboxsnumber,
        'section'    => 'spark_staffb',
        'settings'   => 'spark[staffboxes-link' . $staffboxsnumber .']',
		'description' => __('Input Your Profile Page Link here','spark'),
    ));	
	
	}
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('spark_sociall', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Social Links', 'spark'),
        'description'   => __('Input Your Social Page Link. Example: <b>http://wordpress.org/d5creation</b>', 'spark')
    ));	

//  Social Links
	foreach (range(1, 5 ) as $numslinksn) {
    $wp_customize->add_setting('spark[sl' . $numslinksn .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('spark_sl' . $numslinksn, array(
        'label'      => __('Social Link - ',  'spark'). $numslinksn,
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