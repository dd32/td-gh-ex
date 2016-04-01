<?php
/**
 * attirant Theme Customizer.
 *
 * @package attirant
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function attirant_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize-> add_section(
    'attirant_social',
    array(
    	'title'			=> __('Social Settings','attirant'),
    	'description'	=> __('Manage the Social Icon Setings of your site.','attirant'),
    	'priority'		=> 3,
    	)
    );
    
    $wp_customize-> add_setting(
    'social',
    array(
    	'default'			=> false,
    	'sanitize_callback'	=> 'attirant_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'social',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Social Icons','attirant'),
    	'section'	=> 'attirant_social',
    	'priority'	=> 1,
    	)
    );

    $wp_customize-> add_setting(
    'facebook',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'facebook',
    array(
    	'label'		=> __('Facebook URL','attirant'),
    	'section'	=> 'attirant_social',
    	'type'		=> 'text',
        'priority'   => 3
    	)
    );
    
    $wp_customize-> add_setting(
    'twitter',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'twitter',
    array(
    	'label'		=> __('Twitter URL','attirant'),
    	'section'	=> 'attirant_social',
    	'type'		=> 'text',
        'priority'   => 4
    	)
    );
    
    $wp_customize-> add_setting(
    'google-plus',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'google-plus',
    array(
    	'label'		=> __('Google Plus URL','attirant'),
    	'section'	=> 'attirant_social',
    	'type'		=> 'text',
        'priority'   => 5
    	)
    );
    
    $wp_customize-> add_setting(
    'instagram',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'instagram',
    array(
    	'label'		=> __('Instagram URL','attirant'),
    	'section'	=> 'attirant_social',
    	'type'		=> 'text',
        'priority'   => 6
    	)
    );
    
    $wp_customize-> add_setting(
    'pinterest-p',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'pinterest-p',
    array(
    	'label'		=> __('Pinterest URL','attirant'),
    	'section'	=> 'attirant_social',
    	'type'		=> 'text',
        'priority'   => 7
    	)
    );
    
    $wp_customize-> add_setting(
    'youtube',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'youtube',
    array(
    	'label'		=> __('Youtube URL','attirant'),
    	'section'	=> 'attirant_social',
    	'type'		=> 'text',
        'priority'   => 8
    	)
    ); 
    
    $wp_customize-> add_setting(
    'envelope-o',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'envelope-o',
    array(
    	'label'		=> __('E-Mail','attirant'),
    	'section'	=> 'attirant_social',
    	'type'		=> 'e-mail',
        'priority'   => 8
    	)
    );    
	
/*---- Showcase Area Settings ----*/

	$wp_customize->add_panel(
    'attirant-showcase', 
    	array(
		    'priority'       => 12,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => __('Showcase Settings', 'attirant'),
		)
	);
    
    $wp_customize->add_section(
	    'attirant-showcase-1',
	    array(
		    'title'		=> __('Featured Item 1','attirant'),
		    'priority'	=> 1,
		    'panel'		=> 'attirant-showcase',
	    )
    );
    
    $wp_customize->add_setting( 
    'attirant-s-img-1', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'attirant-s-img-1',
	        array(
	            'label' => __('Image Upload','attirant'),
	            'section' => 'attirant-showcase-1',
	            'settings' => 'attirant-s-img-1',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'attirant-s-title-1', array(
			'sanitize_callback'	=> 'attirant_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-s-title-1', array(
		'label'		=> __('Description','attirant'),
		'section'	=> 'attirant-showcase-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'attirant-s-url-1', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-s-url-1', array(
		'label'		=> __('URL','attirant'),
		'section'	=> 'attirant-showcase-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize->add_section(
	    'attirant-showcase-2',
	    array(
		    'title'		=> __('Featured Item 2','attirant'),
		    'priority'	=> 2,
		    'panel'		=> 'attirant-showcase',
	    )
    );
    
    $wp_customize->add_setting( 
    'attirant-s-img-2', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'attirant-s-img-2',
	        array(
	            'label' => __('Image Upload','attirant'),
	            'section' => 'attirant-showcase-2',
	            'settings' => 'attirant-s-img-2',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'attirant-s-title-2', array(
			'sanitize_callback'	=> 'attirant_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-s-title-2', array(
		'label'		=> __('Description','attirant'),
		'section'	=> 'attirant-showcase-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'attirant-s-url-2', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-s-url-2', array(
		'label'		=> __('URL','attirant'),
		'section'	=> 'attirant-showcase-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize->add_section(
	    'attirant-showcase-3',
	    array(
		    'title'		=> __('Featured Item 3','attirant'),
		    'priority'	=> 2,
		    'panel'		=> 'attirant-showcase',
	    )
    );
    
    $wp_customize->add_setting( 
    'attirant-s-img-3', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'attirant-s-img-3',
	        array(
	            'label' => __('Image Upload','attirant'),
	            'section' => 'attirant-showcase-3',
	            'settings' => 'attirant-s-img-3',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'attirant-s-title-3', array(
			'sanitize_callback'	=> 'attirant_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-s-title-3', array(
		'label'		=> __('Description','attirant'),
		'section'	=> 'attirant-showcase-3',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'attirant-s-url-3', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-s-url-3', array(
		'label'		=> __('URL','attirant'),
		'section'	=> 'attirant-showcase-3',
		'type'		=> 'text',
		)
	);
	
/*---- Slider Settings ----*/
	
	 $wp_customize-> add_panel(
    'attirant-slider', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Slider', 'attirant'),
    'description'    => '',
    ));
    
    $wp_customize-> add_section(
    'attirant-slides',
    array(
    	'title'			=> __('Enable Slider','attirant'),
    	'priority'		=> 3,
    	'panel'			=> 'attirant-slider',
    	)
    );
    
    $wp_customize->add_setting(
	    'attirant-slider-front',
	    array(
	        'default' => true,
	        'sanitize_callback'	=> 'attirant_sanitize_checkbox',
	    )
	);
 
	$wp_customize->add_control(
	    'attirant-slider-front',
	    array(
	        'type' => 'checkbox',
	        'label' => __('Enable Slider on the Home Page','attirant'),
	        'section' => 'attirant-slides',
	    )	    
	);
	
	$wp_customize->add_setting(
	    'attirant-slider-post',
	    array(
	        'default' => false,
	        'sanitize_callback'	=> 'attirant_sanitize_checkbox',
	    )
	);
 
	$wp_customize->add_control(
	    'attirant-slider-post',
	    array(
	        'type' => 'checkbox',
	        'label' => __('Enable Slider on the Posts','attirant'),
	        'section' => 'attirant-slides',
	    )	    
	);
	
	$wp_customize->add_setting(
	    'attirant-slider-page',
	    array(
	        'default' => false,
	        'sanitize_callback'	=> 'attirant_sanitize_checkbox',
	    )
	);
 
	$wp_customize->add_control(
	    'attirant-slider-page',
	    array(
	        'type' => 'checkbox',
	        'label' => __('Enable Slider on the Pages','attirant'),
	        'section' => 'attirant-slides',
	    )	    
	);
	
	$wp_customize-> add_section(
    'attirant-slider-settings', array(
    	'title'		=> __('Slider Settings', 'attirant'),
    	'panel'		=> 'attirant-slider',
    	)
    );
    
    $wp_customize->add_setting(
    	'slider-mode',
    	array(
    		'default'	=> 'horizontal',
    		'sanitize_callback'	=> 'attirant_sanitize_select',
    	)
    );
    
    $wp_customize->add_control(
    	'slider-mode',
    	array(
    		'type'		=> 'select',
    		'priority'	=> 1,
    		'label'	=> __('Select the transition you want for the slider','attirant'),
    		'section'	=> 'attirant-slider-settings',
    		'choices'	=> array(
    							'fade'			=> 'Fade',
    							'horizontal'	=> 'Horizontal',	
    						)
    	)
    );
    
    $wp_customize->add_setting(
    	'attirant-slider-speed',
    	array(
    		'default'	=> 500,
    		'sanitize_callback'	=> 'absint'
    	)
    );
    
    $wp_customize->add_control(
    	'attirant-slider-speed',
    	array(
    		'type'			=> 'range',
    		'priority'		=> 2,
    		'section'		=> 'attirant-slider-settings',
    		'label'			=> __('Slider Speed','attirant'),
    		'description'	=> __('500-5000ms','attirant'),
    		'input_attrs'	=> array(
    			'min'	=> 500,
    			'max'	=> 5000,
    			'step'	=> 500,
    			'class'	=> 'test-class test',
    			'style'	=> '#abcdef'
    		)
    	)
    );
	    
    $wp_customize-> add_section(
    'attirant-slide-1', array(
    	'title'		=> __('Slide 1', 'attirant'),
    	'panel'		=> 'attirant-slider',
    	)
    );
    
    $wp_customize->add_setting( 
    'attirant-slide_1', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'attirant-slide_1',
	        array(
	            'label' => __('Slide Upload','attirant'),
	            'section' => 'attirant-slide-1',
	            'settings' => 'attirant-slide_1',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'attirant-desc-1', array(
			'sanitize_callback'	=> 'attirant_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-desc-1', array(
		'label'		=> __('Description','attirant'),
		'section'	=> 'attirant-slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'attirant-url-1', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-url-1', array(
		'label'		=> __('URL','attirant'),
		'section'	=> 'attirant-slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'attirant-slide-2', array(
    	'title'		=> __('Slide 2', 'attirant'),
    	'panel'		=> 'attirant-slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'attirant-slide_2', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'attirant-slide_2',
	        array(
	            'label' => __('Slide Upload','attirant'),
	            'section' => 'attirant-slide-2',
	            'settings' => 'attirant-slide_2',
	        )
	    )
	);
		
	$wp_customize-> add_setting( 
	'attirant-desc-2', array(
			'sanitize_callback'	=> 'attirant_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-desc-2', array(
		'label'		=> __('Description','attirant'),
		'section'	=> 'attirant-slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'attirant-url-2', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-url-2', array(
		'label'		=> __('URL','attirant'),
		'section'	=> 'attirant-slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'attirant-slide-3', array(
    	'title'		=> __('Slide 3', 'attirant'),
    	'panel'		=> 'attirant-slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'attirant-slide_3', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'attirant-slide_3',
	        array(
	            'label' => __('Slide Upload','attirant'),
	            'section' => 'attirant-slide-3',
	            'settings' => 'attirant-slide_3',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'attirant-desc-3', array(
			'sanitize_callback'	=> 'attirant_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-desc-3', array(
		'label'		=> __('Description','attirant'),
		'section'	=> 'attirant-slide-3',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'attirant-url-3', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'attirant-url-3', array(
		'label'		=> __('URL','attirant'),
		'section'	=> 'attirant-slide-3',
		'type'		=> 'text',
		)
	);
	
	function attirant_sanitize_checkbox( $i ) {
	    if ( $i == 1 ) {
	        return 1;
	    } 
	    else {
	        return '';
	    }
	 }
	 
	 function attirant_sanitize_select($a) {
		$valid = array(
            'fade'			=> 'Fade',
            'horizontal'	=> 'Horizontal',
             );
	        
	        if (array_key_exists($a, $valid)) {
		        return $a;
		        } 
		        else {
		        return '';
		    }
	 }
	 
	 function attirant_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
}
add_action( 'customize_register', 'attirant_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function attirant_customize_preview_js() {
	wp_enqueue_script( 'attirant_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'attirant_customize_preview_js' );
