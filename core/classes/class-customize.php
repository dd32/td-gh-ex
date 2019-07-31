<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'novalite_customize' ) ) {

	class novalite_customize {
	
		public $theme_fields;
	
		public function __construct( $fields = array() ) {
	
			$this->theme_fields = $fields;

			add_action ('admin_init' , array( &$this, 'admin_scripts' ) );
			add_action ('customize_register' , array( &$this, 'customize_panel' ) );
			add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );
	
		}

		public function admin_scripts() {
		
			global $wp_version, $pagenow;
	
			$file_dir = get_template_directory_uri()."/core/admin/assets/";
				
			if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' || $pagenow == 'edit.php' ) {
				wp_enqueue_style ( 'nova-lite-style', $file_dir.'css/theme.css' ); 
				wp_enqueue_script( 'nova-lite-script', $file_dir.'js/theme.js',array('jquery'),'',TRUE ); 
				wp_enqueue_script( "jquery-ui-core", array('jquery'));
				wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
			}
				
			if ( !get_option( 'nova-lite-dismissed-notice') ) {
				wp_enqueue_style ( 'nova-lite-notice',  $file_dir . 'css/notice.css', array(), '1.0.0' ); 
			}
	
		}
	
		public function customize_scripts() {
	
			wp_enqueue_style ( 
				'nova-lite-customizer', 
				get_template_directory_uri() . '/core/admin/assets/css/customize.css', 
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
						
						) );
				 
					break;
					
					case 'section' :
							
						$wp_customize->add_section( $element['id'], array(
						
							'title' => $element['title'],
							'panel' => $element['panel'],
							'priority' => $element['priority'],
						
						) );
						
					break;
	
					case 'text' :
								
						$wp_customize->add_setting( $element['id'], array(
						
							'sanitize_callback' => 'sanitize_text_field',
							'default' => $element['std'],
	
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
							'capability' => 'edit_theme_options',
	
						)));
	
					break;
	
					case 'color' :
								
						$wp_customize->add_setting( $element['id'], array(
						
							'sanitize_callback' => 'sanitize_hex_color',
							'default' => $element['std'],
	
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
							'sanitize_js_callback' => 'wp_filter_nohtml_kses'
	
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
	
						) );
	
						$wp_customize->add_control( $element['id'] , array(
							
							'type' => $element['type'],
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],
							'choices'  => $element['options'],
										
						) );
								
					break;

					case 'nova-lite-customize-info' :
	
						$wp_customize->add_section( $element['id'], array(
						
							'title' => $element['title'],
							'priority' => $element['priority'],
							'capability' => 'edit_theme_options',
	
						));
	
						$wp_customize->add_setting(  $element['id'], array(
							'sanitize_callback' => 'esc_url_raw'
						));
						 
						$wp_customize->add_control( new NovaLite_Customize_Info_Control( $wp_customize,  $element['id'] , array(
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
			
				'novalite_footer_email_button' => 'mailto:',
				'novalite_footer_skype_button' => 'skype:',
			
			);
	
			if (!isset($value) || $value == '' || $value == $sanize[$setting->id]) {
	
				return '';
	
			} elseif (!strstr($value, $sanize[$setting->id])) {
		
				return $sanize[$setting->id] . $value;
		
			} else {
		
				return esc_url_raw($value, array('mailto', 'skype'));
		
			}
	
		}
	
	}

}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class NovaLite_Customize_Info_Control extends WP_Customize_Control {

		public $type = "nova-lite-customize-info";

		public function render_content() { ?>

            <div class="inside">

				<h2><?php esc_html_e('Nova premium version','nova-lite');?></h2> 

                <p><?php esc_html_e("Upgrade to the premium version of Nova, to enable 600+ Google Fonts, unlimited sidebars, portfolio section and much more.","nova-lite");?></p>

                <ul>
                
                    <li><a class="button purchase-button" href="<?php echo esc_url( 'https://www.themeinprogress.com/nova-free-responsive-portfolio-blogging-wordpress-theme/?ref=2&campaign=nova-lite-panel' ); ?>" title="<?php esc_attr_e('Upgrade to Nova premium','nova-lite');?>" target="_blank"><?php esc_html_e('Upgrade to Nova premium','nova-lite');?></a></li>
                
                </ul>

            </div>
            
            <div class="inside">

                <h2><?php esc_html_e('Become a supporter','nova-lite');?></h2> 

                <p><?php esc_html_e("If you like this theme and support, I'd appreciate any of the following:","nova-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/'.get_stylesheet().'#postform' ); ?>" title="<?php esc_attr_e('Rate this Theme','nova-lite');?>" target="_blank"><?php esc_html_e('Rate this Theme','nova-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.themeinprogress.com/reserved-area/' ); ?>" title="<?php esc_attr_e('Subscribe our newsletter','nova-lite');?>" target="_blank"><?php esc_html_e('Subscribe our newsletter','nova-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/themes/author/alexvtn/' ); ?>" title="<?php esc_attr_e('Download our free WordPress themes','nova-lite');?>" target="_blank"><?php esc_html_e('Download our free WordPress themes','nova-lite');?></a></li>
                
                </ul>
    
            </div>
    
		<?php

		}
	
	}

}

?>