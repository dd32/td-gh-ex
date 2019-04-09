<?php
function elitepress_client_customizer( $wp_customize ) {
		 
	//Client setting
	$wp_customize->add_section(
        'client_section_settings',
        array(
            'title' => __('Client settings','elitepress'),
            'description' => '',
			'priority'   => 406,
			'panel'  => 'elitepress_homepage_setting',)
    );
	
    //Upgrade to pro
		class elitepress_customize_client_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to add client? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'client_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_client_upgrade_pro_message(
			$wp_customize,
			'client_upgrade',
				array(
					'section'				=> 'client_section_settings',
					'settings'				=> 'client_upgrade',
					'priority'   => 1,
				)
			)
		);
	
	
	
	$wp_customize->add_setting(
	'elitepress_lite_options[client_section_enabled]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_sanitize_checkbox',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[client_section_enabled]', array(
        'label'   => __('Enable client section on front page', 'elitepress'),
        'section' => 'client_section_settings',
        'type'    => 'checkbox',
		'priority'   => 1,
    )); // enable / disable home Client
	
	
		//Client link
	class WP_client_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e('Click here to add client','elitepress'); ?></a>
    <?php
    }
	}

	$wp_customize->add_setting(
		'client',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_client_Customize_Control( $wp_customize, 'client', array(	
			'section' => 'client_section_settings',
			'priority'   => 500,
		))
	);

}	

add_action( 'customize_register', 'elitepress_client_customizer' );?>