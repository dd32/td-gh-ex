<?php // Footer copyright section 
	function elitepress_copyright_customizer( $wp_customize ) {
	$wp_customize->add_panel( 'elitepress_copyright_setting', array(
		'priority'       => 800,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer settings', 'elitepress'),
	) );
	
	$wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => __('Footer copyright settings','elitepress'),
            'priority' => 35,
			'panel' => 'elitepress_copyright_setting',
        )
    );
	
	
	$wp_customize->add_setting(
    'elitepress_lite_options[footer_copyright_text]',
    array(
       'default' => '<p>'.__('©2017 All Rights Reserved - Webriti. - Designed and Developed by','elitepress').'<a href="http://www.webriti.com/" target="_blank">'.__('Webriti','elitepress').'</a></p>',
		'type' =>'option',
		'sanitize_callback' => 'elitepress_copyright_sanitize_text'
		
    )
);
$wp_customize->add_control(
    'elitepress_lite_options[footer_copyright_text]',
    array(
        'label' => __('Copyright text','elitepress'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ));
	
	
	$wp_customize->add_setting(
    'elitepress_lite_options[footer_menu_bar_enabled]',
    array(
        'default' => true ,
		'type' =>'option',
		'sanitize_callback' => 'elitepress_copyright_sanitize_text'
		
    )
);
$wp_customize->add_control(
    'elitepress_lite_options[footer_menu_bar_enabled]',
    array(
        'label' => __('Enable Footer Menu Bar','elitepress'),
        'section' => 'copyright_section_one',
        'type' => 'checkbox',
    ));
	
// adding upgrade to por message for slider
	class WP_Footer_pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
		public function render_content() {
		?>
			 <div class="pro-version">
			 <p><?php _e('To want use more footer options click to upgrade to pro','elitepress');?></p>
			 </div>
			  <div class="pro-box">
			 <a href="<?php echo esc_url('http://webriti.com/elitepress/');?>" class="service" id="review_pro" target="_blank"><?php _e( 'Upgrade to Pro','elitepress' ); ?></a>
			 <div>
			<?php
		}
    }

	$wp_customize->add_setting(
		'footer_upgrade',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_Footer_pro_Customize_Control( $wp_customize, 'footer_upgrade', array(	
			'section' => 'copyright_section_one',
			'setting' => 'footer_upgrade',
			'priority' => 1,
	
	)));
	
	
	function elitepress_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}
	
	function elitepress_copyright_sanitize_html( $input ) {

    return force_balance_tags( $input );

}
}
add_action( 'customize_register', 'elitepress_copyright_customizer' );
?>