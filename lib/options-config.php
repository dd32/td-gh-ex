<?php $options = array(
		'capability' => 10,
		'type' => 'theme_mod',
		'panels' => apply_filters( 'mynah_customizer_options', array(
        'mynah' => array(
 	    'priority'   => 9,
		'title'=> __('Theme Options', 'backyard'),
		'description'=> __('Backyard Theme Options', 'backyard'),
		'sections' => array(
 		'general' => array(
		'title' => __('General', 'backyard'),
		'description' => __('Page Settings', 'backyard'),
		'fields' => array(
                 'enable_breadcrumb' => array(
			'type' => 'checkbox',
			'label' => __('Enable Breadcrumb', 'backyard'),
			'default' => 0,
			'sanitize_callback' => 'yds_boolean',),
 		 'show_top_bar' => array(
			'type' => 'checkbox',
			'label' => __('Show Top Bar', 'backyard'),
			'default' => 1,
			'sanitize_callback' => 'yds_boolean',),
                     'show_search' => array(
			'type' => 'checkbox',
			'label' => __('Show Search', 'backyard'),
			'default' => 1,
			'sanitize_callback' => 'yds_boolean',),
                 ),),
 		'header' => array(
		'title' => __('Header', 'backyard'),
		'fields' => array(
		'logo' => array(
			  'type' => 'image',
			  'label' => __('Upload Logo', 'backyard'),
			  'sanitize_callback' => 'esc_url_raw',
		  ),
		
		  ),
 		),
  	   'footer' => array(
		'title' => __('Footer', 'backyard'),
		'fields' => array(
		    'footer_widgets' => array(
			'type' => 'checkbox',
			'label' => __('Footer Widget Area', 'backyard'),
			'default' => 1,
			'sanitize_callback' => 'yds_boolean',
						),
						'footer_widgets_layout' => array(
						 'type' => 'radio',
						 'label' => __('Footer Widget Layout Options', 'backyard'),
						 'description' => esc_html__('Select main content and sidebar alignment.', 'backyard'),
						 'choices' => array(
							 'fourc' => __('Four Column', 'backyard'),
							 'threec' => __('Three Column', 'backyard'),
							 'twoc' => __('Two Column', 'backyard'),
						 ),
						'default' => 'right'),
                    
                                          'footer_logo_upload_chk' => array(
			                  'type' => 'checkbox',
			                  'label' => __('Footer Logo Option', 'backyard'),
			                  'default' => 1,
			                  'sanitize_callback' => 'yds_boolean',
						),
                                                 
                                                 'footer_logo_upload' => array(
			                            'type' => 'image',
			                            'label' => __('Footer Logo Upload', 'backyard'),
			                            'sanitize_callback' => 'esc_url_raw',
						), 
                    
                                                 'footer_copyright_bar' => array(
			                            'type' => 'checkbox',
			                            'label' => __('Footer Copyright Bar', 'backyard'),
			                            'default' => 1,
			                            'sanitize_callback' => 'yds_boolean',
						),                             
                    
						'copyright' => array(
						 'type' => 'textarea',
						 'label' =>__('Footer Copyright Text (Validated for HTML)', 'backyard'),
						 'description' => esc_html__('Validated for HTML', 'backyard'),
						 'sanitize_callback' => 'yds_allowhtml_string',
													),
						  ),
 		         ),
 		'home' => array(
				  'title' => __('Home', 'backyard'),
				  'description' => __('Home Page options', 'backyard'),
				  'fields' => array(
					
                                        'choose_slider' => array(
			                'type' => 'checkbox',
			                'label' => __('Home Page Slider', 'backyard'),
			                'default' => 1,
			                'sanitize_callback' => 'yds_boolean',),
                                      
					'slider_cat' => array(
							'type' => 'category',
							'label' => __('Slider Posts Category', 'backyard'),
							'sanitize_callback' => 'absint',
							),
                              	
				  ),
 		),
			
                  
                    
                    'social_media' => array(
                    'title' => __('Social Media', 'backyard'),
                    'description' => esc_html__('Enter your social media links here (with http://) and then activate which ones you would like to display in your footer options', 'backyard'),
                    'fields' => array(
                    'facebook_url' => array(
		    'type' => 'text',
		    'label' => __('Facebook URL', 'backyard'),
		    'sanitize_callback' => 'esc_url_raw',),
                    'twitter_url' => array(
		    'type' => 'text',
		    'label' => __('Twitter URL', 'backyard'),
		    'sanitize_callback' => 'esc_url_raw',),
                    'google_url' => array(
		    'type' => 'text',
		    'label' => __('Google+ URL', 'backyard'),
		    'sanitize_callback' => 'esc_url_raw',),
                    'instagram_url' => array(
		    'type' => 'text',
		    'label' => __('Instagram URL', 'backyard'),
		    'sanitize_callback' => 'esc_url_raw',),
                    'youtube_channel_link' => array(
		    'type' => 'text',
		    'label' => __('Youtube Channel Link', 'backyard'),
		    'sanitize_callback' => 'esc_url_raw',),
                    'linkedin_link' => array(
		    'type' => 'text',
		    'label' => __('Linkedin Link', 'backyard'),
		    'sanitize_callback' => 'esc_url_raw',),
                    'pinterest_link' => array(
		    'type' => 'text',
		    'label' => __('Pinterest Link', 'backyard'),
		    'sanitize_callback' => 'esc_url_raw',),
                        )),
        
 	)
 ),
		) 
	)
	);

function yds_boolean($value){
	if(is_bool($value)) {
		return $value;
	} else {
		return false;
	}
}

function yds_breadcrumb_char_choices($value='') {
	$choices = array('1','2','3');

	if( in_array($value, $choices)) {
		return $value;
	} else {
		return '1';
	}
}

if ( ! function_exists('yds_allowhtml_string')) {

    function yds_allowhtml_string($string) {
        $allowed_tags = array(    
        'a' => array(
        'href' => array(),
        'title' => array()),
        'img' => array(
        'src' => array(),  
        'alt' => array(),),
        'iframe' => array(
        'src' => array(),  
        'frameborder' => array(),
        'allowfullscreen' => array(),
         ),
        'p' => array(),
        'br' => array(),
        'em' => array(),
        'strong' => array(),);
        return wp_kses($string,$allowed_tags);

    }
}

