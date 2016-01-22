<?php

function smallbusiness_customize_register($wp_customize){

    
    $wp_customize->add_section('smallbusiness_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('Small Business OPTIONS', 'small-business'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can<a href="https://wordpress.org/support/view/theme-reviews/small-business?filter=5" target="_blank"> <strong>Review Here</strong></a></span><br /><br /><span class="donation">Need Logo Inserter, More Slides, More Control, More Features and Options? Try <a href="'.esc_url('http://d5creation.com/theme/smallbusiness/').'" target="_blank"><strong>Small Business Extend Edition</strong></a> for Many Exciting Features with Dedicated Support from D5 Creation team. There are Promotional Offers. You can avail those promotions from <a href="'.esc_url('http://d5creation.com/').'" target="_blank">D5 Creation Site</a></span><br /><br /><span class="donation"><a href="'.esc_url('http://demo.d5creation.com/themes/?theme=Small%20Business').'" target="_blank">Live Demo</a> of Small Business Extend</span><br /><br /><span class="donation"><a href="'.esc_url('http://d5creation.com/forums/topic/how-to-show-the-small-business-slide-show/').'" target="_blank">Tutorial</a> For Featured Image and Slide</span></div>	
		'
    ));
	
	
// Front Page Heading
    $wp_customize->add_setting('smallbusiness[heading_text]', array(
        'default'        	=> __('Go with Small Business Extend for exciting Post Options, Theme Options and Extra Functionalities','small-business'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('smallbusiness_heading_text' , array(
        'label'      => __('Front Page Heading', 'small-business'),
        'section'    => 'smallbusiness_options',
        'settings'   => 'smallbusiness[heading_text]'
    ));
	

	foreach (range(1,3) as $fbsinumber) {
	  
// Featured Image Title
    $wp_customize->add_setting('smallbusiness[featured-title' . $fbsinumber . ']', array(
        'default'        	=> __('Small Business Theme','small-business'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('smallbusiness_featured-title' . $fbsinumber, array(
        'label'      => __('Featured Title', 'small-business'). '-' . $fbsinumber,
        'section'    => 'smallbusiness_options',
        'settings'   => 'smallbusiness[featured-title' . $fbsinumber .']'
    ));


// Featured Image Description
    $wp_customize->add_setting('smallbusiness[featured-description' . $fbsinumber . ']', array(
        'default'        	=> __('The Customizable Background and other options of Small Business will give the WordPress Driven Site an attractive look.  Small Business Extend will give your Extra Freedom and Functionality which you must love','small-business'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('smallbusiness_featured-description' . $fbsinumber  , array(
        'label'      => __('Featured Description', 'small-business') . '-' . $fbsinumber,
        'section'    => 'smallbusiness_options',
        'settings'   => 'smallbusiness[featured-description' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
// Featured Links
    $wp_customize->add_setting('smallbusiness[featured-link' . $fbsinumber . ']', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('smallbusiness_featured-link' . $fbsinumber  , array(
        'label'      => __('Featured Link', 'small-business') . '-' . $fbsinumber,
        'section'    => 'smallbusiness_options',
        'settings'   => 'smallbusiness[featured-link' . $fbsinumber .']'
    ));
	
  }
  
 //  Quote Text
    $wp_customize->add_setting('smallbusiness[bottom-quotation]', array(
        'default'        	=> __('All the developers of D5 Creation have come from the disadvantaged part or group of the society. All have established themselves after a long and hard struggle in their life ----- D5 Creation Team',  'small-business'),
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('smallbusiness_bottom-quotation', array(
        'label'      => __('Quote Text', 'small-business'),
        'section'    => 'smallbusiness_options',
        'settings'   => 'smallbusiness[bottom-quotation]',
		'type' 		 => 'textarea'
    )); 
  
 

//  Front Page Post
    $wp_customize->add_setting('smallbusiness[fsidebar]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('smallbusiness_fsidebar', array(
        'label'      => __('Show the Footer Sidebar', 'small-business'),
        'section'    => 'smallbusiness_options',
        'settings'   => 'smallbusiness[fsidebar]',
		'description' => __('Uncheck this if you do not want to show the footer sidebar (Widgets) automatically','small-business'),
		'type' 		 => 'checkbox'
    ));

}


add_action('customize_register', 'smallbusiness_customize_register');


	if ( ! function_exists( 'smallbusiness_get_option' ) ) :
	function smallbusiness_get_option( $smallbusiness_name, $smallbusiness_default = false ) {
	$smallbusiness_config = get_option( 'smallbusiness' );

	if ( ! isset( $smallbusiness_config ) ) : return $smallbusiness_default; else: $smallbusiness_options = $smallbusiness_config; endif;
	if ( isset( $smallbusiness_options[$smallbusiness_name] ) ):  return $smallbusiness_options[$smallbusiness_name]; else: return $smallbusiness_default; endif;
	}
	endif;