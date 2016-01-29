<?php

function sunrain_customize_register($wp_customize){

    
    $wp_customize->add_section('sunrain_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('SunRain Options', 'sunrain'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can<a href="https://wordpress.org/support/view/theme-reviews/sunrain?filter=5" target="_blank"> <strong>Review Here</strong></a></span><br /><br /><span class="donation">Need Logo Inserter, Multilayer Slider, Unlimited Slide Items, Links from Featured Boxes, More Control, More Features and Options? Try <a href="'.esc_url('http://d5creation.com/theme/sunrain/').'" target="_blank"><strong>SunRain Extend Edition</strong></a> for Many Exciting Features with Dedicated Support from D5 Creation team. There are Promotional Offers. You can avail those promotions from <a href="'.esc_url('http://d5creation.com/').'" target="_blank">D5 Creation Site</a></span><br /><br /><span class="donation"><a href="'.esc_url('http://demo.d5creation.com/themes/?theme=SunRain').'" target="_blank">Live Demo</a> of SunRain Extend</span></div>'
    ));
	

//  Responsive Layout
    $wp_customize->add_setting('sunrain[responsive]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_responsive', array(
        'label'      => __('Use Responsive Layout', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[responsive]',
		'description' => __('Check the Box if you want the Responsive Layout of your Website','sunrain'),
		'type' 		 => 'checkbox'
    ));
	
	
//  Front Page Post/Page Visibility
    $wp_customize->add_setting('sunrain[fpostex]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_fpostex', array(
        'label'      => __('Front Page Post/Page Visibility', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[fpostex]',
		'description' => __('Select Option how you want to show or do not want to show Posts/Pages in the Front Page as per WordPress Reading Settings','sunrain'),
		'type'       => 'radio',
        'choices'    => array(
            '1' => 'Do not Show any Post or Page in the Front Page',
            '2' => 'Show Posts or Page and Left/Right Sidebar',
        ),
    ));
	
	
// Heading Text
    $wp_customize->add_setting('sunrain[heading_text1]', array(
        'default'        	=> __('WordPress is web software you can use to create websites!','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_text1' , array(
        'label'      => __('Front Page Heading 01', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_text1]'
    ));
	
// Description
    $wp_customize->add_setting('sunrain[heading_des1]', array(
        'default'        	=> __('It is Amazing!  Over 60 million people have chosen WordPress to power the place on the web','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_des1' , array(
        'label'      => __('Front Page Heading 01 Description', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_des1]',
		'type' 		 => 'textarea'
    ));
	
// Heading Text
    $wp_customize->add_setting('sunrain[heading_btn1_text]', array(
        'default'        	=> __('Learn More','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_btn1_text' , array(
        'label'      => __('Heading 01 Button Text', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_btn1_text]'
    ));

// Heading Link
    $wp_customize->add_setting('sunrain[heading_btn1_link]', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_btn1_link' , array(
        'label'      => __('Heading 01 Button URL', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_btn1_link]'
    ));
 
// Heading Text
    $wp_customize->add_setting('sunrain[heading_text2]', array(
        'default'        	=> __('WordPress is web software you can use to create websites!','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_text2' , array(
        'label'      => __('Front Page Heading 02', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_text2]'
    ));
	
// Description
    $wp_customize->add_setting('sunrain[heading_des2]', array(
        'default'        	=> __('The core software is built by hundreds of community volunteers, and when you are ready for more there are thousands of plugins and themes available to transform your site into almost anything you can imagine. Over 60 million people have chosen WordPress to power the place on the web they call "home" <em>- we would love you to join the family','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_des2' , array(
        'label'      => __('Front Page Heading 02 Description', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_des2]',
		'type' 		 => 'textarea'
    ));
	
	
// Heading Text
    $wp_customize->add_setting('sunrain[heading_text3]', array(
        'default'        	=> __('WordPress is web software you can use to create websites!','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_text3' , array(
        'label'      => __('Front Page Heading 03', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_text3]'
    ));
	
// Description
    $wp_customize->add_setting('sunrain[heading_des3]', array(
        'default'        	=> __('It is Amazing!  Over 60 million people have chosen WordPress to power the place on the web','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_heading_des3' , array(
        'label'      => __('Front Page Heading 03 Description', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[heading_des3]',
		'type' 		 => 'textarea'
    ));

	

	foreach (range(1,5) as $fbsinumber) {
		
 $wp_customize->add_setting('sunrain[featured-image' . $fbsinumber .']', array(
        'default'           => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image' . $fbsinumber, array(
        'label'    			=> __('Featured Image', 'sunrain') . '-' .$fbsinumber ,
        'section'  			=> 'sunrain_options',
        'settings' 			=> 'sunrain[featured-image' . $fbsinumber .']',
		'description'   	=> __('Upload an image for the Featured Box. 200px X 200px image is recommended','sunrain')
		
    )));
	  
// Featured Title
    $wp_customize->add_setting('sunrain[featured-title' . $fbsinumber . ']', array(
        'default'        	=> __('SunRain Theme for SunRain','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_featured-title' . $fbsinumber, array(
        'label'      => __('Featured Title', 'sunrain'). '-' . $fbsinumber,
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[featured-title' . $fbsinumber .']'
    ));


// Featured Description
    $wp_customize->add_setting('sunrain[featured-description' . $fbsinumber . ']', array(
        'default'        	=> __('The Color changing options of SunRain will give the WordPress Driven Site an attractive look. SunRain is super elegant and Professional Responsive Theme which will create the business widely expressed','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_featured-description' . $fbsinumber  , array(
        'label'      => __('Featured Description', 'sunrain') . '-' . $fbsinumber,
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[featured-description' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }



//  Social Links
	$wp_customize->add_setting('sunrain[gplus-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_gplus-link' , array(
        'label'      => __('Google Plus Link', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[gplus-link]'
    ));
	
	$wp_customize->add_setting('sunrain[picassa-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_picassa-link' , array(
        'label'      => __('Picassa Web Album Link', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[picassa-link]'
    ));
	
	$wp_customize->add_setting('sunrain[li-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_li-link' , array(
        'label'      => __('Linked In Link', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[li-link]'
    ));
	
	$wp_customize->add_setting('sunrain[feed-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_feed-link' , array(
        'label'      => __('Feed or Blog Link', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[feed-link]'
    ));
	
//  Banner Images/ Slide Images
	$wp_customize->add_setting('sunrain[slide-image1]', array(
        'default'           => get_template_directory_uri() . '/images/victory.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image1', array(
        'label'    			=> __('Slide 01 Image 01', 'sunrain'),
        'section'  			=> 'sunrain_options',
        'settings' 			=> 'sunrain[slide-image1]',
		'description'   	=> __('Upload an image. 500px X 420px PNG image is recommended','sunrain')
		
    )));
	
	$wp_customize->add_setting('sunrain[slide-image2]', array(
        'default'           => get_template_directory_uri() . '/images/cloud.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image2', array(
        'label'    			=> __('Slide 01 Image 02', 'sunrain'),
        'section'  			=> 'sunrain_options',
        'settings' 			=> 'sunrain[slide-image2]',
		'description'   	=> __('Upload an image. 400px X 300px PNG image is recommended','sunrain')
		
    )));

	$wp_customize->add_setting('sunrain[slide-image3]', array(
        'default'           => get_template_directory_uri() . '/images/powered-by.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image3', array(
        'label'    			=> __('Slide 01 Image 03', 'sunrain'),
        'section'  			=> 'sunrain_options',
        'settings' 			=> 'sunrain[slide-image3]',
		'description'   	=> __('Upload an image. 200px X 60px PNG image is recommended','sunrain')
		
    )));
	
	$wp_customize->add_setting('sunrain[slide-image4]', array(
        'default'           => get_template_directory_uri() . '/images/logo-back.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image4', array(
        'label'    			=> __('Slide 01 Image 04', 'sunrain'),
        'section'  			=> 'sunrain_options',
        'settings' 			=> 'sunrain[slide-image4]',
		'description'   	=> __('Upload an image. 290px X 100px PNG image is recommended','sunrain')
		
    )));
	
	
	$wp_customize->add_setting('sunrain[slide-image5]', array(
        'default'           => get_template_directory_uri() . '/images/logo-small.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image5', array(
        'label'    			=> __('Slide 01 Image 05', 'sunrain'),
        'section'  			=> 'sunrain_options',
        'settings' 			=> 'sunrain[slide-image5]',
		'description'   	=> __('Upload an image. 250px X 70px PNG image is recommended','sunrain')
		
    )));
	
	
	$wp_customize->add_setting('sunrain[slide-image6]', array(
        'default'           => get_template_directory_uri() . '/images/success.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image6', array(
        'label'    			=> __('Slide 02 Image', 'sunrain'),
        'section'  			=> 'sunrain_options',
        'settings' 			=> 'sunrain[slide-image6]',
		'description'   	=> __('Upload an image. 350px X 450px PNG image is recommended','sunrain')
		
    )));
	
   $wp_customize->add_setting('sunrain[slide-text1]', array(
        'default'        	=> __('WordPress','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text1' , array(
        'label'      => __('Slide 02 Text 01', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[slide-text1]'
    ));
	
	
 $wp_customize->add_setting('sunrain[slide-text2]', array(
        'default'        	=> __('Most Userd CMS','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text2' , array(
        'label'      => __('Slide 02 Text 02', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[slide-text2]'
    ));
	
	$wp_customize->add_setting('sunrain[slide-text3]', array(
        'default'        	=> __('Ultimate Freedom','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text3' , array(
        'label'      => __('Slide 02 Text 03', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[slide-text3]'
    ));
	
	$wp_customize->add_setting('sunrain[slide-text4]', array(
        'default'        	=> __('World Leading','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text4' , array(
        'label'      => __('Slide 02 Text 04', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[slide-text4]'
    ));
	
	$wp_customize->add_setting('sunrain[slide-text5]', array(
        'default'        	=> __('Free to Use','sunrain'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('sunrain_slide-text5' , array(
        'label'      => __('Slide 02 Text 05', 'sunrain'),
        'section'    => 'sunrain_options',
        'settings'   => 'sunrain[slide-text5]'
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