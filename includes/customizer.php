<?php
/**
 * Define Customizer Settings, Controls etc...
 *
 * @since Agama 1.0.1
 */
function agama_blue_customize_register( $wp_customize ) {
	// Agama Blue Options Panel
	$wp_customize->add_panel( 'agama_blue_panel', array(
		'title'				=> __( 'Agama Blue Options', 'agama-blue' ),
		'description'		=> __( 'Agama blue theme options.', 'agama-blue' ),
		'capability'		=> 'edit_theme_options',
		'priority'			=> 130
	) ); // Blog Section
	$wp_customize->add_section( 'agama_blue_blog_section', array(
		'title'				=> __( 'Blog', 'agama-blue' ),
		'description'		=> __( 'Blog settings.', 'agama-blue' ),
		'panel'				=> 'agama_blue_panel'
	) ); // Agama Blue blog feature
	$wp_customize->add_setting( 'agama_blue_blog', array(
		'default'			=> true,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'agama_blue_blog', array(
				'label'			=> __( 'Enable blog feature ?', 'agama-blue' ),
				'description'	=> __( 'Enable blog feature on homepage.', 'agama-blue' ),
				'section'		=> 'agama_blue_blog_section',
				'settings'		=> 'agama_blue_blog',
				'type'			=> 'checkbox'
			)
		)
	); // Blog Heading
	$wp_customize->add_setting( 'agama_blue_blog_heading', array(
		'default'			=> 'Latest from the Blog',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'agama_blue_blog_heading', array(
				'label'			=> __( 'Blog Heading', 'agama-blue' ),
				'description'	=> __( 'Set custom blog section heading title.', 'agama-blue' ),
				'section'		=> 'agama_blue_blog_section',
				'settings'		=> 'agama_blue_blog_heading',
				'type'			=> 'text'
			)
		)
	); // Blog Posts Heading
	$wp_customize->add_setting( 'agama_blue_blog_posts_number', array(
		'default'			=> '4',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'agama_blue_blog_posts_number', array(
				'label'			=> __( 'Blog Posts', 'agama' ),
				'description' 	=> __( 'Enter how many blog posts should appear on blog section on homepage.', 'agama-blue' ),
				'section'		=> 'agama_blue_blog_section',
				'settings'		=> 'agama_blue_blog_posts_number',
				'type'			=> 'text'
			)
		)
	);
}
add_action( 'customize_register', 'agama_blue_customize_register' );

/**
 * Generating Dynamic CSS
 *
 * @since 1.0.1
 */
function agama_blue_customize_css() { ?>
	<style type="text/css" id="agama-blue-customize-css">
	.ipost .entry-title h3 a:hover,
	.ipost .entry-title h4 a:hover { color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#00a4d0' ) ); ?>; }
	<?php if( get_theme_mod( 'agama_layout_style', 'boxed' ) == 'boxed' ): ?>
	#main-wrapper { position: relative; }
	@media only screen and (min-width: 1100px) {
		.container-blog { width: 1100px; }
	}
	<?php endif; ?>
	</style>
<?php }
add_action( 'wp_head', 'agama_blue_customize_css' );

/**
* Customize Stylesheet
*
* @since 1.0
*/
add_action( 'customize_controls_print_styles', 'customize_styles_agama_blue_support' );
function customize_styles_agama_blue_support() { ?>
<style type="text/css">
#customize-theme-controls #accordion-panel-agama_blue_panel .accordion-section-title {
	background-color: rgba(0, 164, 208, 0.9) !important;
	color: #FFF;
}
#customize-theme-controls #accordion-panel-agama_blue_panel .accordion-section-title:after {
	color: #FFF;
}
</style>
<?php } ?>