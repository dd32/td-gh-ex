<?php

class suevafree_customize {

	public $theme_fields;

	public function __construct( $fields = array() ) {

		$this->theme_fields = $fields;

		add_action ('customize_register' , array( &$this, 'customize_panel' ) );
		add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );

	}

	public function customize_scripts() {

		wp_enqueue_style ( 
			'suevafree_panel', 
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

		$jaxlite_details = array(
			'label' => __( 'Upgrade to Sueva Premium', 'suevafree' ),
			'url' => esc_url('https://www.themeinprogress.com/sueva/?aff=panel'),
			'demotitle' => __( 'Live Demo', 'suevafree' ),
			'demourl' => esc_url('http://demo.themeinprogress.com/?theme=Suevafree')
		);
	
		wp_localize_script( 'customizer-preview', 'suevafree_details', $jaxlite_details );
	  
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
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

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
						'capability' => 'edit_theme_options',

					) );
							
				break;

				case 'suevafree-customize-info' :

					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_setting(  $element['id'], array(
						'sanitize_callback' => 'esc_url_raw'
					) );
					 
					$wp_customize->add_control( new Suevafree_Customize_Info_Control( $wp_customize,  $element['id'] , array(
						'section' => $element['section'],
					) ) );		
										
				break;

			}
			
		}

		if ( !suevafree_is_woocommerce_active() ) :
		
			$wp_customize->remove_control( 'suevafree_woocommerce_category_layout');
			
		endif;

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
		
			'suevafree_footer_email_button' => 'mailto:',
			'suevafree_footer_skype_button' => 'skype:',
			'suevafree_footer_whatsapp_button' => 'tel:',
		
		);
		
		$sanize = array (
		
			'suevafree_footer_email_button' => 'mailto:',
			'suevafree_footer_skype_button' => 'skype:',
			'suevafree_footer_whatsapp_button' => 'tel:',
		
		);
		
		if ( $value ) :
	
			if ( !strstr ( $value, $sanize[$setting->id]) ) {
	
				return $sanize[$setting->id] . $value ;
	
			} else {
	
				return esc_url_raw( $value, array('skype', 'mailto', 'tel'));
	
			}
			
		else:
		
			return '';
		
		endif;

	}

}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Suevafree_Customize_Info_Control extends WP_Customize_Control {

		public $type = "suevafree-customize-info";

		public function render_content() { ?>

			<h2><?php _e('Get support','suevafree');?></h2> 
            
            <div class="inside">
    
                <p><?php _e("If you've opened a new support ticket from <strong>WordPress.org</strong>, please send a reminder to <strong>support@wpinprogress.com</strong>, to get a faster reply.","suevafree");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/theme/'.get_stylesheet() ); ?>" title="<?php _e('Open a new ticket','suevafree');?>" target="_blank"><?php _e('Open a new ticket','suevafree');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'mailto:support@wpinprogress.com' ); ?>" title="<?php _e('Send a reminder','suevafree');?>" target="_blank"><?php _e('Send a reminder','suevafree');?></a></li>
                
                </ul>
    

                <p><?php _e("If you like this theme and support, <strong>I'd appreciate</strong> any of the following:","suevafree");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/'.get_stylesheet().'#postform' ); ?>" title="<?php _e('Rate this Theme','suevafree');?>" target="_blank"><?php _e('Rate this Theme','suevafree');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.facebook.com/WpInProgress' ); ?>" title="<?php _e('Like on Facebook','suevafree');?>" target="_blank"><?php _e('Like on Facebook','suevafree');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'http://eepurl.com/SknoL' ); ?>" title="<?php _e('Subscribe our newsletter','suevafree');?>" target="_blank"><?php _e('Subscribe our newsletter','suevafree');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/themes/author/alexvtn/' ); ?>" title="<?php _e('Download our free WordPress themes','suevafree');?>" target="_blank"><?php _e('Download our free WordPress themes','suevafree');?></a></li>
                
                </ul>
    
            </div>
    
		<?php

		}
	
	}

}

?>