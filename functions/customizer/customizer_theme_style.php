<?php 
// Adding customizer home page setting
function corpbiz_style_customizer( $wp_customize ){
//Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>Predefined colors</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio">
				<img <?php if($this->value() == $key){ echo 'class="selected_img"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  } 
       }

}
	/* Theme Style settings */
	$wp_customize->add_section( 'theme_style' , array(
		'title'      => __('Theme style setting', 'corpbiz'),
		'priority'   => 200,
   	) );
	
	
	class WP_color_pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Use below default color skin & custom color skin than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" class="service" target = "_blank" id="review_pro"><?php _e('Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'color_pro',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_color_pro_Customize_Control( $wp_customize, 'color_pro', array(	
			'section' => 'theme_style',
			'setting' => 'color_pro',
		))
	);
	
	
	
	 //Theme Color Scheme
	$wp_customize->add_setting(
	'corpbiz_options[theme_color]', array(
	'default' => 'default.css',  
	'capability'     => 'edit_theme_options',
	'type' => 'option',
	'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'corpbiz_options[theme_color]',
	array(
        'label'   => __('Predefined colors', 'corpbiz'),
        'section' => 'theme_style',
		'type' => 'radio',
		'settings' => 'corpbiz_options[theme_color]',	
		'choices' => array(
			'default.css' => 'default.png',
            'endeavour.css' => 'endeavour.png',
            'red.css' => 'red.png',
			'green.css' => 'green.png',
			'aqua.css' => 'aqua.png',
			'curious.css' =>'curious.png',
			'orange.css' => 'orange.png',
			
    )
	
	)));
	
	
	$wp_customize->add_setting(
    'corpbiz_options[link_color_enable]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[link_color_enable]',
    array(
        'label' => __('Skin color enable','corpbiz'),
        'section' => 'theme_style',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
	'corpbiz_options[link_color]', array(
	'capability'     => 'edit_theme_options',
	'default' => '#66d1b9',
	'type' => 'option',
	'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'corpbiz_options[link_color]', 
	array(
		'label'      => __( 'Skin color', 'corpbiz' ),
		'section'    => 'theme_style',
		'settings'   => 'corpbiz_options[link_color]',
	) ) );
	
	
}
add_action( 'customize_register', 'corpbiz_style_customizer');