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
			
	}

    public function customize_scripts() {

		wp_enqueue_style ( 
			'lookilite_panel', 
			get_template_directory_uri() . '/core/admin/includes/css/customize.css', 
			array(), 
			''
		);
	  
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

				case 'looki-lite-customize-info' :
	
					$wp_customize->add_section( $element['id'], array(
						
						'title' => $element['title'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',
	
					));
	
					$wp_customize->add_setting(  $element['id'], array(
						'sanitize_callback' => 'esc_url_raw'
					));
						 
					$wp_customize->add_control( new Lookilite_Customize_Info_Control( $wp_customize,  $element['id'] , array(
						'section' => $element['section'],
					)));		
											
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

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Lookilite_Customize_Info_Control extends WP_Customize_Control {

		public $type = "looki-lite-customize-info";

		public function render_content() { ?>

            <div class="inside">

				<h2><?php esc_html_e('Looki premium version','looki-lite');?></h2> 

                <p><?php esc_html_e("Upgrade to the premium version of Looki, to enable 600+ Google Fonts, unlimited widget areas, portfolio section and much more.","looki-lite");?></p>

                <ul>
                
                    <li><a class="button purchase-button" href="<?php echo esc_url( 'https://www.themeinprogress.com/looki/?ref=2&campaign=looki-lite-panel' ); ?>" title="<?php esc_attr_e('Upgrade to Looki premium','looki-lite');?>" target="_blank"><?php esc_html_e('Upgrade to Looki premium','looki-lite');?></a></li>
                
                </ul>

            </div>
            
            <div class="inside">

                <h2><?php esc_html_e('Become a supporter','looki-lite');?></h2> 

                <p><?php esc_html_e("If you like this theme and support, I'd appreciate any of the following:","looki-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/'.get_stylesheet().'#postform' ); ?>" title="<?php esc_attr_e('Rate this Theme','looki-lite');?>" target="_blank"><?php esc_html_e('Rate this Theme','looki-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.themeinprogress.com/reserved-area/' ); ?>" title="<?php esc_attr_e('Subscribe our newsletter','looki-lite');?>" target="_blank"><?php esc_html_e('Subscribe our newsletter','looki-lite');?></a></li>
                
                </ul>
    
            </div>
    
		<?php

		}
	
	}

}

?>