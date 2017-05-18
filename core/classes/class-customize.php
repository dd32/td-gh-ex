<?php

class alhenalite_customize {

	public $theme_fields;

	public function __construct( $fields = array() ) {

		$this->theme_fields = $fields;

		add_action ('customize_register' , array( &$this, 'customize_panel' ) );
		add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );

	}

	public function customize_scripts() {

		wp_enqueue_style ( 
			'alhenalite_panel', 
			get_template_directory_uri() . '/core/admin/assets/css/customize.css', 
			array(), 
			''
		);

		wp_enqueue_script( 
			  'customizer-preview',
			  get_template_directory_uri().'/core/admin/assets/js/customizer-preview.js',
			  array( 'jquery' ),
			  '1.0.0', 
			  true
		);

		$alhenalite_details = array(
			'label' => esc_html__( 'Upgrade to Alhena Premium', 'alhena-lite' ),
			'url' => esc_url('https://www.themeinprogress.com/alhena-free-responsive-corporate-wordpress-theme/?ref=2&campaign=alhena-panel')
		);
	
		wp_localize_script( 'customizer-preview', 'alhenalite_details', $alhenalite_details );
	  
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
						'capability' => 'edit_theme_options',

					) );
			 
				break;
				
				case 'section' :
						
					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'panel' => $element['panel'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',

					) );
					
				break;

				case 'text' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_text_field',
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'url' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_url_raw',
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

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
						'sanitize_callback' => 'esc_url_raw',
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $element['id'], array(
					
						'label' => $element['label'],
						'description' => $element['description'],
						'section' => $element['section'],
						'settings' => $element['id'],

					)));

				break;

				case 'color' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_hex_color',
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'select' :
							
					$wp_customize->add_setting( $element['id'], array(

						'sanitize_callback' => array( &$this, 'customize_select_sanize' ),
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_control( $element['id'] , array(
						
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'choices'  => $element['options'],
									
					) );
							
				break;

				case 'alhenalite-customize-info' :

					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_setting(  $element['id'], array(
						'sanitize_callback' => 'esc_url_raw'
					) );
					 
					$wp_customize->add_control( new Alhenalite_Customize_Info_Control( $wp_customize,  $element['id'] , array(
						'section' => $element['section'],
					) ) );		
										
				break;

			}
			
		}

   }

	public function customize_select_sanize ($value, $setting) {

		global $wp_customize;
			
		$control = $wp_customize->get_control( $setting->id );
		 
		if ( array_key_exists( $value, $control->choices ) ) {
			
			return $value;
			
		} else {
			
			return $setting->default;
			
		}

	}

	public function customize_button_sanize ( $value, $setting ) {
		
		$sanize = array (
		
			'wip_footer_email_button' => 'mailto:',
			'wip_footer_skype_button' => 'skype:',
		
		);

		if ( !strstr ( $value, $sanize[$setting->id]) ) :

			return $sanize[$setting->id] . $value;

		else:

			return esc_url_raw($value, array('skype', 'mailto'));

		endif;

	}

}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Alhenalite_Customize_Info_Control extends WP_Customize_Control {

		public $type = "alhenalite-customize-info";

		public function render_content() { ?>

			<h2><?php esc_html_e('Get support','alhena-lite');?></h2> 
            
            <div class="inside">
    
                <p><?php esc_html_e("If you've opened a new support ticket from <strong>WordPress.org</strong>, please send a reminder to <strong>support@wpinprogress.com</strong>, to get a faster reply.","alhena-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/theme/alhena-lite' ); ?>" title="<?php esc_attr_e('Open a new ticket','alhena-lite');?>" target="_blank"><?php esc_html_e('Open a new ticket','alhena-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'mailto:support@wpinprogress.com' ); ?>" title="<?php esc_attr_e('Send a reminder','alhena-lite');?>" target="_blank"><?php esc_html_e('Send a reminder','alhena-lite');?></a></li>
                
                </ul>
    

                <p><?php esc_html_e("If you like this theme and support, <strong>I'd appreciate</strong> any of the following:","alhena-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/alhena-lite#postform' ); ?>" title="<?php esc_attr_e('Rate this Theme','alhena-lite');?>" target="_blank"><?php esc_html_e('Rate this Theme','alhena-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.facebook.com/WpInProgress' ); ?>" title="<?php esc_attr_e('Like on Facebook','alhena-lite');?>" target="_blank"><?php esc_html_e('Like on Facebook','alhena-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'http://eepurl.com/SknoL' ); ?>" title="<?php esc_attr_e('Subscribe our newsletter','alhena-lite');?>" target="_blank"><?php esc_html_e('Subscribe our newsletter','alhena-lite');?></a></li>
                
                </ul>
    
            </div>
    
		<?php

		}
	
	}

}

?>