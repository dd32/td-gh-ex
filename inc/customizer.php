<?php
/**
 * Aripop Theme Customizer
 *
 * @package Aripop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 function aripop_textarea_register($wp_customize){
	class aripop_Customize_aripop_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        
      
        <h1><?php _e( 'Get Aripop PRO Theme!  Just $19', 'aripop' ); ?></h1>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Upgrade to Aripop PRO Theme', 'aripop' ); ?>" href="<?php echo esc_url( 'http://arinio.com/aripop-responsive-multipurpose-wordpress-theme/' ); ?>" target="_blank">
			<?php _e( 'Upgrade to Aripop PRO Theme', 'aripop' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'View More our themes', 'aripop' ); ?>" href="<?php echo esc_url( 'http://arinio.com/' ); ?>" target="_blank">
			<?php _e( 'View More our themes', 'aripop' ); ?>
			</a>
			 
			<a href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>" title="<?php esc_attr_e( 'Free Support', 'aripop' ); ?>" target="_blank">
			<?php _e( 'Free Support', 'aripop' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://arinio.com/aripop-responsive-multipurpose-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'View Demo', 'aripop' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'aripop' ); ?>
			</a>
           <a href="<?php echo esc_url( 'http://arinio.com/get-free-our-theme/' ); ?>" title="<?php esc_attr_e( 'Get Free Pro Version', 'aripop' ); ?>" target="_blank">
			<?php _e( 'Get Free Pro Version', 'aripop' ); ?>
			</a>
		</div>
		<?php
		}
	}
 
}



add_action('customize_register', 'aripop_textarea_register');
 
 
 
function aripop_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	 
	 
	 
	 
	 $wp_customize->add_section('aripop_upgrade', array(
		'title'					=> __('Aripop Support', 'aripop'),
		'description'			=> __('You are using the Aripop, Free Version of Aripop Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and Life time theme support and much more. ','aripop'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'aripop_theme_settings[aripop_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new aripop_Customize_aripop_upgrade(
		$wp_customize,
		'aripop_upgrade',
			array(
				'label'					=> __('Aripop Upgrade','aripop'),
				'section'				=> 'aripop_upgrade',
				'settings'				=> 'aripop_theme_settings[aripop_upgrade]',
			)
		)
	);
	
}
add_action( 'customize_register', 'aripop_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since aripop 1.0
 */
function aripop_customize_preview_js() {
	wp_enqueue_script( 'aripop_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), rand(),  true );
}
add_action( 'customize_preview_init', 'aripop_customize_preview_js' );
 
 
 
/**
 * Implement the Custom Logo feature
 */
function aripop_theme_customizer( $wp_customize ) {
   
   $wp_customize->add_section( 'aripop_logo_section' , array(
    'title'       => __( 'Basic Setting', 'aripop' ),
    'description' => __( 'This Is a Basic Setting Section For Frontpage', 'aripop' ),
) );
   $wp_customize->add_setting( 'aripop_logo', array(
        'sanitize_callback' => 'aripop_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aripop_logo', array(
    'label'    => __( 'Site Logo', 'aripop' ),
    'section'  => 'aripop_logo_section',
    'settings' => 'aripop_logo',
	)));
	
	
	
	 
	
	 
	$wp_customize->add_setting(
	    'aripop_copyright_text', array(
		    'default' => __( 'Copyright', 'aripop' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'aripop_sanitize_text',
	    )
	);
	
	$wp_customize->add_control(
		'aripop_copyright_text', array(
			'label'    => __( 'Copyright Text', 'aripop' ),
			'section' => 'aripop_logo_section',
			'type' => 'text',
		)
	);
	
	
	
		 
	
	 
	
	
	
	 
	
}
add_action('customize_register', 'aripop_theme_customizer');
 
 
 
/* 
 * USE TO divide a section in to smaller sections
 */
function aripop_add_customizer_custom_controls( $wp_customize ) {
	//  Add Custom Subtitle
	//  =============================================================================
	class aripop_sub_title extends WP_Customize_Control {
		public $type = 'sub-title';
		public function render_content() {
		?>
			<h2 class="aripop-custom-sub-title"><?php echo esc_html( $this->label ); ?></h2>
		<?php
		}
	}
	//  Add Custom Description
	//  =============================================================================
	class aripop_description extends WP_Customize_Control {
		public $type = 'description';
		public function render_content() {
		?>
			<p class="aripop-custom-description"><?php echo esc_html( $this->label ); ?></p>
		<?php
		}
	}
	
	class aripop_footer extends WP_Customize_Control {
		public $type = 'footer';
		public function render_content() {
		?>
			<hr />
		<?php
		}
	}
}
add_action( 'customize_register', 'aripop_add_customizer_custom_controls' );




 








function aripop_slider_text_boxes_options( $wp_customize ){
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Slider 1', 'aripop' ),
		'two'		=> __( 'Slider 2', 'aripop' ),
		 
	);
	$wp_customize->add_section( 'aripop_customizer_slider_text_boxes', array(
		'title'    => __( 'Slider Setting', 'aripop' ),
		'description'    => __( 'You can upload here images for slider', 'aripop' ),
		
	));
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'aripop_slider_' . $key . '_sub_title', array(
            'sanitize_callback' => 'aripop_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aripop_sub_title( $wp_customize, 'aripop_slider_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'aripop_customizer_slider_text_boxes',
					'settings'  => 'aripop_slider_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
		/* File Upload */
		$wp_customize->add_setting( 'aripop_header_slider-'.$key.'-file-upload', array(
            'sanitize_callback' => 'aripop_sanitize_upload',
        ) );
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control($wp_customize, 'aripop_header_slider-'.$key.'-file-upload', array(
		            'label' => __( 'File Upload', 'aripop' ),
		            'section' => 'aripop_customizer_slider_text_boxes',
		            'settings' => 'aripop_header_slider-'.$key.'-file-upload',
		            'priority' => $i_priority++
		        )
		    )
		);
		
		/* URL */
		$wp_customize->add_setting( 'aripop_header_slider_'.$key.'_url', array(
		        'default' => __( 'Title', 'aripop' ),
				'sanitize_callback' => 'aripop_sanitize_text',
			) 
		);
		$wp_customize->add_control('aripop_header_slider_'.$key.'_url', array(
				'label'    => __( 'Slider Title', 'aripop' ),
				'section' => 'aripop_customizer_slider_text_boxes',
				'settings' => 'aripop_header_slider_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Featured Header Text */
		$wp_customize->add_setting('aripop_featured_textbox_header_slider_'.$key, array(
		        'default' => __( 'Description', 'aripop' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'aripop_sanitize_text',
		    )
		);
		$wp_customize->add_control('aripop_featured_textbox_header_slider_'.$key, array(
				'label' => __( 'Slider Description', 'aripop' ),
				'section' => 'aripop_customizer_slider_text_boxes',
				'settings' => 'aripop_featured_textbox_header_slider_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'aripop_slider_' . $key . '_footer', array(
            'sanitize_callback' => 'aripop_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aripop_footer( $wp_customize, 'aripop_slider_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'aripop_customizer_slider_text_boxes',
			'settings'  => 'aripop_slider_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
}
add_action( 'customize_register', 'aripop_slider_text_boxes_options' );






function servicesText_customizer( $wp_customize ) {
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Icon 1', 'aripop' ),
		'two'		=> __( 'Icon 2', 'aripop' ),
		'three'		=> __( 'Icon 3', 'aripop' ),
		 
	);
	
	
    $wp_customize->add_section( 'aripop_servicesText_section_contact', array(
	     'title'       => __( 'Services Setting', 'aripop' ),
	     'description' => __( 'This is a Services settings section to change the servise section Details.', 'aripop' ),
        )
    );
	
	
	
	
	
	
	
	
	
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'aripop_services_' . $key . '_sub_title', array(
            'sanitize_callback' => 'aripop_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aripop_sub_title( $wp_customize, 'aripop_services_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'aripop_servicesText_section_contact',
					'settings'  => 'aripop_services_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
	 
		
		/* Class */
		$wp_customize->add_setting( 'aripop_header_servicesicon_'.$key.'_url', array(
		        'default' => __( 'Font class Name', 'aripop' ),
				'sanitize_callback' => 'aripop_sanitize_text',
			) 
		);
		$wp_customize->add_control('aripop_header_servicesicon_'.$key.'_url', array(
				'label'    => __( 'Class Name', 'aripop' ),
				'section' => 'aripop_servicesText_section_contact',
				'settings' => 'aripop_header_servicesicon_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Title */
		$wp_customize->add_setting( 'aripop_header_services_'.$key.'_url', array(
		        'default' => __( 'Title', 'aripop' ),
				'sanitize_callback' => 'aripop_sanitize_text',
			) 
		);
		$wp_customize->add_control('aripop_header_services_'.$key.'_url', array(
				'label'    => __( 'Title', 'aripop' ),
				'section' => 'aripop_servicesText_section_contact',
				'settings' => 'aripop_header_services_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
	
	
		/* Featured Header Text */
		$wp_customize->add_setting('aripop_featured_textbox_header_services_'.$key, array(
		        'default' => __( 'Description', 'aripop' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'aripop_sanitize_text',
		    )
		);
		$wp_customize->add_control('aripop_featured_textbox_header_services_'.$key, array(
				'label' => __( 'Services Description', 'aripop' ),
				'section' => 'aripop_servicesText_section_contact',
				'settings' => 'aripop_featured_textbox_header_services_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'aripop_services_' . $key . '_footer', array(
            'sanitize_callback' => 'aripop_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aripop_footer( $wp_customize, 'aripop_services_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'aripop_servicesText_section_contact',
			'settings'  => 'aripop_services_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
	
	
	
	
	
	
	
	
	
	
	
	$wp_customize->add_setting(
	    'aripop_maiN_heading', array(
		    'default' => __( 'Heading', 'aripop' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'aripop_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'aripop_maiN_heading', array(
			'label'    => __( 'Main Heading', 'aripop' ),
			'section' => 'aripop_servicesText_section_contact',
			'type' => 'text',
			'priority' => '20',
		)
	);
	
	
	 
	 
 
	
	
}
add_action( 'customize_register', 'servicesText_customizer' );




 

















 






 
 
// SANITIZATION
// ==============================
// Sanitize Text
function aripop_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
// Sanitize Textarea
function aripop_sanitize_text_field($input) {
	global $allowedposttags;
	$output = sanitize_text_field ( $input );
	return $output;
}

 // Sanitize Checkbox
function aripop_sanitize_checkbox( $input ) {
	if( $input ):
		$output = '1';
	else:
		$output = false;
	endif;
	return $output;
}
// Sanitize Numbers
function aripop_absint( $input ) {
	$value = absint( $input ); // Force the value into integer type.
    return ( 0 < $input ) ? $input : null;
}

  
function aripop_sanitize_float( $input ) {
	return floatval( $input );
}
// Sanitize Uploads
function aripop_sanitize_upload($input){
	return esc_url_raw($input);	
}
// Sanitize Colors
function aripop_sanitize_hex($input){
	return maybe_hash_hex_color($input);
}



function customize_styles_aripop_upgrade( $input ) { ?>
	   <style type="text/css">
		#customize-theme-controls #accordion-section-aripop_upgrade .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-aripop_upgrade .accordion-section-title {
			background-color: rgba(113, 176, 47, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-aripop_upgrade .accordion-section-title:hover {
			background-color: rgba(113, 176, 47, 1);
		}
		#customize-theme-controls #accordion-section-aripop_upgrade .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-aripop_upgrade .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		h1 {
		line-height: 25px;
		}
	</style>
<?php }
 
add_action( 'customize_controls_print_styles', 'customize_styles_aripop_upgrade');
 







/* Wait until all sections are created then re-order them */
function aripop_reorder_sections_theme_customizer($wp_customize){
	
	$wp_customize->get_section('title_tagline')->priority = 2;
	$wp_customize->get_section('aripop_logo_section')->priority = 3;
 
	$wp_customize->get_section('header_image')->priority = 6;
	$wp_customize->get_section('colors')->priority = 7;
	 
	
	$wp_customize->get_section('static_front_page')->priority = 11;
	$wp_customize->get_section('aripop_customizer_slider_text_boxes')->priority = 14;
	$wp_customize->get_section('aripop_logo_section')->priority = 15;
$wp_customize->get_section('aripop_servicesText_section_contact')->priority = 16;
 
}
add_action('customize_register', 'aripop_reorder_sections_theme_customizer');















