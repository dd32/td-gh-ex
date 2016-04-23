<?php 
function spasalon_general_settings_customizer( $wp_customize ){

// Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>Default Color Skins</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="" data-customize-setting-link="">
				<img src="<?php echo get_template_directory_uri(); ?>/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  }
		  ?>
		  <?php
       }

}


// list control categories	
if ( ! class_exists( 'WP_Customize_Control' ) ) return NULL;

 class Category_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $cats = false;
	
    public function __construct($wp_customize, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);
        parent::__construct( $wp_customize, $id, $args );
    }

    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
// list contro categories

	/* general settings */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'sis_spa'),
	) );
	
	
		/* color scheme section */
		$wp_customize->add_section( 'color_scheme' , array(
			'title'      => __('Color Schemes', 'sis_spa'),
			'panel'  => 'general_settings'
		) );
	
			// color scheme
			$wp_customize->add_setting( 'spa_theme_options[color_scheme_style]' , array(
			'default'    => 'default.css',
			'type'=>'option',
			'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control( new WP_color_Customize_Control( $wp_customize , 'spa_theme_options[color_scheme_style]' , array(
			'label' => __('Color Scheme','sis_spa'),
			'section' => 'color_scheme',
			'type'=>'select',
			'choices'=> array(
				'default.css'=>'default.png',
				'aqua.css'=>'aqua.png',
				'blue.css'=>'blue.png',
				'fiord.css'=>'fiord.png',
				'green.css'=>'green.png',
				'mandy.css'=>'mandy.png',
				'orange.css'=>'orange.png',
				'purple.css'=>'purple.png',
				'sea-green.css'=>'sea-green.png',
			) ) ) );
			
			// custom color enable / disable
			$wp_customize->add_setting( 'spa_theme_options[custom_color_enable]' , array(
			'default'    => false,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control( 'spa_theme_options[custom_color_enable]' , array(
			'label' => __('Enable Custom Color','sis_spa'),
			'section' => 'color_scheme',
			'type'=>'checkbox'
			) );
			
			// custom color
			$wp_customize->add_setting( 'spa_theme_options[custom_color]' , array(
			'default'    => '#f22853',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'spa_theme_options[custom_color]' , array(
			'label' => __('Choose Your Color Scheme','sis_spa'),
			'section' => 'color_scheme',
			'settings'=>'spa_theme_options[custom_color]'
			) ) );
			
		/* Logo section */
		$wp_customize->add_section( 'logo_section' , array(
			'title'      => __('Logo Settings', 'sis_spa'),
			'panel'  => 'general_settings'
		) );
			
			// logo
			$wp_customize->add_setting( 'spa_theme_options[upload_image]' , array(
			'default' => get_template_directory_uri().'/images/logo.png',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'spa_theme_options[upload_image]' ,
			array(
			'label'          => __( 'Upload Logo Image  ( 150 x 35 )', 'sis_spa' ),
			'section'        => 'logo_section',
		    ) )	);
			
			// width
			$wp_customize->add_setting( 'spa_theme_options[width]' , array(
			'default' => 150,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[width]' , array(
			'label'          => __( 'Width', 'sis_spa' ),
			'section'        => 'logo_section',
			'type'           => 'text'
		    ) );
			
			// height
			$wp_customize->add_setting( 'spa_theme_options[height]' , array(
			'default' => 35,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[height]' , array(
			'label'          => __( 'Height', 'sis_spa' ),
			'section'        => 'logo_section',
			'type'           => 'text'
		    ) );
			
			// enable logo text
			$wp_customize->add_setting( 'spa_theme_options[enable_logo_text]' , array(
			'default' => false,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[enable_logo_text]' , array(
			'label'          => __( 'Enable Logo Text', 'sis_spa' ),
			'section'        => 'logo_section',
			'type'           => 'checkbox'
		    ) );
			
		/* Banner section */
		$wp_customize->add_section( 'banner_section' , array(
			'title'      => __('Banner Settings', 'sis_spa'),
			'panel'  => 'general_settings'
		) );
		
			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[spa_bannerstrip_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_bannerstrip_enable]' , array(
			'label'          => __( 'Enable Spa Banner strip in all pages', 'sis_spa' ),
			'section'        => 'banner_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => 'ON',
				'no'  => 'OFF'
			) ) );
			
			// banner call us no
			$wp_customize->add_setting( 'spa_theme_options[call_us]' , array(
			'default' => '201 567 8978',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[call_us]' , array(
			'label'          => __( 'Call us on', 'sis_spa' ),
			'section'        => 'banner_section',
			'type'           => 'text'
			) );
			
			// banner call us text
			$wp_customize->add_setting( 'spa_theme_options[call_us_text]' , array(
			'default' => 'Call us on',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[call_us_text]' , array(
			'label'          => __( 'Call us Text', 'sis_spa' ),
			'section'        => 'banner_section',
			'type'           => 'text'
			) );
			
		/* custom css section */
		$wp_customize->add_section( 'custom_css_section' , array(
			'title'      => __('Custom CSS', 'sis_spa'),
			'panel'  => 'general_settings'
		) );
		
			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[spa_custom_css]' , array(
			'default' => '',
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_custom_css]' , array(
			'label'          => __( 'Custom CSS', 'sis_spa' ),
			'section'        => 'custom_css_section',
			'type'           => 'textarea'
			) );
			
		/* footer copyright section */
		$wp_customize->add_section( 'copyright_section' , array(
			'title'      => __('Footer Copyright', 'sis_spa'),
			'panel'  => 'general_settings'
		) );
		
			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[footer_tagline]' , array(
			'sanitize_callback' => 'spasalon_general_sanitize_text',
			'default' => '&copy; Copyright 2016. All Rights Reserved by <a href="#">Webriti</a>',
			'type'=>'option',
			) );
			$wp_customize->add_control('spa_theme_options[footer_tagline]' , array(
			'label'          => __( 'Copyright Text', 'sis_spa' ),
			'section'        => 'copyright_section',
			'type'           => 'textarea'
			) );
			
			
			function spasalon_general_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}
			
			function spasalon_general_sanitize_html( $input ) {

			return force_balance_tags( $input );
			
			}
	
}
add_action( 'customize_register', 'spasalon_general_settings_customizer' );