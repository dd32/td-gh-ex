<?php

class lookilite_customize {

	public $theme_fields;

	public function __construct( $fields = array() ) {

		$this->theme_fields = $fields;

		add_action ('admin_init' , array( &$this, 'admin_scripts' ) );
		add_action ('customize_register' , array( &$this, 'customize_panel' ) );
		add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );

	}

	public function admin_scripts() {
	
		global $wp_version, $pagenow;

		$file_dir = get_template_directory_uri()."/core/admin/includes/";
			
		if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' || $pagenow == 'edit.php' ) {
			wp_enqueue_style ( 'looki-lite-style', $file_dir.'css/theme.css' ); 
			wp_enqueue_script( 'looki-lite-script', $file_dir.'js/theme.js',array('jquery'),'',TRUE ); 
			wp_enqueue_script( "jquery-ui-core", array('jquery'));
			wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
		}
			
		if ( !get_option( 'looki-lite-dismissed-notice') ) {
			wp_enqueue_style ( 'looki-lite-notice',  $file_dir . 'css/notice.css', array(), '1.0.0' ); 
		}

	}

    public function customize_scripts() {

		wp_enqueue_style ( 
			'lookilite_panel', 
			get_template_directory_uri() . '/core/admin/includes/css/customize.css', 
			array(), 
			''
		);

		wp_enqueue_script( 
			  'customizer-preview',
			  get_template_directory_uri().'/core/admin/includes/js/customizer-preview.js',
			  array( 'jquery' ),
			  '1.0.0', 
			  true
		);

		$lookilite_details = array(
			'label' => __( 'Upgrade to Looki Premium', 'lookilite' ),
			'url' => esc_url('https://www.themeinprogress.com/looki/')
		);
	
		wp_localize_script( 'customizer-preview', 'lookilite_details', $lookilite_details );
	  
   }
	
   public function customize_panel ( $wp_customize ) {

		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			switch ( $element['type'] ) {
					
				case 'panel' :
				
					$wp_customize->add_panel( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'description' => $element['description'],
						'capability'     => 'edit_theme_options',
					
					) );
			 
				break;
				
				case 'section' :
						
					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'panel' => $element['panel'],
						'priority' => $element['priority'],
						'capability'     => 'edit_theme_options',
					
					) );
					
				break;

				case 'text' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_text_field',
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'upload' :
							
					$wp_customize->add_setting( $element['id'], array(

						'default' => $element['std'],
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw'

					) );

					$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $element['id'], array(
					
						'label' => $element['label'],
						'description' => $element['description'],
						'section' => $element['section'],
						'settings' => $element['id'],
					
					)));

				break;

				case 'url' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_url_raw',
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'button' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => array( &$this, 'customize_button_sanize' ),
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => 'url',
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'textarea' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_textarea',
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'custom_css' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'default' => $element['std'],
						'sanitize_callback'    => 'wp_filter_nohtml_kses',
						'sanitize_js_callback' => 'wp_filter_nohtml_kses',
						'capability'     => 'edit_theme_options',

					) );
											 
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => 'textarea',
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'select' :
							
					$wp_customize->add_setting( $element['id'], array(

						'sanitize_callback' => array( &$this, 'customize_select_sanize' ),
						'default' => $element['std'],
						'capability'     => 'edit_theme_options',

					) );
											 

					$wp_customize->add_control( $element['id'] , array(
						
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'choices'  => $element['options'],
									
					) );
							
				break;
	
			}
			
		}

   }

	public function customize_select_sanize ( $value, $setting ) {
		
		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			if ( $element['id'] == $setting->id ) :

				if ( array_key_exists($value, $element['options'] ) ) : 
						
					return $value;

				endif;

			endif;
			
		}
		
	}

	public function customize_button_sanize ( $value, $setting ) {
		
		$sanize = array (
		
			'lookilite_footer_email_button' => 'mailto:',
			'lookilite_footer_skype_button' => 'skype:',
		
		);

		if ( !strstr ( $value, $sanize[$setting->id]) ) :

			return $sanize[$setting->id] . $value;

		else:

			return esc_url_raw($value, array('skype', 'mailto'));

		endif;

	}

}

?>