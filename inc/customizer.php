<?php
/**
 * Aribiz Theme Customizer
 *
 * @package Aribiz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 function aribiz_textarea_register($wp_customize){
	class aribiz_Customize_aribiz_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        
      
        <h1><?php _e( 'Get Aribiz PRO Theme!  Just $19', 'aribiz' ); ?></h1>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Upgrade to Aribiz PRO Theme', 'aribiz' ); ?>" href="<?php echo esc_url( 'http://arinio.com/aribiz-responsive-multipurpose-wordpress-theme/' ); ?>" target="_blank">
			<?php _e( 'Upgrade to Aribiz PRO Theme', 'aribiz' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'View More our themes', 'aribiz' ); ?>" href="<?php echo esc_url( 'http://arinio.com/' ); ?>" target="_blank">
			<?php _e( 'View More our themes', 'aribiz' ); ?>
			</a>
			 
			<a href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>" title="<?php esc_attr_e( 'Free Support', 'aribiz' ); ?>" target="_blank">
			<?php _e( 'Free Support', 'aribiz' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://arinio.com/aribiz-responsive-multipurpose-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'View Demo', 'aribiz' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'aribiz' ); ?>
			</a>
           <a href="<?php echo esc_url( 'http://arinio.com/get-free-our-theme/' ); ?>" title="<?php esc_attr_e( 'Get Free Pro Version', 'aribiz' ); ?>" target="_blank">
			<?php _e( 'Get Free Pro Version', 'aribiz' ); ?>
			</a>
		</div>
		<?php
		}
	}
 
}



add_action('customize_register', 'aribiz_textarea_register');
 
 
 
function aribiz_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	 
	 
	 
	 
	 $wp_customize->add_section('aribiz_upgrade', array(
		'title'					=> __('Aribiz Support', 'aribiz'),
		'description'			=> __('You are using the Aribiz, Free Version of Aribiz Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and Life time theme support and much more. ','aribiz'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'aribiz_theme_settings[aribiz_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new aribiz_Customize_aribiz_upgrade(
		$wp_customize,
		'aribiz_upgrade',
			array(
				'label'					=> __('Aribiz Upgrade','aribiz'),
				'section'				=> 'aribiz_upgrade',
				'settings'				=> 'aribiz_theme_settings[aribiz_upgrade]',
			)
		)
	);
	
}
add_action( 'customize_register', 'aribiz_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since aribiz 1.0
 */
function aribiz_customize_preview_js() {
	wp_enqueue_script( 'aribiz_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), rand(),  true );
}
add_action( 'customize_preview_init', 'aribiz_customize_preview_js' );
 
 
 
/**
 * Implement the Custom Logo feature
 */
function aribiz_theme_customizer( $wp_customize ) {
   
   $wp_customize->add_section( 'aribiz_logo_section' , array(
    'title'       => __( 'Basic Setting', 'aribiz' ),
    'description' => __( 'This Is a Basic Setting Section For Front page', 'aribiz' ),
) );
   $wp_customize->add_setting( 'aribiz_logo', array(
        'sanitize_callback' => 'aribiz_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aribiz_logo', array(
    'label'    => __( 'Site Logo', 'aribiz' ),
    'section'  => 'aribiz_logo_section',
    'settings' => 'aribiz_logo',
	)));
	
	
	
	 
	
	 
	$wp_customize->add_setting(
	    'aribiz_copyright_text', array(
		    'default' => __( 'Copyright', 'aribiz' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'aribiz_sanitize_text',
	    )
	);
	
	$wp_customize->add_control(
		'aribiz_copyright_text', array(
			'label'    => __( 'Copyright Text', 'aribiz' ),
			'section' => 'aribiz_logo_section',
			'type' => 'text',
		)
	);
	
	
	
		 
	
	 
	
	
	
	 
	
}
add_action('customize_register', 'aribiz_theme_customizer');
 
 
 
/* 
 * USE TO divide a section in to smaller sections
 */
function aribiz_add_customizer_custom_controls( $wp_customize ) {
	//  Add Custom Subtitle
	//  =============================================================================
	class aribiz_sub_title extends WP_Customize_Control {
		public $type = 'sub-title';
		public function render_content() {
		?>
			<h2 class="aribiz-custom-sub-title"><?php echo esc_html( $this->label ); ?></h2>
		<?php
		}
	}
	//  Add Custom Description
	//  =============================================================================
	class aribiz_description extends WP_Customize_Control {
		public $type = 'description';
		public function render_content() {
		?>
			<p class="aribiz-custom-description"><?php echo esc_html( $this->label ); ?></p>
		<?php
		}
	}
	
	class aribiz_footer extends WP_Customize_Control {
		public $type = 'footer';
		public function render_content() {
		?>
			<hr />
		<?php
		}
	}
}
add_action( 'customize_register', 'aribiz_add_customizer_custom_controls' );




 








function aribiz_slider_text_boxes_options( $wp_customize ){
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Slider 1', 'aribiz' ),
		'two'		=> __( 'Slider 2', 'aribiz' ),
		 
	);
	$wp_customize->add_section( 'aribiz_customizer_slider_section_boxes', array(
		'title'    => __( 'Slider Settings', 'aribiz' ),
		'description'    => __( 'Upload here images for slider', 'aribiz' ),
		
	));
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'aribiz_slider_' . $key . '_sub_title', array(
            'sanitize_callback' => 'aribiz_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aribiz_sub_title( $wp_customize, 'aribiz_slider_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'aribiz_customizer_slider_section_boxes',
					'settings'  => 'aribiz_slider_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
		/* File Upload */
		$wp_customize->add_setting( 'aribiz_header_slider-'.$key.'-file-upload', array(
            'sanitize_callback' => 'aribiz_sanitize_upload',
        ) );
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control($wp_customize, 'aribiz_header_slider-'.$key.'-file-upload', array(
		            'label' => __( 'File Upload', 'aribiz' ),
		            'section' => 'aribiz_customizer_slider_section_boxes',
		            'settings' => 'aribiz_header_slider-'.$key.'-file-upload',
		            'priority' => $i_priority++
		        )
		    )
		);
		
		/* URL */
		$wp_customize->add_setting( 'aribiz_header_slider_'.$key.'_url', array(
		        'default' => __( 'Title', 'aribiz' ),
				'sanitize_callback' => 'aribiz_sanitize_text',
			) 
		);
		$wp_customize->add_control('aribiz_header_slider_'.$key.'_url', array(
				'label'    => __( 'Slider Title', 'aribiz' ),
				'section' => 'aribiz_customizer_slider_section_boxes',
				'settings' => 'aribiz_header_slider_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Featured Header Text */
		$wp_customize->add_setting('aribiz_featured_textbox_header_slider_'.$key, array(
		        'default' => __( 'Description', 'aribiz' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'aribiz_sanitize_text',
		    )
		);
		$wp_customize->add_control('aribiz_featured_textbox_header_slider_'.$key, array(
				'label' => __( 'Slider Description', 'aribiz' ),
				'section' => 'aribiz_customizer_slider_section_boxes',
				'settings' => 'aribiz_featured_textbox_header_slider_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'aribiz_slider_' . $key . '_footer', array(
            'sanitize_callback' => 'aribiz_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aribiz_footer( $wp_customize, 'aribiz_slider_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'aribiz_customizer_slider_section_boxes',
			'settings'  => 'aribiz_slider_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
}
add_action( 'customize_register', 'aribiz_slider_text_boxes_options' );






function servicesText_customizer( $wp_customize ) {
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Icon 1', 'aribiz' ),
		'two'		=> __( 'Icon 2', 'aribiz' ),
		'three'		=> __( 'Icon 3', 'aribiz' ),
		 
	);
	
	
    $wp_customize->add_section( 'aribiz_services_section_con', array(
	     'title'       => __( 'Services Section Setting', 'aribiz' ),
	     'description' => __( 'This is a Services settings section to change the service section Details.', 'aribiz' ),
        )
    );
	
	
	
	
	
	
	
	
	
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'aribiz_services_' . $key . '_sub_title', array(
            'sanitize_callback' => 'aribiz_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aribiz_sub_title( $wp_customize, 'aribiz_services_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'aribiz_services_section_con',
					'settings'  => 'aribiz_services_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
	 
		
		/* Class */
		$wp_customize->add_setting( 'aribiz_header_servicesicon_'.$key.'_url', array(
		        'default' => __( 'Font class Name', 'aribiz' ),
				'sanitize_callback' => 'aribiz_sanitize_text',
			) 
		);
		$wp_customize->add_control('aribiz_header_servicesicon_'.$key.'_url', array(
				'label'    => __( 'Class Name', 'aribiz' ),
				'section' => 'aribiz_services_section_con',
				'settings' => 'aribiz_header_servicesicon_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Title */
		$wp_customize->add_setting( 'aribiz_header_services_'.$key.'_url', array(
		        'default' => __( 'Title', 'aribiz' ),
				'sanitize_callback' => 'aribiz_sanitize_text',
			) 
		);
		$wp_customize->add_control('aribiz_header_services_'.$key.'_url', array(
				'label'    => __( 'Title', 'aribiz' ),
				'section' => 'aribiz_services_section_con',
				'settings' => 'aribiz_header_services_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
	
	
		/* Featured Header Text */
		$wp_customize->add_setting('aribiz_featured_textbox_header_services_'.$key, array(
		        'default' => __( 'Description', 'aribiz' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'aribiz_sanitize_text',
		    )
		);
		$wp_customize->add_control('aribiz_featured_textbox_header_services_'.$key, array(
				'label' => __( 'Services Description', 'aribiz' ),
				'section' => 'aribiz_services_section_con',
				'settings' => 'aribiz_featured_textbox_header_services_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'aribiz_services_' . $key . '_footer', array(
            'sanitize_callback' => 'aribiz_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aribiz_footer( $wp_customize, 'aribiz_services_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'aribiz_services_section_con',
			'settings'  => 'aribiz_services_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
	
	
	
	
	
	
	
	
	
	
	
	$wp_customize->add_setting(
	    'aribiz_maiN_heading', array(
		    'default' => __( 'Heading', 'aribiz' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'aribiz_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'aribiz_maiN_heading', array(
			'label'    => __( 'Main Heading', 'aribiz' ),
			'section' => 'aribiz_services_section_con',
			'type' => 'text',
			'priority' => '20',
		)
	);
	
	
	 
	 
 
	
	
}
add_action( 'customize_register', 'servicesText_customizer' );




 

















 






 
 
// SANITIZATION
// ==============================
// Sanitize Text
function aribiz_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
// Sanitize Textarea
function aribiz_sanitize_text_field($input) {
	global $allowedposttags;
	$output = sanitize_text_field ( $input );
	return $output;
}

 // Sanitize Checkbox
function aribiz_sanitize_checkbox( $input ) {
	if( $input ):
		$output = '1';
	else:
		$output = false;
	endif;
	return $output;
}
// Sanitize Numbers
function aribiz_absint( $input ) {
	$value = absint( $input ); // Force the value into integer type.
    return ( 0 < $input ) ? $input : null;
}

  
function aribiz_sanitize_float( $input ) {
	return floatval( $input );
}
// Sanitize Uploads
function aribiz_sanitize_upload($input){
	return esc_url_raw($input);	
}
// Sanitize Colors
function aribiz_sanitize_hex($input){
	return maybe_hash_hex_color($input);
}



function customize_styles_aribiz_upgrade( $input ) { ?>
	   <style type="text/css">
		#customize-theme-controls #accordion-section-aribiz_upgrade .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-aribiz_upgrade .accordion-section-title {
			background-color: rgba(113, 176, 47, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-aribiz_upgrade .accordion-section-title:hover {
			background-color: rgba(113, 176, 47, 1);
		}
		#customize-theme-controls #accordion-section-aribiz_upgrade .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-aribiz_upgrade .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		h1 {
		line-height: 25px;
		}
	</style>
<?php }
 
add_action( 'customize_controls_print_styles', 'customize_styles_aribiz_upgrade');
 







/* Wait until all sections are created then re-order them */
function aribiz_reorder_sections_theme_customizer($wp_customize){
	
	$wp_customize->get_section('title_tagline')->priority = 2;
	$wp_customize->get_section('aribiz_logo_section')->priority = 3;
 
	$wp_customize->get_section('header_image')->priority = 6;
	$wp_customize->get_section('colors')->priority = 7;
	 
	
	$wp_customize->get_section('static_front_page')->priority = 11;
	$wp_customize->get_section('aribiz_customizer_slider_section_boxes')->priority = 14;
	$wp_customize->get_section('aribiz_logo_section')->priority = 15;
$wp_customize->get_section('aribiz_services_section_con')->priority = 16;
 
}
add_action('customize_register', 'aribiz_reorder_sections_theme_customizer');















