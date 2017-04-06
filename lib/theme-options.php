<?php $options = array(
		'capability' => 10,
		'type' => 'theme_mod',
		'panels' => apply_filters( 'backyard_customizer_options', array(
        'mynah' => array(
 	    'priority'   => 9,
		'title'=> __('Theme Options', 'backyard'),
		'description'=> __('Backyard Theme Options', 'backyard'),
		'sections' => array(
 		'general' => array(
		'title' => __('General', 'backyard'),
		'description' => __('Page Settings', 'backyard'),
		'fields' => array(
 		 'show_top_bar' => array(
			'type' => 'checkbox',
			'label' => __('Show Top Bar', 'backyard'),
			'default' => 1,
			'sanitize_callback' => 'backyard_boolean',),
                     'show_search' => array(
			'type' => 'checkbox',
			'label' => __('Show Search', 'backyard'),
			'default' => 1,
			'sanitize_callback' => 'backyard_boolean',),
                 ),),
 		
  	   'footer' => array(
		'title' => __('Footer', 'backyard'),
		'fields' => array(
		    'footer_widgets' => array(
			'type' => 'checkbox',
			'label' => __('Footer Widget Area', 'backyard'),
			'default' => 1,
			'sanitize_callback' => 'backyard_boolean',
						),
						'footer_copyright_bar' => array(
			                            'type' => 'checkbox',
			                            'label' => __('Footer Copyright Bar', 'backyard'),
			                            'default' => 1,
			                            'sanitize_callback' => 'backyard_boolean',
						),                             
                    
						'copyright' => array(
						 'type' => 'textarea',
						 'label' =>__('Footer Copyright Text (Validated for HTML)', 'backyard'),
						 'description' =>__('Validated for HTML', 'backyard'),
						 'sanitize_callback' => 'backyard_allowhtml_string',
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
			                'default' => 0,
			                'sanitize_callback' => 'backyard_boolean',),
                                      
					'slider_cat' => array(
							'type' => 'category',
							'label' => __('Slider Posts Category', 'backyard'),
							'sanitize_callback' => 'absint',
							),
                              	
				  ),
 		),
			
                  
                    
                    'social_media' => array(
                    'title' => __('Social Media', 'backyard'),
                    'description' =>__('Enter your social media links here (with http://) and then activate which ones you would like to display in your footer options', 'backyard'),
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

function backyard_boolean($value){
	if(is_bool($value)) {
		return $value;
	} else {
		return false;
	}
}

function backyard_breadcrumb_char_choices($value='') {
	$choices = array('1','2','3');

	if( in_array($value, $choices)) {
		return $value;
	} else {
		return '1';
	}
}

if (!function_exists('backyard_allowhtml_string')) {

    function backyard_allowhtml_string($string) {
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

if(!class_exists('Backyard_Customizer_API_Wrapper')) {
			get_template_part('lib/admin/backyard-customizer-api-wrapper');
	}
Backyard_Customizer_API_Wrapper::getInstance($options);
?>