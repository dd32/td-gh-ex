<?php 
function busiprof_post_slugs_settings( $wp_customize ){

	/* Post slug section */
	$wp_customize->add_section( 'custom_post_slug_section' , array(
		'title'      => __('Custom Post Slug Settings', 'busi_prof'),
		'priority'       => 128,
   	) );
	
		//Portfolio Pro
		class busiprof_Customize_slug_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e('Want to add Custom Post Type Slug than','busi_prof'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/busiprof' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','busi_prof'); ?> </a>  
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'slug_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new busiprof_Customize_slug_upgrade(
			$wp_customize,
			'slug_upgrade',
				array(
					'label'					=> __('Busiprof Upgrade','busi_prof'),
					'section'				=> 'custom_post_slug_section',
					'settings'				=> 'slug_upgrade',
				)
			)
		);
		
		// slider slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_slider_slug]', array( 'default' => 'busiprof-slider' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_slider_slug]', 
			array(
				'label'    => __( 'Slider Slug', 'busi_prof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Services Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_service_slug]', array( 'default' => 'busiprof-service' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_service_slug]', 
			array(
				'label'    => __( 'Services Slug', 'busi_prof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Projects Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_project_slug]', array( 'default' => 'busiprof-project' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_project_slug]', 
			array(
				'label'    => __( 'Projects Slug', 'busi_prof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Portfolio Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_portfolio_slug]', array( 'default' => 'busiprof-portfolio' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_portfolio_slug]', 
			array(
				'label'    => __( 'Portfolio Slug', 'busi_prof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Testimonial Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_testimonial_slug]', array( 'default' => 'busiprof-testimonial' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_testimonial_slug]', 
			array(
				'label'    => __( 'Testimonial Slug', 'busi_prof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
		// Team Slug
		$wp_customize->add_setting( 'busiprof_pro_theme_options[busiprof_team_slug]', array( 'default' => 'busiprof-team' , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[busiprof_team_slug]', 
			array(
				'label'    => __( 'Team Slug', 'busi_prof' ),
				'section'  => 'custom_post_slug_section',
				'type'     => 'text',
				'input_attrs' => array('disabled' => 'disabled'),
		));
		
class WP_amenities_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <p><?php _e( 'After change slug settings you change permalink settings', 'busi_prof' ); ?></p>
    <?php
    }
}
		$wp_customize->add_setting( 'custom_label_slug' ,
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field'
			)	
		);
		$wp_customize->add_control( new WP_amenities_Customize_Control( $wp_customize, 'custom_label_slug', array(	
				'label' => __('Discover Busi Prof Pro','busi_prof'),
				'section' => 'custom_post_slug_section',
			))
		);
		
}
add_action( 'customize_register', 'busiprof_post_slugs_settings' );