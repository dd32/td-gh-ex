<?php
/**
 * Customizer section options.
 *
 * @package arilewp
 *
 */

require ARILEWP_PARENT_INC_DIR . '/customizer/webfont.php';
require ARILEWP_PARENT_INC_DIR . '/customizer/controls/code/arilewp-customize-typography-control.php';
require ARILEWP_PARENT_INC_DIR . '/customizer/controls/code/arilewp-customize-category-control.php';
require ARILEWP_PARENT_INC_DIR . '/customizer/controls/code/arilewp-customize-plugin-control.php';
require ARILEWP_PARENT_INC_DIR . '/customizer/customizer-notify/arilewp-customizer-notify.php';
$repeater_file_path = trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-repeater/functions.php';
if ( file_exists( $repeater_file_path ) ) { require_once( $repeater_file_path ); }
function arilewp_customizer_theme_settings( $wp_customize ){
	
	$active_callback    	= isset( $array['active_callback'] ) ? $array['active_callback'] : null;
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	
	$wp_customize->get_section( 'header_image' )->panel = 'arilewp_theme_settings';
	$wp_customize->get_section( 'header_image' )->title    = __( 'Page Header', 'arilewp' );
    $wp_customize->get_section( 'header_image' )->priority = 40;
	
		// Sticky Bar Logo
		$wp_customize->add_setting( 'arilewp_sticky_bar_logo', array(
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arilewp_sticky_bar_logo',
			array(
				'label'    => esc_html__( 'Set Sticky Bar Logo', 'arilewp' ),
				'description'    => esc_html__( 'You can Upload the Standrad size of logo (210px*39px)', 'arilewp' ),
				'section'  => 'arilewp_theme_menu_bar',
				'settings' => 'arilewp_sticky_bar_logo',
				'priority'        => 15,
			) 
		));			
		$wp_customize->add_setting( 'arilewp_typography_base_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '',
		) );
		$wp_customize->add_control( new ArileWP_Customizer_Typography_Control( $wp_customize,'arilewp_typography_base_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'arilewp' ),
			'section' 			=> 'arilewp_base_typography',
			'settings' 			=> 'arilewp_typography_base_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	
		
	    $wp_customize->add_setting( 'arilewp_typography_base_font_size',
		array(
            'default' => '1rem',
			'sanitize_callback' => 'arilewp_sanitize_text',
		));	
		$wp_customize->add_control( 'arilewp_typography_base_font_size',
		array(
			'label'   => esc_html__( 'Font Size', 'arilewp' ),
			'description'           => esc_html__( 'You can enter font-size in px or rem ', 'arilewp' ),
			'section' => 'arilewp_base_typography',
			'priority'        => 15,
			'type' => 'text',
		));	

        $wp_customize->add_setting( 'arilewp_typography_h1_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '',
		) );
		$wp_customize->add_control( new ArileWP_Customizer_Typography_Control( $wp_customize,'arilewp_typography_h1_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'arilewp' ),
			'section' 			=> 'arilewp_headings1_typography',
			'settings' 			=> 'arilewp_typography_h1_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );

        $wp_customize->add_setting( 'arilewp_typography_h2_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '',
		) );
		$wp_customize->add_control( new ArileWP_Customizer_Typography_Control( $wp_customize,'arilewp_typography_h2_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'arilewp' ),
			'section' 			=> 'arilewp_headings2_typography',
			'settings' 			=> 'arilewp_typography_h2_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	

        $wp_customize->add_setting( 'arilewp_typography_h3_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '',
		) );
		$wp_customize->add_control( new ArileWP_Customizer_Typography_Control( $wp_customize,'arilewp_typography_h3_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'arilewp' ),
			'section' 			=> 'arilewp_headings3_typography',
			'settings' 			=> 'arilewp_typography_h3_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	
		
		$wp_customize->add_setting( 'arilewp_typography_h4_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '',
		) );
		$wp_customize->add_control( new ArileWP_Customizer_Typography_Control( $wp_customize,'arilewp_typography_h4_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'arilewp' ),
			'section' 			=> 'arilewp_headings4_typography',
			'settings' 			=> 'arilewp_typography_h4_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );		

        $wp_customize->add_setting( 'arilewp_typography_h5_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '',
		) );
		$wp_customize->add_control( new ArileWP_Customizer_Typography_Control( $wp_customize,'arilewp_typography_h5_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'arilewp' ),
			'section' 			=> 'arilewp_headings5_typography',
			'settings' 			=> 'arilewp_typography_h5_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );	

        $wp_customize->add_setting( 'arilewp_typography_h6_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '',
		) );
		$wp_customize->add_control( new ArileWP_Customizer_Typography_Control( $wp_customize,'arilewp_typography_h6_font_family', array(
			'label' 			=> esc_html__( 'Font Family', 'arilewp' ),
			'section' 			=> 'arilewp_headings6_typography',
			'settings' 			=> 'arilewp_typography_h6_font_family',
			'priority' 			=> 10,
			'type' 				=> 'select',
			'active_callback' 	=> $active_callback,
		) ) );
		
		$wp_customize->add_setting(
			'arilewp_footer_copright_text',
			array(
				'sanitize_callback' =>  'arilewp_sanitize_text',
				'default' => __('Copyright © 2019 <a href="http://wordpress.org/">WordPress</a> <span class="sep"> | </span> ArileWP by <a target="_blank" href="https://themearile.com/">ThemeArile</a>', 'arilewp'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('arilewp_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','arilewp'),
				'section' => 'arilewp_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));
		


}
add_action( 'customize_register', 'arilewp_customizer_theme_settings' );

add_action( 'customize_register', 'arilewp_recommended_plugin_section' );
function arilewp_recommended_plugin_section( $manager ) {
	// Register custom section types.
	$manager->register_section_type( 'ArileWP_Customize_Recommended_Plugin_Section' );
	// Register sections.
	$manager->add_section(
		new ArileWP_Customize_Recommended_Plugin_Section(
			$manager,
			'arilewp_upgrade_to_pro_option',
			array(
				'title'    => esc_html__( 'Ready for more?', 'arilewp' ),
                'priority' => 1000, 
				'plugin_text' => esc_html__( 'Get ArileWP Pro', 'arilewp' ),
				'plugin_url'  => 'https://themearile.com/arilewp-pro-theme/'
			)
		)
	);	
}

$notify_config_customizer = array(
	'recommended_plugins'       => array(
		'arile-extra' => array(
			'recommended' => true,
			'description' => wp_kses_post('Activate by installing <strong>Arile Extra</strong> plugin to use front page and all theme features.', 'arilewp'),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'arilewp' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'arilewp' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'arilewp' ),
	'activate_button_label'     => esc_html__( 'Activate', 'arilewp' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'arilewp' ),
);
ArileWP_Customizer_Notify::init( apply_filters( 'arilewp_customizer_notify_array', $notify_config_customizer ) );