<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );

// Load Customizer Settings
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-header.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-slider.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

// Add Theme Options section to Customizer
add_action( 'customize_register', 'anderson_customize_register_options' );

function anderson_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'anderson_panel_options', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'anderson-lite' ),
		'description'    => anderson_customize_theme_links(),
	) );

	// Change default background section
	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	$wp_customize->get_section( 'background_image' )->title   = esc_html__( 'Background', 'anderson-lite' );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Add selective refresh for site title and description.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'anderson_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'anderson_customize_partial_blogdescription',
	) );

	// Add Display Site Title Setting.
	$wp_customize->add_setting( 'anderson_theme_options[site_title]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'anderson_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'anderson_theme_options[site_title]', array(
		'label'    => esc_html__( 'Display Site Title', 'anderson-lite' ),
		'section'  => 'title_tagline',
		'settings' => 'anderson_theme_options[site_title]',
		'type'     => 'checkbox',
		'priority' => 10,
		)
	);

	// Add Display Tagline Setting.
	$wp_customize->add_setting( 'anderson_theme_options[header_tagline]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'anderson_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'anderson_theme_options[header_tagline]', array(
		'label'    => esc_html__( 'Display Tagline', 'anderson-lite' ),
		'section'  => 'title_tagline',
		'settings' => 'anderson_theme_options[header_tagline]',
		'type'     => 'checkbox',
		'priority' => 11,
		)
	);

	// Add Header Image Link
	$wp_customize->add_setting( 'anderson_theme_options[custom_header_link]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
		)
	);
	$wp_customize->add_control( 'anderson_control_custom_header_link', array(
		'label'    => esc_html__( 'Header Image Link', 'anderson-lite' ),
		'section'  => 'header_image',
		'settings' => 'anderson_theme_options[custom_header_link]',
		'type'     => 'url',
		'priority' => 10,
		)
	);

	// Add Custom Header Hide Checkbox
	$wp_customize->add_setting( 'anderson_theme_options[custom_header_hide]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'anderson_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'anderson_control_custom_header_hide', array(
		'label'    => esc_html__( 'Hide header image on front page', 'anderson-lite' ),
		'section'  => 'header_image',
		'settings' => 'anderson_theme_options[custom_header_hide]',
		'type'     => 'checkbox',
		'priority' => 15,
		)
	);
}


/**
 * Render the site title for the selective refresh partial.
 */
function anderson_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * Render the site tagline for the selective refresh partial.
 */
function anderson_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'anderson_customize_preview_js' );

function anderson_customize_preview_js() {

	wp_enqueue_script( 'anderson-lite-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20161214', true );

}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'anderson_customize_preview_css' );

function anderson_customize_preview_css() {

	wp_enqueue_style( 'anderson-lite-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20161214' );

}

/**
 * Returns Theme Links
 */
function anderson_customize_theme_links() {

	ob_start();
	?>

		<div class="theme-links">

			<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'anderson-lite' ); ?></span>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/anderson/', 'anderson-lite' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=anderson&utm_content=theme-page" target="_blank">
					<?php esc_html_e( 'Theme Page', 'anderson-lite' ); ?>
				</a>
			</p>

			<p>
				<a href="http://preview.themezee.com/?demo=anderson&utm_source=customizer&utm_campaign=anderson" target="_blank">
					<?php esc_html_e( 'Theme Demo', 'anderson-lite' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/anderson-documentation/', 'anderson-lite' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=anderson&utm_content=documentation" target="_blank">
					<?php esc_html_e( 'Theme Documentation', 'anderson-lite' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/anderson-lite/reviews/?filter=5', 'anderson-lite' ) ); ?>" target="_blank">
					<?php esc_html_e( 'Rate this theme', 'anderson-lite' ); ?>
				</a>
			</p>

		</div>

	<?php
	$theme_links = ob_get_contents();
	ob_end_clean();

	return $theme_links;
}
