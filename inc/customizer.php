<?php
/**
 * Best Simple Theme Customizer
 *
 * @package Best_Simple
 */

?>

<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function best_simple_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => 'best_simple_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => 'best_simple_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'best_simple_customize_register' );

/**
 * Chaning the position of the options in customizer
 *
 * @param WP_CUSTOMIZE $wp_customize - Saving new values to controller.
 */
function best_simple_customizer_changes( $wp_customize ) {

	// =============================================================
	// Making the changes to Name of Settings.
	// =============================================================
	$wp_customize->get_section( 'colors' )->priority       = 30;
	$wp_customize->get_section( 'header_image' )->priority = 20;

	$wp_customize->get_section( 'colors' )->title       = __( 'Manage Theme Colors', 'best-simple' );
	$wp_customize->get_section( 'header_image' )->title = __( 'Featured Hero Image', 'best-simple' );
}
add_action( 'customize_register', 'best_simple_customizer_changes' );

/**
 * Render the site title for the selective refresh partial.
 */
function best_simple_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function best_simple_customize_partial_blogdescription() {
	bloginfo( 'description' );
}









/**
 * Initialize the customizer function
 *
 * @param WP_CUSTOMIZE $wp_customize - Saving new values to controller.
 */
function best_simple_customizer( $wp_customize ) {

	/**
	 * Check box sanitization function.
	 *
	 * @param Input    $input - Taking input values from user.
	 * @param Settings $setting - Holding changes.
	 */
	function best_simple_sanitize_select( $input, $setting ) {

		// input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
		$input = sanitize_key( $input );

		// get the list of possible select options.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// return input if valid or return default option.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	//
	//
		// Global Layout Settings.
		$wp_customize->add_section(
			'best_simple_layout_settings',
			array(
				'title'    => esc_html__( 'Layout Options', 'best-simple' ),
				'priority' => 50,
			)
		);

	//
		// Adding Homepage Layout Setting.
		$wp_customize->add_setting(
			'best_simple_homepage_layout_settings',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => 'grid',
				'sanitize_callback' => 'best_simple_sanitize_select',
			)
		);

		// Adding Homepage Layout Controls.
		$wp_customize->add_control(
			'best_simple_homepage_layout_settings',
			array(
				'label'   => esc_html__( 'Homepage & Archive Layout', 'best-simple' ),
				'section' => 'best_simple_layout_settings',
				'type'    => 'select',
				'choices' => array(
					'grid'          => esc_html__( 'Grid Layout', 'best-simple' ),
					'left-sidebar'  => esc_html__( 'Left Sidebar', 'best-simple' ),
					'right-sidebar' => esc_html__( 'Right Sidebar', 'best-simple' ),
				),
			)
		);

}
add_action( 'customize_register', 'best_simple_customizer' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function best_simple_customize_preview_js() {
	wp_enqueue_script( 'best-simple-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'best_simple_customize_preview_js' );
