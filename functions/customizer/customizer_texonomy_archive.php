<?php 

// Adding customizer texonomy archive settings

function corpbiz_texonomy_archive_customizer( $wp_customize ){
	
	/* texonomy archive Panel */
	$wp_customize->add_panel( 'texonomy_archive_portfolio', array(
		'priority'       => 650,
		'capability'     => 'edit_theme_options',
		'title'      => __('Texonomy archive portfolio', 'corpbiz'),
	) );
	
	/* texonomy archive portfolio section */
	$wp_customize->add_section( 'texonomy_portfolio' , array(
		'title'      => __('Texonomy archive portfolio', 'corpbiz'),
		'panel'  => 'texonomy_archive_portfolio',
		'priority'   => 1,
   	) );
	
	class WP_portfolio_taxonomy_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Add taxonomy portfolio category template than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" class="service" id="review_pro">
	 <?php _e( 'Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'portfolio_taxonomy_pro',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_portfolio_taxonomy_Customize_Control( $wp_customize, 'portfolio_taxonomy_pro', array(	
			'section' => 'texonomy_portfolio',
			'setting' => 'portfolio_taxonomy_pro',
		))
	);
	
	
	$wp_customize->add_setting(
		'corpbiz_options[taxonomy_portfolio_list]',
		array(
			'default'           =>  2,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[taxonomy_portfolio_list]', array(
			'label' => __('Number of taxonomy archive portfolio','corpbiz'),
			'section' => 'texonomy_portfolio',
			'type'    =>  'select',
			'choices'=>array(2=>2,3=>3,4=>4)
	));	 // texonomy archive portfolio
	
}
add_action( 'customize_register', 'corpbiz_texonomy_archive_customizer' );