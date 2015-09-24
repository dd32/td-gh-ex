<?php
/**
 * Aron Theme Customizer
 *
 * @package Aron
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 function aron_textarea_register($wp_customize){
	class aron_Customize_aron_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        
      
        <h1><?php _e( 'Get Aron PRO Theme!  Just $19', 'aron' ); ?></h1>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Upgrade to Aron PRO Theme', 'aron' ); ?>" href="<?php echo esc_url( 'http://arinio.com/aron-responsive-multipurpose-wordpress-theme/' ); ?>" target="_blank">
			<?php _e( 'Upgrade to Aron PRO Theme', 'aron' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'View More our themes', 'aron' ); ?>" href="<?php echo esc_url( 'http://arinio.com/' ); ?>" target="_blank">
			<?php _e( 'View More our themes', 'aron' ); ?>
			</a>
			 
			<a href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>" title="<?php esc_attr_e( 'Free Support', 'aron' ); ?>" target="_blank">
			<?php _e( 'Free Support', 'aron' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://arinio.com/aron-responsive-multipurpose-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'View Demo', 'aron' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'aron' ); ?>
			</a>
           <a href="<?php echo esc_url( 'http://arinio.com/get-free-our-theme/' ); ?>" title="<?php esc_attr_e( 'Get Free Pro Version', 'aron' ); ?>" target="_blank">
			<?php _e( 'Get Free Pro Version', 'aron' ); ?>
			</a>
		</div>
		<?php
		}
	}
 
}



add_action('customize_register', 'aron_textarea_register');
 
 
 
function aron_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	 
	 
	 
	 
	 $wp_customize->add_section('aron_upgrade', array(
		'title'					=> __('Aron Support', 'aron'),
		'description'			=> __('You are using the Aron, Free Version of Aron Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and Life time theme support and much more. ','aron'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'aron_theme_settings[aron_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new aron_Customize_aron_upgrade(
		$wp_customize,
		'aron_upgrade',
			array(
				'label'					=> __('Aron Upgrade','aron'),
				'section'				=> 'aron_upgrade',
				'settings'				=> 'aron_theme_settings[aron_upgrade]',
			)
		)
	);
	
}
add_action( 'customize_register', 'aron_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since aron 1.0
 */
function aron_customize_preview_js() {
	wp_enqueue_script( 'aron_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), rand(),  true );
}
add_action( 'customize_preview_init', 'aron_customize_preview_js' );
 
 
 
/**
 * Implement the Custom Logo feature
 */
function aron_theme_customizer( $wp_customize ) {
   
   $wp_customize->add_section( 'aron_logo_section' , array(
    'title'       => __( 'Basic Setting', 'aron' ),
    'description' => __( 'This Is a Basic Setting Section For Frontpage', 'aron' ),
) );
   $wp_customize->add_setting( 'aron_logo', array(
        'sanitize_callback' => 'aron_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aron_logo', array(
    'label'    => __( 'Site Logo', 'aron' ),
    'section'  => 'aron_logo_section',
    'settings' => 'aron_logo',
	)));
	
	
	
	 $wp_customize->add_setting( 'aron_logo2', array(
        'sanitize_callback' => 'aron_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aron_logo2', array(
    'label'    => __( 'Favicon', 'aron' ),
    'section'  => 'aron_logo_section',
    'settings' => 'aron_logo2',
	)));
	
	
	 
	$wp_customize->add_setting(
	    'aron_copyright_text', array(
		    'default' => __( 'Copyright', 'aron' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'aron_sanitize_text',
	    )
	);
	
	$wp_customize->add_control(
		'aron_copyright_text', array(
			'label'    => __( 'Copyright Text', 'aron' ),
			'section' => 'aron_logo_section',
			'type' => 'text',
		)
	);
	
	
	
		 
	
	
	
	
	 
	
	
	
	
	
	
	
	
	
	
		$wp_customize->add_setting(
	    'aron_custom_css', array(
		    'default' => __( '', 'aron' ),
			'capability' => 'edit_theme_options', 
		    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    )
	);
	
	$wp_customize->add_control(
		'aron_custom_css', array(
			'label'    => __( 'Custom CSS', 'aron' ),
			'section' => 'aron_logo_section',
			'type' => 'textarea',
		)
	);
	
	
}
add_action('customize_register', 'aron_theme_customizer');
 
 
 
/* 
 * USE TO divide a section in to smaller sections
 */
function aron_add_customizer_custom_controls( $wp_customize ) {
	//  Add Custom Subtitle
	//  =============================================================================
	class aron_sub_title extends WP_Customize_Control {
		public $type = 'sub-title';
		public function render_content() {
		?>
			<h2 class="aron-custom-sub-title"><?php echo esc_html( $this->label ); ?></h2>
		<?php
		}
	}
	//  Add Custom Description
	//  =============================================================================
	class aron_description extends WP_Customize_Control {
		public $type = 'description';
		public function render_content() {
		?>
			<p class="aron-custom-description"><?php echo esc_html( $this->label ); ?></p>
		<?php
		}
	}
	
	class aron_footer extends WP_Customize_Control {
		public $type = 'footer';
		public function render_content() {
		?>
			<hr />
		<?php
		}
	}
}
add_action( 'customize_register', 'aron_add_customizer_custom_controls' );




 








function aron_slider_text_boxes_options( $wp_customize ){
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Slider 1', 'aron' ),
		'two'		=> __( 'Slider 2', 'aron' ),
		 
	);
	$wp_customize->add_section( 'aron_customizer_slider_text_boxes', array(
		'title'    => __( 'Slider Setting', 'aron' ),
		'description'    => __( 'You can upload here images for slider', 'aron' ),
		
	));
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'aron_slider_' . $key . '_sub_title', array(
            'sanitize_callback' => 'aron_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aron_sub_title( $wp_customize, 'aron_slider_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'aron_customizer_slider_text_boxes',
					'settings'  => 'aron_slider_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
		/* File Upload */
		$wp_customize->add_setting( 'aron_header_slider-'.$key.'-file-upload', array(
            'sanitize_callback' => 'aron_sanitize_upload',
        ) );
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control($wp_customize, 'aron_header_slider-'.$key.'-file-upload', array(
		            'label' => __( 'File Upload', 'aron' ),
		            'section' => 'aron_customizer_slider_text_boxes',
		            'settings' => 'aron_header_slider-'.$key.'-file-upload',
		            'priority' => $i_priority++
		        )
		    )
		);
		
		/* URL */
		$wp_customize->add_setting( 'aron_header_slider_'.$key.'_url', array(
		        'default' => __( 'Title', 'aron' ),
				'sanitize_callback' => 'aron_sanitize_text',
			) 
		);
		$wp_customize->add_control('aron_header_slider_'.$key.'_url', array(
				'label'    => __( 'Slider Title', 'aron' ),
				'section' => 'aron_customizer_slider_text_boxes',
				'settings' => 'aron_header_slider_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Featured Header Text */
		$wp_customize->add_setting('aron_featured_textbox_header_slider_'.$key, array(
		        'default' => __( 'Description', 'aron' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'aron_sanitize_text',
		    )
		);
		$wp_customize->add_control('aron_featured_textbox_header_slider_'.$key, array(
				'label' => __( 'Slider Description', 'aron' ),
				'section' => 'aron_customizer_slider_text_boxes',
				'settings' => 'aron_featured_textbox_header_slider_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'aron_slider_' . $key . '_footer', array(
            'sanitize_callback' => 'aron_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aron_footer( $wp_customize, 'aron_slider_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'aron_customizer_slider_text_boxes',
			'settings'  => 'aron_slider_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
}
add_action( 'customize_register', 'aron_slider_text_boxes_options' );






function servicesText_customizer( $wp_customize ) {
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Icon 1', 'aron' ),
		'two'		=> __( 'Icon 2', 'aron' ),
		'three'		=> __( 'Icon 3', 'aron' ),
		'four'		=> __( 'Icon 4', 'aron' ),
	);
	
	
    $wp_customize->add_section( 'aron_servicesText_section_contact', array(
	     'title'       => __( 'Services Setting', 'aron' ),
	     'description' => __( 'This is a Services settings section to change the servise section Details.', 'aron' ),
        )
    );
	
	
	
	
	
	
	
	
	
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'aron_services_' . $key . '_sub_title', array(
            'sanitize_callback' => 'aron_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aron_sub_title( $wp_customize, 'aron_services_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'aron_servicesText_section_contact',
					'settings'  => 'aron_services_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
	 
		
		/* Class */
		$wp_customize->add_setting( 'aron_header_servicesicon_'.$key.'_url', array(
		        'default' => __( 'Font class Name', 'aron' ),
				'sanitize_callback' => 'aron_sanitize_text',
			) 
		);
		$wp_customize->add_control('aron_header_servicesicon_'.$key.'_url', array(
				'label'    => __( 'Class Name', 'aron' ),
				'section' => 'aron_servicesText_section_contact',
				'settings' => 'aron_header_servicesicon_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Title */
		$wp_customize->add_setting( 'aron_header_services_'.$key.'_url', array(
		        'default' => __( 'Title', 'aron' ),
				'sanitize_callback' => 'aron_sanitize_text',
			) 
		);
		$wp_customize->add_control('aron_header_services_'.$key.'_url', array(
				'label'    => __( 'Title', 'aron' ),
				'section' => 'aron_servicesText_section_contact',
				'settings' => 'aron_header_services_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
	
	
		/* Featured Header Text */
		$wp_customize->add_setting('aron_featured_textbox_header_services_'.$key, array(
		        'default' => __( 'Description', 'aron' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'aron_sanitize_text',
		    )
		);
		$wp_customize->add_control('aron_featured_textbox_header_services_'.$key, array(
				'label' => __( 'Services Description', 'aron' ),
				'section' => 'aron_servicesText_section_contact',
				'settings' => 'aron_featured_textbox_header_services_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'aron_services_' . $key . '_footer', array(
            'sanitize_callback' => 'aron_sanitize_text',
        ));
		$wp_customize->add_control( 
			new aron_footer( $wp_customize, 'aron_services_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'aron_servicesText_section_contact',
			'settings'  => 'aron_services_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
	
	
	
	
	
	
	
	
	
	
	
	$wp_customize->add_setting(
	    'aron_maiN_heading', array(
		    'default' => __( 'Heading', 'aron' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'aron_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'aron_maiN_heading', array(
			'label'    => __( 'Main Heading', 'aron' ),
			'section' => 'aron_servicesText_section_contact',
			'type' => 'text',
			'priority' => '20',
		)
	);
	
	
		$wp_customize->add_setting(
	    'aron_maiN_description', array(
		    'default' => __( 'Description', 'aron' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'aron_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'aron_maiN_description', array(
			'label'    => __( 'Main Description', 'aron' ),
			'section' => 'aron_servicesText_section_contact',
			'type' => 'textarea',
			'priority' => '21',
		)
	);
	 
	
	
	
	
	
	
	
	
	
}
add_action( 'customize_register', 'servicesText_customizer' );




 

















 






 
 
// SANITIZATION
// ==============================
// Sanitize Text
function aron_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
// Sanitize Textarea
function aron_sanitize_textarea($input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}
// Sanitize Checkbox
function aron_sanitize_checkbox( $input ) {
	if( $input ):
		$output = '1';
	else:
		$output = false;
	endif;
	return $output;
}
// Sanitize Numbers
function aron_sanitize_integer( $input ) {
	$value = (int) $input; // Force the value into integer type.
    return ( 0 < $input ) ? $input : null;
}
function aron_sanitize_float( $input ) {
	return floatval( $input );
}
// Sanitize Uploads
function aron_sanitize_upload($input){
	return esc_url_raw($input);	
}
// Sanitize Colors
function aron_sanitize_hex($input){
	return maybe_hash_hex_color($input);
}



function customize_styles_aron_upgrade( $input ) { ?>
	   <style type="text/css">
		#customize-theme-controls #accordion-section-aron_upgrade .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-aron_upgrade .accordion-section-title {
			background-color: rgba(113, 176, 47, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-aron_upgrade .accordion-section-title:hover {
			background-color: rgba(113, 176, 47, 1);
		}
		#customize-theme-controls #accordion-section-aron_upgrade .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-aron_upgrade .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		h1 {
		line-height: 25px;
		}
	</style>
<?php }
 
add_action( 'customize_controls_print_styles', 'customize_styles_aron_upgrade');
 







/* Wait until all sections are created then re-order them */
function aron_reorder_sections_theme_customizer($wp_customize){
	
	$wp_customize->get_section('title_tagline')->priority = 2;
	$wp_customize->get_section('aron_logo_section')->priority = 3;
	$wp_customize->get_section('nav')->priority = 4;
	$wp_customize->get_section('header_image')->priority = 6;
	$wp_customize->get_section('colors')->priority = 7;
	 
	
	$wp_customize->get_section('static_front_page')->priority = 11;
	$wp_customize->get_section('aron_customizer_slider_text_boxes')->priority = 14;
	$wp_customize->get_section('aron_logo_section')->priority = 15;
$wp_customize->get_section('aron_servicesText_section_contact')->priority = 16;
 
}
add_action('customize_register', 'aron_reorder_sections_theme_customizer');















