<?php $options = array(
		'capability' => 10,
		'type' => 'theme_mod',
		'panels' => apply_filters( 'ridolfi_customizer_options', array(
        'abaya' => array(
 	    'priority'   => 9,
		'title'=> __('Ridolfi Theme Options', 'abaya'),
		'description'=> __('Ridolfi Theme Options', 'abaya'),
		'sections' => array(
 		'general' => array(
		'title' => __('General', 'abaya'),
		'description' => __('Page Settings', 'abaya'),
		'fields' => array(
 		 'sidebar_position' => array(
		 'type' => 'radio',
		 'label' => __('Product Page Layout Options', 'abaya'),
		 'description' => __('Select main content and sidebar alignment.', 'abaya'),
		 'choices' => array(
			 'left' => __('Sidebar Left', 'abaya'),
			 'right' => __('Sidebar Right', 'abaya'),
			
		 ),
		 'default' => 'right',),),),
 		'header' => array(
		'title' => __('Header', 'abaya'),
		'fields' => array(
		'logo' => array(
			  'type' => 'image',
			  'label' => __('Upload Logo', 'abaya'),
			  'sanitize_callback' => 'esc_url_raw',
		  ),
		
                 'header_text' => array(
		 'type' => 'text',
		 'label' => __('Text in header', 'abaya'),
		 'default' => '',
		 'sanitize_callback' => 'yds_allowhtml_string',
									),
									'header_menu_show' => array(
		 'type' => 'checkbox',
		 'label' => __('Show header menu', 'abaya'),
		 'default' => 1,
		 'sanitize_callback' => 'ridolfi_boolean',
									),
		  ),
 		),
  	   'footer' => array(
		'title' => __('Footer', 'abaya'),
		'fields' => array(
						'copyright' => array(
						 'type' => 'textarea',
						 'label' =>__('Footer Copyright Text (Validated for HTML)', 'abaya'),
						 'description' => esc_html__('Validated for HTML', 'abaya'),
						 'sanitize_callback' => 'yds_allowhtml_string',
													),
						  ),
 		         ),
 		'homes' => array(
				  'title' => __('Slider', 'abaya'),
				  'description' => __('Slider Page options', 'abaya'),
				  'fields' => array(
                                 'service_cat_slider' => array(
								'type' => 'woo_category',
								'label' => __('Services Posts Category', 'abaya'),
								'sanitize_callback' => 'theme_get_categories_sanitize',
							),
					
				  ),
				  
 		),
		
                    
                    
        'contact_info' => array(      
         'title' => __('Contact Information', 'abaya'),
         'description' => esc_html__('Contact Information', 'abaya'),
         'fields' => array(
         'google_map_address' => array(
		 'type' => 'textarea',
		 'label' => __('Google Map Iframe Code', 'abaya'),
		 'sanitize_callback' => 'yds_allowhtml_string'),
          'mail_to' => array(
			    'type' => 'text',
		            'label' => __('Email Id', 'abaya'),   
			    'description'=> esc_html__('Email that you will enter will be displayed in contact template as well as contact form will be sent to the same email ID.', 'abaya'),
		            'sanitize_callback' => 'sanitize_text_field'),
                     
                        ),
                    ),
 	)
 ),
		) 
	)
	);

function ridolfi_boolean($value) {
	if(is_bool($value)) {
		return $value;
	} else {
		return false;
	}
}

function ridolfi_breadcrumb_char_choices($value='') {
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

