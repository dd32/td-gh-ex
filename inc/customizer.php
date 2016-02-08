<?php
/**
 * Akyra Theme Customizer
 *
 * @package Akyra
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 function akyra_textarea_register($wp_customize){
	class akyra_Customize_akyra_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        
      
        <h1><?php _e( 'Get Akyra PRO Theme!  Just $19', 'akyra' ); ?></h1>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Upgrade to Akyra PRO Theme', 'akyra' ); ?>" href="<?php echo esc_url( 'http://arinio.com/akyra-responsive-multipurpose-wordpress-theme/' ); ?>" target="_blank">
			<?php _e( 'Upgrade to Akyra PRO Theme', 'akyra' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'View More our themes', 'akyra' ); ?>" href="<?php echo esc_url( 'http://arinio.com/' ); ?>" target="_blank">
			<?php _e( 'View More our themes', 'akyra' ); ?>
			</a>
			 
			<a href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>" title="<?php esc_attr_e( 'Free Support', 'akyra' ); ?>" target="_blank">
			<?php _e( 'Free Support', 'akyra' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://arinio.com/akyra-responsive-multipurpose-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'View Demo', 'akyra' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'akyra' ); ?>
			</a>
           <a href="<?php echo esc_url( 'http://arinio.com/get-free-our-theme/' ); ?>" title="<?php esc_attr_e( 'Get Free Pro Version', 'akyra' ); ?>" target="_blank">
			<?php _e( 'Get Free Pro Version', 'akyra' ); ?>
			</a>
		</div>
		<?php
		}
	}
 
}



add_action('customize_register', 'akyra_textarea_register');
 
 
 
function akyra_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	 
	 
	 
	 
	 $wp_customize->add_section('akyra_upgrade', array(
		'title'					=> __('Akyra Support', 'akyra'),
		'description'			=> __('You are using the Akyra, Free Version of Akyra Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and Life time theme support and much more. ','akyra'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'akyra_theme_settings[akyra_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new akyra_Customize_akyra_upgrade(
		$wp_customize,
		'akyra_upgrade',
			array(
				'label'					=> __('Akyra Upgrade','akyra'),
				'section'				=> 'akyra_upgrade',
				'settings'				=> 'akyra_theme_settings[akyra_upgrade]',
			)
		)
	);
	
}
add_action( 'customize_register', 'akyra_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since akyra 1.0
 */
function akyra_customize_preview_js() {
	wp_enqueue_script( 'akyra_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), rand(),  true );
}
add_action( 'customize_preview_init', 'akyra_customize_preview_js' );
 
 
 
/**
 * Implement the Custom Logo feature
 */
function akyra_theme_customizer( $wp_customize ) {
   
   $wp_customize->add_section( 'akyra_logo_section' , array(
    'title'       => __( 'Basic Setting', 'akyra' ),
    'description' => __( 'This Is a Basic Setting Section For Frontpage', 'akyra' ),
) );
   $wp_customize->add_setting( 'akyra_logo', array(
        'sanitize_callback' => 'akyra_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'akyra_logo', array(
    'label'    => __( 'Site Logo', 'akyra' ),
    'section'  => 'akyra_logo_section',
    'settings' => 'akyra_logo',
	)));
	
	
	
 
	
	
	 
	$wp_customize->add_setting(
	    'akyra_copyright_text', array(
		    'default' => __( 'Copyright', 'akyra' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'akyra_sanitize_text',
	    )
	);
	
	$wp_customize->add_control(
		'akyra_copyright_text', array(
			'label'    => __( 'Copyright Text', 'akyra' ),
			'section' => 'akyra_logo_section',
			'type' => 'text',
		)
	);
	
	
	
		 
	
	
	
	
	 
	
	
	
	
	
	
	
	
	
	
		$wp_customize->add_setting(
	    'akyra_custom_css', array(
		    'default' => __( '', 'akyra' ),
			'capability' => 'edit_theme_options', 
		    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    )
	);
	
	$wp_customize->add_control(
		'akyra_custom_css', array(
			'label'    => __( 'Custom CSS', 'akyra' ),
			'section' => 'akyra_logo_section',
			'type' => 'textarea',
		)
	);
	
	
}
add_action('customize_register', 'akyra_theme_customizer');
 
 
 
/* 
 * USE TO divide a section in to smaller sections
 */
function akyra_add_customizer_custom_controls( $wp_customize ) {
	//  Add Custom Subtitle
	//  =============================================================================
	class akyra_sub_title extends WP_Customize_Control {
		public $type = 'sub-title';
		public function render_content() {
		?>
			<h2 class="akyra-custom-sub-title"><?php echo esc_html( $this->label ); ?></h2>
		<?php
		}
	}
	//  Add Custom Description
	//  =============================================================================
	class akyra_description extends WP_Customize_Control {
		public $type = 'description';
		public function render_content() {
		?>
			<p class="akyra-custom-description"><?php echo esc_html( $this->label ); ?></p>
		<?php
		}
	}
	
	class akyra_footer extends WP_Customize_Control {
		public $type = 'footer';
		public function render_content() {
		?>
			<hr />
		<?php
		}
	}
}
add_action( 'customize_register', 'akyra_add_customizer_custom_controls' );




 








function akyra_slider_text_boxes_options( $wp_customize ){
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Slider 1', 'akyra' ),
		'two'		=> __( 'Slider 2', 'akyra' ),
		 
	);
	$wp_customize->add_section( 'akyra_customizer_slider_text_boxes', array(
		'title'    => __( 'Slider Setting', 'akyra' ),
		'description'    => __( 'You can upload here images for slider', 'akyra' ),
		
	));
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'akyra_slider_' . $key . '_sub_title', array(
            'sanitize_callback' => 'akyra_sanitize_text',
        ));
		$wp_customize->add_control( 
			new akyra_sub_title( $wp_customize, 'akyra_slider_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'akyra_customizer_slider_text_boxes',
					'settings'  => 'akyra_slider_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
		/* File Upload */
		$wp_customize->add_setting( 'akyra_header_slider-'.$key.'-file-upload', array(
            'sanitize_callback' => 'akyra_sanitize_upload',
        ) );
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control($wp_customize, 'akyra_header_slider-'.$key.'-file-upload', array(
		            'label' => __( 'File Upload', 'akyra' ),
		            'section' => 'akyra_customizer_slider_text_boxes',
		            'settings' => 'akyra_header_slider-'.$key.'-file-upload',
		            'priority' => $i_priority++
		        )
		    )
		);
		
		/* URL */
		$wp_customize->add_setting( 'akyra_header_slider_'.$key.'_url', array(
		        'default' => __( 'Title', 'akyra' ),
				'sanitize_callback' => 'akyra_sanitize_text',
			) 
		);
		$wp_customize->add_control('akyra_header_slider_'.$key.'_url', array(
				'label'    => __( 'Slider Title', 'akyra' ),
				'section' => 'akyra_customizer_slider_text_boxes',
				'settings' => 'akyra_header_slider_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Featured Header Text */
		$wp_customize->add_setting('akyra_featured_textbox_header_slider_'.$key, array(
		        'default' => __( 'Description', 'akyra' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'akyra_sanitize_text',
		    )
		);
		$wp_customize->add_control('akyra_featured_textbox_header_slider_'.$key, array(
				'label' => __( 'Slider Description', 'akyra' ),
				'section' => 'akyra_customizer_slider_text_boxes',
				'settings' => 'akyra_featured_textbox_header_slider_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'akyra_slider_' . $key . '_footer', array(
            'sanitize_callback' => 'akyra_sanitize_text',
        ));
		$wp_customize->add_control( 
			new akyra_footer( $wp_customize, 'akyra_slider_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'akyra_customizer_slider_text_boxes',
			'settings'  => 'akyra_slider_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
}
add_action( 'customize_register', 'akyra_slider_text_boxes_options' );






function servicesText_customizer( $wp_customize ) {
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Icon 1', 'akyra' ),
		'two'		=> __( 'Icon 2', 'akyra' ),
		'three'		=> __( 'Icon 3', 'akyra' ),
		
	);
	
	
    $wp_customize->add_section( 'akyra_servicesText_section_contact', array(
	     'title'       => __( 'Services Setting', 'akyra' ),
	     'description' => __( 'This is a Services settings section to change the servise section Details.', 'akyra' ),
        )
    );
	
	
	
	
	
	
	
	
	
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'akyra_services_' . $key . '_sub_title', array(
            'sanitize_callback' => 'akyra_sanitize_text',
        ));
		$wp_customize->add_control( 
			new akyra_sub_title( $wp_customize, 'akyra_services_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'akyra_servicesText_section_contact',
					'settings'  => 'akyra_services_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
	 
		
		/* Class */
		$wp_customize->add_setting( 'akyra_header_servicesicon_'.$key.'_url', array(
		        'default' => __( 'Font class Name', 'akyra' ),
				'sanitize_callback' => 'akyra_sanitize_text',
			) 
		);
		$wp_customize->add_control('akyra_header_servicesicon_'.$key.'_url', array(
				'label'    => __( 'Class Name', 'akyra' ),
				'section' => 'akyra_servicesText_section_contact',
				'settings' => 'akyra_header_servicesicon_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Title */
		$wp_customize->add_setting( 'akyra_header_services_'.$key.'_url', array(
		        'default' => __( 'Title', 'akyra' ),
				'sanitize_callback' => 'akyra_sanitize_text',
			) 
		);
		$wp_customize->add_control('akyra_header_services_'.$key.'_url', array(
				'label'    => __( 'Title', 'akyra' ),
				'section' => 'akyra_servicesText_section_contact',
				'settings' => 'akyra_header_services_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
	
	
		/* Featured Header Text */
		$wp_customize->add_setting('akyra_featured_textbox_header_services_'.$key, array(
		        'default' => __( 'Description', 'akyra' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'akyra_sanitize_text',
		    )
		);
		$wp_customize->add_control('akyra_featured_textbox_header_services_'.$key, array(
				'label' => __( 'Services Description', 'akyra' ),
				'section' => 'akyra_servicesText_section_contact',
				'settings' => 'akyra_featured_textbox_header_services_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'akyra_services_' . $key . '_footer', array(
            'sanitize_callback' => 'akyra_sanitize_text',
        ));
		$wp_customize->add_control( 
			new akyra_footer( $wp_customize, 'akyra_services_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'akyra_servicesText_section_contact',
			'settings'  => 'akyra_services_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
	
	
	
	
	
	
	
	
	
	
	
	$wp_customize->add_setting(
	    'akyra_maiN_heading', array(
		    'default' => __( 'Heading', 'akyra' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'akyra_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'akyra_maiN_heading', array(
			'label'    => __( 'Main Heading', 'akyra' ),
			'section' => 'akyra_servicesText_section_contact',
			'type' => 'text',
			'priority' => '20',
		)
	);
	
	
		$wp_customize->add_setting(
	    'akyra_maiN_description', array(
		    'default' => __( 'Description', 'akyra' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'akyra_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'akyra_maiN_description', array(
			'label'    => __( 'Main Description', 'akyra' ),
			'section' => 'akyra_servicesText_section_contact',
			'type' => 'textarea',
			'priority' => '21',
		)
	);
	 
	
	
	
	
	
	
	
	
	
}
add_action( 'customize_register', 'servicesText_customizer' );




 

















 






 
 
// SANITIZATION
// ==============================
// Sanitize Text
function akyra_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
// Sanitize Textarea
function akyra_sanitize_textarea($input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}
// Sanitize Checkbox
function akyra_sanitize_checkbox( $input ) {
	if( $input ):
		$output = '1';
	else:
		$output = false;
	endif;
	return $output;
}
// Sanitize Numbers
function akyra_sanitize_integer( $input ) {
	$value = (int) $input; // Force the value into integer type.
    return ( 0 < $input ) ? $input : null;
}
function akyra_sanitize_float( $input ) {
	return floatval( $input );
}
// Sanitize Uploads
function akyra_sanitize_upload($input){
	return esc_url_raw($input);	
}
// Sanitize Colors
function akyra_sanitize_hex($input){
	return maybe_hash_hex_color($input);
}



function customize_styles_akyra_upgrade( $input ) { ?>
	   <style type="text/css">
		#customize-theme-controls #accordion-section-akyra_upgrade .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-akyra_upgrade .accordion-section-title {
			background-color: rgba(113, 176, 47, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-akyra_upgrade .accordion-section-title:hover {
			background-color: rgba(113, 176, 47, 1);
		}
		#customize-theme-controls #accordion-section-akyra_upgrade .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-akyra_upgrade .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		h1 {
		line-height: 25px;
		}
	</style>
<?php }
 
add_action( 'customize_controls_print_styles', 'customize_styles_akyra_upgrade');
 







/* Wait until all sections are created then re-order them */
function akyra_reorder_sections_theme_customizer($wp_customize){
	
	$wp_customize->get_section('title_tagline')->priority = 2;
 
	 
	$wp_customize->get_section('header_image')->priority = 6;
	$wp_customize->get_section('colors')->priority = 7;
	 
	
	$wp_customize->get_section('static_front_page')->priority = 11;
	$wp_customize->get_section('akyra_customizer_slider_text_boxes')->priority = 14;
	$wp_customize->get_section('akyra_logo_section')->priority = 15;
$wp_customize->get_section('akyra_servicesText_section_contact')->priority = 16;
 
}
add_action('customize_register', 'akyra_reorder_sections_theme_customizer');















