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
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );


// Add Theme Options section to Customizer
add_action( 'customize_register', 'rubine_customize_register_options' );

function rubine_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'rubine_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'rubine-lite' ),
		'description'    => rubine_customize_theme_links(),
	) );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = esc_html__( 'Background', 'rubine-lite' );

	// Add Display Site Title Setting
	$wp_customize->add_setting( 'rubine_theme_options[site_title]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_theme_options[site_title]', array(
        'label'    => esc_html__( 'Display Site Title', 'rubine-lite' ),
        'section'  => 'title_tagline',
        'settings' => 'rubine_theme_options[site_title]',
        'type'     => 'checkbox',
		'priority' => 10
		)
	);

	// Add Header Tagline option
	$wp_customize->add_setting( 'rubine_theme_options[header_tagline]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_header_tagline', array(
        'label'    => esc_html__( 'Display Tagline below site title.', 'rubine-lite' ),
        'section'  => 'title_tagline',
        'settings' => 'rubine_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 11
		)
	);

	// Add Header Image Link
	$wp_customize->add_setting( 'rubine_theme_options[custom_header_link]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url'
		)
	);
    $wp_customize->add_control( 'rubine_control_custom_header_link', array(
        'label'    => esc_html__( 'Header Image Link', 'rubine-lite' ),
        'section'  => 'header_image',
        'settings' => 'rubine_theme_options[custom_header_link]',
        'type'     => 'url',
		'priority' => 10
		)
	);

	// Add Custom Header Hide Checkbox
	$wp_customize->add_setting( 'rubine_theme_options[custom_header_hide]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'rubine_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'rubine_control_custom_header_hide', array(
        'label'    => esc_html__( 'Hide header image on front page', 'rubine-lite' ),
        'section'  => 'header_image',
        'settings' => 'rubine_theme_options[custom_header_hide]',
        'type'     => 'checkbox',
		'priority' => 15
		)
	);
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'rubine_customize_preview_js' );

function rubine_customize_preview_js() {
	wp_enqueue_script( 'rubine-lite-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151202', true );
}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'rubine_customize_preview_css' );

function rubine_customize_preview_css() {
	wp_enqueue_style( 'rubine-lite-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20160915' );

}

/**
 * Returns Theme Links
 */
function rubine_customize_theme_links() {

	ob_start();
	?>

		<div class="theme-links">

			<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'rubine-lite' ); ?></span>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/rubine/', 'rubine-lite' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=rubine&utm_content=theme-page" target="_blank">
					<?php esc_html_e( 'Theme Page', 'rubine-lite' ); ?>
				</a>
			</p>

			<p>
				<a href="http://preview.themezee.com/rubine/?utm_source=theme-info&utm_medium=textlink&utm_campaign=rubine&utm_content=demo" target="_blank">
					<?php esc_html_e( 'Theme Demo', 'rubine-lite' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/rubine-documentation/', 'rubine-lite' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=rubine&utm_content=documentation" target="_blank">
					<?php esc_html_e( 'Theme Documentation', 'rubine-lite' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/rubine-lite/reviews/?filter=5', 'rubine-lite' ) ); ?>" target="_blank">
					<?php esc_html_e( 'Rate this theme', 'rubine-lite' ); ?>
				</a>
			</p>

		</div>

	<?php
	$theme_links = ob_get_contents();
	ob_end_clean();

	return $theme_links;
}
