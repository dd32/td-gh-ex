<?php

function searchlight_customize_register($wp_customize){

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //    
    $wp_customize->add_section('searchlight_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('SEARCHLIGHT OPTIONS', 'searchlight'),
		'description'   => ' <div class="infohead">' . __('We appreciate an','searchlight') . ' <a href="https://wordpress.org/support/theme/searchlight/reviews" target="_blank">' . __('Honest Review','searchlight') . '</a> ' . __('of this Theme if you Love our Work','searchlight') . '<br /> <br />

' . __('Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try ','searchlight') . '<a href="' . esc_url('http://d5creation.com/theme/searchlight/') .'
" target="_blank"><strong>' . __('Searchlight Extend','searchlight') . '</strong></a><br /> <br /> 
        
        
' . __('You can Visit the Searchlight Extend ','searchlight') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=Searchlight') .'" target="_blank"><strong>' . __('Demo Here','searchlight') . '</strong></a> 
        </div>		
		'
    ));
	
//  Contact Number
    $wp_customize->add_setting('searchlight[contactnumber]', array(
        'default'        	=> __('(000) 111-222',  'searchlight'),
    	'sanitize_callback' => 'esc_textarea',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_contactnumber', array(
        'label'      => __('Contact Number', 'searchlight'),
        'section'    => 'searchlight_options',
        'settings'   => 'searchlight[contactnumber]',
		'description' => __('Input your Contact Number','searchlight')
    ));
	


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('searchlight_slide', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Slide', 'searchlight'),
        'description'   => ''
    ));
  

foreach (range(1, 3) as $searchlight_opsinumber) {  

//  Banner Image/ Slide Image
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber.']', array(
        'default'           => get_template_directory_uri() . '/images/slide/' . $searchlight_opsinumber . '.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image' . $searchlight_opsinumber, array(
        'label'    			=> __('Slide Image ', 'searchlight') . $searchlight_opsinumber ,
        'section'  			=> 'searchlight_slide',
        'settings' 			=> 'searchlight[slide-image' . $searchlight_opsinumber.']',
		'description'   	=> __('Upload an image for the Front Page Banner. 1400px X 530px image is recommended','searchlight')
    )));
	
// Slide Title
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-title]', array(
        'default'        	=> __('Searchlight Theme','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-title' , array(
        'label'      => __('Slide Title', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-title]'
    ));
	
// Slide Sub Title
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-sub-title]', array(
        'default'        	=> __('Innovative Professional and Responsive Theme','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-sub-title' , array(
        'label'      => __('Slide Sub Title', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-sub-title]'
    ));
	
// Slide Caption
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-caption]', array(
        'default'        	=> __('This is a Test Image Text for Searchlight Theme. You can change this text from Customizer','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-caption' , array(
        'label'      => __('Slide Caption', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-caption]'
    ));
	
// Slide Link
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-link]', array(
        'default'        	=> __('#','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-link' , array(
        'label'      => __('Slide Link', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-link]'
    ));
	
	
}


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('searchlight_sl', array(
        'priority' 		=> 12,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Social Links', 'searchlight'),
        'description'   => ''
    ));

foreach (range(1, 5) as $searchlight_slk ) {  
	
//  Facebook Link
    $wp_customize->add_setting('searchlight[sl'.$searchlight_slk.']', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_sl'.$searchlight_slk.'', array(
        'label'      => __('Social Link', 'searchlight'),
        'section'    => 'searchlight_sl',
        'settings'   => 'searchlight[sl'.$searchlight_slk.']'
    ));
}
	
}


add_action('customize_register', 'searchlight_customize_register');


	if ( ! function_exists( 'searchlight_get_option' ) ) :
	function searchlight_get_option( $searchlight_name, $searchlight_default = false ) {
	$searchlight_config = get_option( 'searchlight' );

	if ( ! isset( $searchlight_config ) ) : return $searchlight_default; else: $searchlight_options = $searchlight_config; endif;
	if ( isset( $searchlight_options[$searchlight_name] ) ):  return $searchlight_options[$searchlight_name]; else: return $searchlight_default; endif;
	}
	endif;
	
	
	
