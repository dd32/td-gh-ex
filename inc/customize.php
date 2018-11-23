<?php

function easy_customize_register($wp_customize){

    
    $wp_customize->add_section('easy_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('Easy OPTIONS', 'easy'),
        'description'   => '<div class="infohead"><span class="donation">A Theme is an effort of many sleepless nights of the Developers.  If you like this FREEE Theme You can consider for a 5 star rating and honest review. Your review will inspire us. You can <a href="https://wordpress.org/support/view/theme-reviews/easy" target="_blank"><strong>Review Here</strong></a>.</span><br /><br /><span class="donation">Need More Features and Options including Color Changing, Unlimited Slide Images, Advertising and 100+ Advanced Features and Controls? Try <a href="'.esc_url('https://d5creation.com/theme/easy/').'" target="_blank"><strong>Easy Extend</strong></a></span><br /><br /><span class="donation"> You can Visit the Easy Extend <a href="'.esc_url('http://demo.d5creation.com/themes/?theme=Easy').'" target="_blank"><strong>DEMO Here</strong></a></span></div>'
    ));
	
	//  Responsive Layout
    $wp_customize->add_setting('easy[responsive]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('easy_responsive', array(
        'label'      => __('Activate the Responsive Layout', 'easy'),
        'section'    => 'easy_options',
        'settings'   => 'easy[responsive]',
		'description' => __('You can Activate the Responsive Layout Checking This Box','easy'),
		'type' 		 => 'checkbox'
    ));
	
	$easy_contype = array( '1' => __('Full Content in Blog Page. Also Support Read More Button if inserted during Editing', 'easy'), '2' => __('Some Words and Read More Button in the Blog Page', 'easy'));
	
	
	//  Content or Excerpt
    $wp_customize->add_setting('easy[contype]', array(
        'default'        	=> '2',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('easy_contype', array(
        'label'      	=> __('Select the Content Type in the Blog Page', 'easy'),
        'section'    	=> 'easy_options',
        'settings'   	=> 'easy[contype]',
		'description' 	=> __('Select whether you want to show the Full / Selected Content or Some Words and Read More Button Automatically','easy'),
		'type' 		 	=> 'radio',
		'choices'		=> $easy_contype
    ));
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 	$wp_customize->add_section('easy_slide', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Slide', 'easy'),
        'description'   => ''
    ));	
	
//  Slide
    $wp_customize->add_setting('easy[main-slide-show]', array(
        'default'        	=> '0',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('easy_main-slide-show', array(
        'label'      => __('Show the Slider', 'easy'),
        'section'    => 'easy_slide',
        'settings'   => 'easy[main-slide-show]',
		'description' => __('You can show the Slider Checking This Box','easy'),
		'type' 		 => 'checkbox'
    ));
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('easy_head', array(
        'priority' 		=> 12,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Heading', 'easy'),
        'description'   => ''
    ));	
	
// Front Page Heading
    $wp_customize->add_setting('easy[heading_text]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('easy_heading_text' , array(
        'label'      => __('Front Page Heading', 'easy'),
        'section'    => 'easy_head',
        'settings'   => 'easy[heading_text]',
		'type' 		 => 'textarea'
    )); 
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('easy_quote', array(
        'priority' 		=> 13,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Bottom Quotation', 'easy'),
        'description'   => ''
    ));	
	
// Front Page Bottom Quotation
    $wp_customize->add_setting('easy[bottom-quotation1]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('easy_bottom-quotation1' , array(
        'label'      => __('Front Page Bottom Quotation', 'easy'),
        'section'    => 'easy_quote',
        'settings'   => 'easy[bottom-quotation1]',
		'type' 		 => 'textarea'
    ));	
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('easy_sociall', array(
        'priority' 		=> 14,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Social Links', 'easy'),
        'description'   => __('Input Your Social Page Link. Example: <b>http://wordpress.org/d5creation</b>', 'easy')
    ));	

//  Social Links
	foreach (range(1, 3 ) as $numslinksn) {
    $wp_customize->add_setting('easy[sl' . $numslinksn .']', array(
        'default'        	=> 'https://wordpress.org/themes/author/d5creation',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('easy_sl' . $numslinksn, array(
        'label'      => __('Social Link - ',  'easy'). $numslinksn,
        'section'    => 'easy_sociall',
        'settings'   => 'easy[sl' . $numslinksn .']',
		'description' => '',
    ));	
	}

}

add_action('customize_register', 'easy_customize_register');


	if ( ! function_exists( 'easy_get_option' ) ) :
	function easy_get_option( $easy_name, $easy_default = false ) {
	$easy_config = get_option( 'easy' );

	if ( ! isset( $easy_config ) ) : return $easy_default; else: $easy_options = $easy_config; endif;
	if ( isset( $easy_options[$easy_name] ) ):  return $easy_options[$easy_name]; else: return $easy_default; endif;
	}
	endif;