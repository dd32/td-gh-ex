<?php

function awesome_customize_register($wp_customize){

    
    $wp_customize->add_section('awesome_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('AWESOME OPTIONS', 'awesome'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can<a href="https://wordpress.org/support/view/theme-reviews/awesome" target="_blank"> <strong>Review Here</strong></a></span><br /><br /><br /><span class="donation"> Need More Features and Options including Multi Layer Slides, Unlimited Slide Items, Links from Featured Boxes, Portfolio and 100+ Advanced Features and Controls? Try <a href="http://d5creation.com/theme/awesome/" target="_blank"><strong>Awesome Extend</strong></a></span><br /> <br /><br /><span class="donation"> You can Visit the Awesome Extend <a href="http://demo.d5creation.com/themes/?theme=Awesome" target="_blank"><strong>DEMO 01</strong></a> and <a href="http://demo.d5creation.com/themes/?theme=Awesome-Box" target="_blank"><strong>DEMO 02</strong></a></span>
	</div>'
    ));
	
//  Social Links
	foreach (range(1, 5 ) as $numslinksn) {
    $wp_customize->add_setting('awesome[sl' . $numslinksn .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_sl' . $numslinksn, array(
        'label'      => __('Social Link - ',  'awesome'). $numslinksn,
        'section'    => 'awesome_options',
        'settings'   => 'awesome[sl' . $numslinksn .']',
		'description' => __('Input Your Social Page Link. Example: <b>http://wordpress.org/d5creation</b>.  If you do not want to show anything here leave the box blank. Supported Links are: wordpress.org, wordpress.com, dribbble.com, github.com, tumblr.com, youtube.com, flickr.com, vimeo.com, codepen.io, linkedin.com', 'awesome'),
    ));	
	}
	
//  Banner Images/ Slide Images

	foreach (range(1, 3 ) as $sldksn) {

    $wp_customize->add_setting('awesome[slide-back'.$sldksn.']', array(
        'default'           => get_template_directory_uri() . '/images/slide/slideback'.$sldksn.'.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-back'.$sldksn, array(
        'label'    			=> __('Slide Image-', 'awesome') . $sldksn,
        'section'  			=> 'awesome_options',
        'settings' 			=> 'awesome[slide-back'.$sldksn.']',
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

	
	
	foreach (range(1,3) as $fbsinumber) {
	  
// Featured Title
    $wp_customize->add_setting('awesome[featured-title' . $fbsinumber . ']', array(
        'default'        	=> __('Awesome Responsive','awesome'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_featured-title' . $fbsinumber, array(
        'label'      => __('Featured Title', 'awesome'). '-' . $fbsinumber,
        'section'    => 'awesome_options',
        'settings'   => 'awesome[featured-title' . $fbsinumber .']'
    ));


// Featured Description
    $wp_customize->add_setting('awesome[featured-description' . $fbsinumber . ']', array(
        'default'        	=> __('The Color changing options of Awesome will give the WordPress Driven Site an attractive look. Awesome is super elegant and Professional Responsive Theme which will create the business widely expressed','awesome'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('awesome_featured-description' . $fbsinumber  , array(
        'label'      => __('Featured Description', 'awesome') . '-' . $fbsinumber,
        'section'    => 'awesome_options',
        'settings'   => 'awesome[featured-description' . $fbsinumber .']',
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