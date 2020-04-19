<?php

function searchlight_customize_register($wp_customize){
	
	//checkbox sanitization function
    function searchlight_sanitize_checkbox( $input ){              
    	//returns true if checkbox is checked
      	return ( ( isset( $input ) && true == $input ) ? true : false );
    }
	
	//file input sanitization function
    function searchlight_sanitize_image( $file, $setting ) {
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


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
    $wp_customize->add_section('searchlight_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('SEARCHLIGHT OPTIONS', 'searchlight'),
		'description'   => ' <div class="infohead">' . esc_html__('We appreciate an','searchlight') . ' <a href="https://wordpress.org/support/theme/searchlight/reviews" target="_blank">' . esc_html__('Honest Review','searchlight') . '</a> ' . esc_html__('of this Theme if you Love our Work','searchlight') . '<br /> <br />

' . esc_html__('Need More Features and Options including Exciting Unlimited Slide, E-Commerce, Drag and Drop Page Building, Useful ShortCodes, Unlimited Colors, Portfolio/Gallery, Featured Boxes, Clients List, Testimonial, Layout Options and 100+ Advanced Features? Try ','searchlight') . '<a href="' . esc_url('https://d5creation.com/theme/searchlight/') .'
" target="_blank"><strong>' . esc_html__('Searchlight Extend','searchlight') . '</strong></a><br /> <br /> 
        
        
' . esc_html__('You can Visit the Searchlight Extend ','searchlight') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=Searchlight') .'" target="_blank"><strong>' . esc_html__('Demo Here','searchlight') . '</strong></a> 
        </div>		
		'
    ));
	
//  Contact Number
    $wp_customize->add_setting('searchlight[contactnumber]', array(
        'default'        	=> esc_html__('(000) 111-222',  'searchlight'),
    	'sanitize_callback' => 'wp_kses_post',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_contactnumber', array(
        'label'      => esc_html__('Contact Number', 'searchlight'),
        'section'    => 'searchlight_options',
        'settings'   => 'searchlight[contactnumber]',
		'description' => esc_html__('Input your Contact Number','searchlight')
    ));
	
//  Fixed Header		
	$wp_customize->add_setting('searchlight[header-fixed]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'searchlight_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_header-fixed', array(
        'label'      => esc_html__('Fixed Header?', 'searchlight'),
        'section'    => 'searchlight_options',
        'settings'   => 'searchlight[header-fixed]',
		'description' => esc_html__('Check the Box if you want the Header Fixed during Scrolling','searchlight'),
		'type' 		 => 'checkbox'
    ));
	


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('searchlight_slide', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Slide', 'searchlight'),
        'description'   => ''
    ));
	

//  Show the Slider		
	$wp_customize->add_setting('searchlight[sliderbox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'searchlight_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_sliderbox', array(
        'label'      => esc_html__('Show The Slider Box in Front Page', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[sliderbox]',
		'description' => esc_html__('Check this if you want to show the Slider Box in Front Page','searchlight'),
		'type' 		 => 'checkbox'
    ));
  

foreach (range(1, 3) as $searchlight_opsinumber) {  

//  Banner Image/ Slide Image
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber.']', array(
        'default'           => get_template_directory_uri() . '/images/slide/' . $searchlight_opsinumber . '.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'searchlight_sanitize_image',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image' . $searchlight_opsinumber, array(
        'label'    			=> esc_html__('Slide Image ', 'searchlight') . $searchlight_opsinumber ,
        'section'  			=> 'searchlight_slide',
        'settings' 			=> 'searchlight[slide-image' . $searchlight_opsinumber.']',
		'description'   	=> esc_html__('Upload an image for the Front Page Banner. 1400px X 530px image is recommended','searchlight')
    )));
	
// Slide Title
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-title]', array(
        'default'        	=> esc_html__('Searchlight Theme','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-title' , array(
        'label'      => esc_html__('Slide Title', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-title]'
    ));
	
// Slide Sub Title
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-sub-title]', array(
        'default'        	=> esc_html__('Innovative Professional and Responsive Theme','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-sub-title' , array(
        'label'      => esc_html__('Slide Sub Title', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-sub-title]'
    ));
	
// Slide Caption
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-caption]', array(
        'default'        	=> esc_html__('This is a Test Image Text for Searchlight Theme. You can change this text from Customizer','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-caption' , array(
        'label'      => esc_html__('Slide Caption', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-caption]'
    ));
	
// Slide Link
    $wp_customize->add_setting('searchlight[slide-image' . $searchlight_opsinumber . '-link]', array(
        'default'        	=> esc_html__('#','searchlight'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('searchlight_slide-image' . $searchlight_opsinumber . '-link' , array(
        'label'      => esc_html__('Slide Link', 'searchlight'),
        'section'    => 'searchlight_slide',
        'settings'   => 'searchlight[slide-image' . $searchlight_opsinumber . '-link]'
    ));
	
	
}


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('searchlight_sl', array(
        'priority' 		=> 12,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Social Links', 'searchlight'),
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
        'label'      => esc_html__('Social Link', 'searchlight'),
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