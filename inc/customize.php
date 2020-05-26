<?php

function sunrain_customize_register($wp_customize){
	
	//checkbox sanitization function
    function sunrain_sanitize_checkbox( $input ){              
    	//returns true if checkbox is checked
      	return ( ( isset( $input ) && true == $input ) ? true : false );
    }
	
	//file input sanitization function
    function sunrain_sanitize_image( $file, $setting ) {
    	//allowed file types
        $mimes = array(
        	'jpg|jpeg|jpe' => 'image/jpeg',
        	'gif'          => 'image/gif',
        	'png'          => 'image/png'
        );
              
        //check file type from file name
      	$file_ext = wp_check_filetype( $file, $mimes );
              
        //if file has a valid mime type return it, otherwise return default
        return ( $file_ext['ext'] ? $file : $setting->default );
	}	
	
	$wp_customize->add_panel( 'sunrain_panel', array(
	    'priority' 			=> 10,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__( 'SunRain Options', 'sunrain' ),
	    'description' 		=> '',
	) );
	
// General Options Section =======================================================================
	$wp_customize->add_section('sunrain_genoption', array(
        'priority' 			=> 10,
		'capability'     	=> 'edit_theme_options',
		'title'    			=> esc_html__('General Options', 'sunrain'),
        'description'   	=> '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can<a href="https://wordpress.org/support/view/theme-reviews/sunrain?filter=5" target="_blank"> <strong>Review Here</strong></a></span><br /><br /><span class="donation">Need Logo Inserter, Multilayer Slider, Unlimited Slide Items, Links from Featured Boxes, More Control, More Features and Options? Try <a href="'.esc_url('https://d5creation.com/theme/sunrain/').'" target="_blank"><strong>SunRain Extend Edition</strong></a> for Many Exciting Features with Dedicated Support from D5 Creation team. There are Promotional Offers. You can avail those promotions from <a href="'.esc_url('https://d5creation.com/').'" target="_blank">D5 Creation Site</a></span><br /><br /><span class="donation"><a href="'.esc_url('http://demo.d5creation.com/themes/?theme=SunRain').'" target="_blank">Live Demo</a> of SunRain Extend</span></div>',
		'panel' 			=> 'sunrain_panel',
    ));
	

	//  Responsive Layout
    $wp_customize->add_setting('sunrain[responsive]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'sunrain_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_responsive', array(
        'label'      => esc_html__('Use Responsive Layout', 'sunrain'),
        'section'    => 'sunrain_genoption',
        'settings'   => 'sunrain[responsive]',
		'description' => esc_html__('Check the Box if you want the Responsive Layout of your Website','sunrain'),
		'type' 		 => 'checkbox'
    ));
	
	//  Slide Blog Posts
    $wp_customize->add_setting('sunrain[lbpostv]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'sunrain_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_lbpostv', array(
        'label'      => esc_html__('Show the Latest Blog Posts in Front Page', 'sunrain'),
        'section'    => 'sunrain_genoption',
        'settings'   => 'sunrain[lbpostv]',
		'description' => esc_html__('Check the Box if you want to Show the Latest Blog Posts in Front Page','sunrain'),
		'type' 		 => 'checkbox'
    ));
	
	
	//  Front Page Post/Page Visibility
    $wp_customize->add_setting('sunrain[fpostex]', array(
        'default'        	=> '2',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_fpostex', array(
        'label'      => esc_html__('Front Page Post/Page Visibility', 'sunrain'),
        'section'    => 'sunrain_genoption',
        'settings'   => 'sunrain[fpostex]',
		'description' => esc_html__('Select Option how you want to show or do not want to show Posts/Pages in the Front Page as per WordPress Reading Settings','sunrain'),
		'type'       => 'radio',
        'choices'    => array(
            '1' => esc_html__('Do not Show any Post or Page in the Front Page','sunrain'),
            '2' => esc_html__('Show Posts or Page and Left/Right Sidebar','sunrain'),
        ),
    ));
	
	
	// Contact Number
    $wp_customize->add_setting('sunrain[contactnumber]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_contactnumber' , array(
        'label'      => esc_html__('Contact Number', 'sunrain'),
        'section'    => 'sunrain_genoption',
        'settings'   => 'sunrain[contactnumber]'
    ));
	
	//  Fixed Menu
    $wp_customize->add_setting('sunrain[header-fixed]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'sunrain_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_header-fixed', array(
        'label'      => esc_html__('Main Menu Fixed during Page Scrolling ?', 'sunrain'),
        'section'    => 'sunrain_genoption',
        'settings'   => 'sunrain[header-fixed]',
		'description' => esc_html__('Check the Box if you want the Main Menu Fixed during Page Scrolling','sunrain'),
		'type' 		 => 'checkbox'
    ));
	
	
	
// Slide 1 Section =======================================================================
	$wp_customize->add_section( 'sunrain_slide1', array(
	    'priority' 			=> 11,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__( 'Sldie 1', 'sunrain' ),
	    'description' 		=> '',
	    'panel' 			=> 'sunrain_panel',
	) ); 
	
	//  Slide 01 Show/Hide
    $wp_customize->add_setting('sunrain[slideitemshow1]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'sunrain_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slideitemshow1', array(
        'label'      => esc_html__('Show this Slide', 'sunrain'),
        'section'    => 'sunrain_slide1',
        'settings'   => 'sunrain[slideitemshow1]',
		'description' => esc_html__('Show this Slide','sunrain'),
		'type' 		 => 'checkbox'
    ));
	
	
	//  Banner Images/ Slide Images
	$wp_customize->add_setting('sunrain[slide-image1]', array(
        'default'           => get_template_directory_uri() . '/images/victory.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sunrain_sanitize_image',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image1', array(
        'label'    			=> esc_html__('Slide 01 Image 01', 'sunrain'),
        'section'  			=> 'sunrain_slide1',
        'settings' 			=> 'sunrain[slide-image1]',
		'description'   	=> esc_html__('Upload an image. 500px X 420px PNG image is recommended','sunrain')
		
    )));
	
	$wp_customize->add_setting('sunrain[slide-image2]', array(
        'default'           => get_template_directory_uri() . '/images/cloud.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sunrain_sanitize_image',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image2', array(
        'label'    			=> esc_html__('Slide 01 Image 02', 'sunrain'),
        'section'  			=> 'sunrain_slide1',
        'settings' 			=> 'sunrain[slide-image2]',
		'description'   	=> esc_html__('Upload an image. 400px X 300px PNG image is recommended','sunrain')
		
    )));

	$wp_customize->add_setting('sunrain[slide-image3]', array(
        'default'           => get_template_directory_uri() . '/images/powered-by.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sunrain_sanitize_image',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image3', array(
        'label'    			=> esc_html__('Slide 01 Image 03', 'sunrain'),
        'section'  			=> 'sunrain_slide1',
        'settings' 			=> 'sunrain[slide-image3]',
		'description'   	=> esc_html__('Upload an image. 200px X 60px PNG image is recommended','sunrain')
		
    )));
	
	$wp_customize->add_setting('sunrain[slide-image4]', array(
        'default'           => get_template_directory_uri() . '/images/logo-back.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sunrain_sanitize_image',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image4', array(
        'label'    			=> esc_html__('Slide 01 Image 04', 'sunrain'),
        'section'  			=> 'sunrain_slide1',
        'settings' 			=> 'sunrain[slide-image4]',
		'description'   	=> esc_html__('Upload an image. 290px X 100px PNG image is recommended','sunrain')
		
    )));
	
	
	$wp_customize->add_setting('sunrain[slide-image5]', array(
        'default'           => get_template_directory_uri() . '/images/logo-small.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sunrain_sanitize_image',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image5', array(
        'label'    			=> esc_html__('Slide 01 Image 05', 'sunrain'),
        'section'  			=> 'sunrain_slide1',
        'settings' 			=> 'sunrain[slide-image5]',
		'description'   	=> esc_html__('Upload an image. 250px X 70px PNG image is recommended','sunrain')
		
    )));
	
	
// Slide 2 Section =======================================================================
	$wp_customize->add_section( 'sunrain_slide2', array(
	    'priority' 			=> 11,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__( 'Sldie 2', 'sunrain' ),
	    'description' 		=> '',
	    'panel' 			=> 'sunrain_panel',
	) ); 	
	
	//  Slide 02 Show/Hide
    $wp_customize->add_setting('sunrain[slideitemshow2]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'sunrain_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slideitemshow2', array(
        'label'      => esc_html__('Show this Slide', 'sunrain'),
        'section'    => 'sunrain_slide2',
        'settings'   => 'sunrain[slideitemshow2]',
		'description' => esc_html__('Show this Slide','sunrain'),
		'type' 		 => 'checkbox'
    ));
	
	$wp_customize->add_setting('sunrain[slide-image6]', array(
        'default'           => get_template_directory_uri() . '/images/success.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sunrain_sanitize_image',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image6', array(
        'label'    			=> esc_html__('Slide 02 Image', 'sunrain'),
        'section'  			=> 'sunrain_slide2',
        'settings' 			=> 'sunrain[slide-image6]',
		'description'   	=> esc_html__('Upload an image. 350px X 450px PNG image is recommended','sunrain')
		
    )));
	
   $wp_customize->add_setting('sunrain[slide-text1]', array(
        'default'        	=> esc_html__('WordPress','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text1' , array(
        'label'      => esc_html__('Slide 02 Text 01', 'sunrain'),
        'section'    => 'sunrain_slide2',
        'settings'   => 'sunrain[slide-text1]'
    ));
	
	
 $wp_customize->add_setting('sunrain[slide-text2]', array(
        'default'        	=> esc_html__('Most Userd CMS','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text2' , array(
        'label'      => esc_html__('Slide 02 Text 02', 'sunrain'),
        'section'    => 'sunrain_slide2',
        'settings'   => 'sunrain[slide-text2]'
    ));
	
	$wp_customize->add_setting('sunrain[slide-text3]', array(
        'default'        	=> esc_html__('Ultimate Freedom','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text3' , array(
        'label'      => esc_html__('Slide 02 Text 03', 'sunrain'),
        'section'    => 'sunrain_slide2',
        'settings'   => 'sunrain[slide-text3]'
    ));
	
	$wp_customize->add_setting('sunrain[slide-text4]', array(
        'default'        	=> esc_html__('World Leading','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text4' , array(
        'label'      => esc_html__('Slide 02 Text 04', 'sunrain'),
        'section'    => 'sunrain_slide2',
        'settings'   => 'sunrain[slide-text4]'
    ));
	
	$wp_customize->add_setting('sunrain[slide-text5]', array(
        'default'        	=> esc_html__('Free to Use','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text5' , array(
        'label'      => esc_html__('Slide 02 Text 05', 'sunrain'),
        'section'    => 'sunrain_slide2',
        'settings'   => 'sunrain[slide-text5]'
    ));	
		
	
// Heading 1 Section =======================================================================
	$wp_customize->add_section( 'sunrain_heading1', array(
	    'priority' 			=> 11,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__('Heading 01', 'sunrain'),
	    'description' 		=> '',
	    'panel' 			=> 'sunrain_panel',
	) ); 
	
	
// Heading Text
    $wp_customize->add_setting('sunrain[heading_text1]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_text1' , array(
        'label'      => esc_html__('Heading Title', 'sunrain'),
        'section'    => 'sunrain_heading1',
        'settings'   => 'sunrain[heading_text1]'
    ));
	
// Description
    $wp_customize->add_setting('sunrain[heading_des1]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_des1' , array(
        'label'      => esc_html__('Heading Description', 'sunrain'),
        'section'    => 'sunrain_heading1',
        'settings'   => 'sunrain[heading_des1]',
		'type' 		 => 'textarea'
    ));
	
// Heading Link Text
    $wp_customize->add_setting('sunrain[heading_btn1_text]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_btn1_text' , array(
        'label'      => esc_html__('Button Text', 'sunrain'),
        'section'    => 'sunrain_heading1',
        'settings'   => 'sunrain[heading_btn1_text]'
    ));

// Heading Link
    $wp_customize->add_setting('sunrain[heading_btn1_link]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_btn1_link' , array(
        'label'      => esc_html__('Button Link URL', 'sunrain'),
        'section'    => 'sunrain_heading1',
        'settings'   => 'sunrain[heading_btn1_link]'
    ));
	
// Heading 2 Section =======================================================================
	$wp_customize->add_section( 'sunrain_heading2', array(
	    'priority' 			=> 11,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__('Heading 02', 'sunrain'),
	    'description' 		=> '',
	    'panel' 			=> 'sunrain_panel',
	) ); 	
 
// Heading Text
    $wp_customize->add_setting('sunrain[heading_text2]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_text2' , array(
        'label'      => esc_html__('Heading Title', 'sunrain'),
        'section'    => 'sunrain_heading2',
        'settings'   => 'sunrain[heading_text2]'
    ));
	
// Description
    $wp_customize->add_setting('sunrain[heading_des2]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_des2' , array(
        'label'      => esc_html__('Heading Description', 'sunrain'),
        'section'    => 'sunrain_heading2',
        'settings'   => 'sunrain[heading_des2]',
		'type' 		 => 'textarea'
    ));
	

// Heading 3 Section =======================================================================
	$wp_customize->add_section( 'sunrain_heading3', array(
	    'priority' 			=> 11,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__('Heading 03', 'sunrain'),
	    'description' 		=> '',
	    'panel' 			=> 'sunrain_panel',
	) ); 
	
// Heading Text
    $wp_customize->add_setting('sunrain[heading_text3]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_text3' , array(
        'label'      => esc_html__('Heading Title', 'sunrain'),
        'section'    => 'sunrain_heading3',
        'settings'   => 'sunrain[heading_text3]'
    ));
	
// Description
    $wp_customize->add_setting('sunrain[heading_des3]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_des3' , array(
        'label'      => esc_html__('Heading Description', 'sunrain'),
        'section'    => 'sunrain_heading3',
        'settings'   => 'sunrain[heading_des3]',
		'type' 		 => 'textarea'
    ));


// Featured Boxes Section =======================================================================
	$wp_customize->add_section( 'sunrain_featured', array(
	    'priority' 			=> 11,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__( 'Featured Boxes', 'sunrain' ),
	    'description' 		=> '',
	    'panel' 			=> 'sunrain_panel',
	) ); 
	
	//  Featured Boxes Show/Hide
    $wp_customize->add_setting('sunrain[frfbox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'sunrain_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_frfbox', array(
        'label'      	=> esc_html__('Show the Featured Boxes in Front Page', 'sunrain'),
        'section'    	=> 'sunrain_featured',
        'settings'   	=> 'sunrain[frfbox]',
		'description' 	=> esc_html__('Check the Box if you want to Show the Featured Boxes in Front Page','sunrain'),
		'type' 		 	=> 'checkbox'
    ));

foreach (range(1,5) as $fbsinumber) {
		
 $wp_customize->add_setting('sunrain[featured-image' . $fbsinumber .']', array(
        'default'           => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image' . $fbsinumber, array(
        'label'    			=> esc_html__('Featured Image', 'sunrain') . '-' .$fbsinumber ,
        'section'  			=> 'sunrain_featured',
        'settings' 			=> 'sunrain[featured-image' . $fbsinumber .']',
		'description'   	=> esc_html__('Upload an image for the Featured Box. 200px X 200px image is recommended','sunrain')
		
    )));
	  
// Featured Title
    $wp_customize->add_setting('sunrain[featured-title' . $fbsinumber . ']', array(
        'default'        	=> esc_html__('SunRain Theme for SunRain','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_featured-title' . $fbsinumber, array(
        'label'      => esc_html__('Featured Title', 'sunrain'). '-' . $fbsinumber,
        'section'    => 'sunrain_featured',
        'settings'   => 'sunrain[featured-title' . $fbsinumber .']'
    ));


// Featured Description
    $wp_customize->add_setting('sunrain[featured-description' . $fbsinumber . ']', array(
        'default'        	=> esc_html__('The Color changing options of SunRain will give the WordPress Driven Site an attractive look. SunRain is super elegant and Professional Responsive Theme which will create the business widely expressed','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_textarea_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_featured-description' . $fbsinumber  , array(
        'label'      => esc_html__('Featured Description', 'sunrain') . '-' . $fbsinumber,
        'section'    => 'sunrain_featured',
        'settings'   => 'sunrain[featured-description' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }


// Social Links Section =======================================================================
	$wp_customize->add_section( 'sunrain_social', array(
	    'priority' 			=> 11,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> esc_html__( 'Social Links', 'sunrain' ),
	    'description' 		=> '',
	    'panel' 			=> 'sunrain_panel',
	) ); 

//  Social Links
	$wp_customize->add_setting('sunrain[fb-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_fb-link' , array(
        'label'      => esc_html__('Facebook Link', 'sunrain'),
        'section'    => 'sunrain_social',
        'settings'   => 'sunrain[fb-link]'
    ));
	
	$wp_customize->add_setting('sunrain[tw-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_tw-link' , array(
        'label'      => esc_html__('Twitter Link', 'sunrain'),
        'section'    => 'sunrain_social',
        'settings'   => 'sunrain[tw-link]'
    ));
	
	$wp_customize->add_setting('sunrain[yt-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_yt-link' , array(
        'label'      => esc_html__('YouTube Link', 'sunrain'),
        'section'    => 'sunrain_social',
        'settings'   => 'sunrain[yt-link]'
    ));
	
	$wp_customize->add_setting('sunrain[gplus-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_gplus-link' , array(
        'label'      => esc_html__('Google Plus Link', 'sunrain'),
        'section'    => 'sunrain_social',
        'settings'   => 'sunrain[gplus-link]'
    ));
	
	$wp_customize->add_setting('sunrain[picassa-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_picassa-link' , array(
        'label'      => esc_html__('Picassa Web Album Link', 'sunrain'),
        'section'    => 'sunrain_social',
        'settings'   => 'sunrain[picassa-link]'
    ));
	
	$wp_customize->add_setting('sunrain[li-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_li-link' , array(
        'label'      => esc_html__('Linked In Link', 'sunrain'),
        'section'    => 'sunrain_social',
        'settings'   => 'sunrain[li-link]'
    ));
	
	$wp_customize->add_setting('sunrain[feed-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_feed-link' , array(
        'label'      => esc_html__('Feed or Blog Link', 'sunrain'),
        'section'    => 'sunrain_social',
        'settings'   => 'sunrain[feed-link]'
    ));
}


add_action('customize_register', 'sunrain_customize_register');


	if ( ! function_exists( 'sunrain_get_option' ) ) :
	function sunrain_get_option( $sunrain_name, $sunrain_default = false ) {
	$sunrain_config = get_option( 'sunrain' );

	if ( ! isset( $sunrain_config ) ) : return $sunrain_default; else: $sunrain_options = $sunrain_config; endif;
	if ( isset( $sunrain_options[$sunrain_name] ) ):  return $sunrain_options[$sunrain_name]; else: return $sunrain_default; endif;
	}
	endif;