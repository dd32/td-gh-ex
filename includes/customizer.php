<?php
/**
 * Register Customizer Agama Blue Heading
 *
 * @since 1.0.1
 */
function agama_blue_customize_heading($wp_customize) {
	class Agama_Blue_Customize_Agama_Blue_Heading extends WP_Customize_Control {
		public function render_content() { ?>
			<div class="agama-customize-heading">
				<h3><?php echo esc_html( $this->label ); ?></h3>
			</div>
		<?php 
		}
	}
}
add_action('customize_register', 'agama_blue_customize_heading');

/**
 * Define Customizer Settings, Controls etc...
 *
 * @since Agama 1.0.1
 */
function agama_blue_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'agama_blue_blog_posts_heading', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new Agama_Blue_Customize_Agama_Blue_Heading(
			$wp_customize, 'agama_blue_blog_posts_heading', array(
				'label'		=> __( 'Agama Blue Related', 'agama' ),
				'section'	=> 'agama_blog_section',
				'settings'	=> 'agama_blue_blog_posts_heading'
			)
		)
	); // Agama Blue blog feature
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
				'section'		=> 'agama_blog_section',
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
				'section'		=> 'agama_blog_section',
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
				'section'		=> 'agama_blog_section',
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
#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title,
#customize-theme-controls #accordion-panel-agama_theme_options > .accordion-section-title {
	background-color: rgba(0, 164, 208, 0.9) !important;
}
#accordion-section-agama_slider_section .accordion-section-content,
#accordion-section-agama_typography_section .accordion-section-content,
#accordion-section-agama_share_icons_section .accordion-section-content,
#accordion-section-agama_woocommerce_section .accordion-section-content,
#accordion-section-agama_lightbox_section .accordion-section-content,
#accordion-section-agama_body_background_animated_section .accordion-section-content,
#accordion-section-agama_contact_section .accordion-section-content {
	background-color: #00a4d0 !important;
}
#accordion-section-agama_body_background_animated_section h3:before,
#accordion-section-agama_slider_section h3:before,
#accordion-section-agama_typography_section h3:before,
#accordion-section-agama_share_icons_section h3:before,
#accordion-section-agama_woocommerce_section h3:before,
#accordion-section-agama_lightbox_section h3:before,
#accordion-section-agama_contact_section h3:before {
	color: #00a4d0 !important;
}
</style>
<?php } ?>