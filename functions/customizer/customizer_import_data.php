<?php
class spasalon_customize_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof spasalon_customize_import_dummy_data ) ) {
			self::$instance = new spasalon_customize_import_dummy_data;
			self::$instance->spasalon_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function spasalon_setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'spasalon_customize_register' ) );

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'spasalon_import_customize_scripts' ), 0 );

	}

	public function spasalon_import_customize_scripts() {

	wp_enqueue_script( 'spasalon-import-customizer-js', get_template_directory_uri() . '/js/spasalon-import-customizer.js', array( 'customize-controls' ) );
	}

	public function spasalon_customize_register( $wp_customize ) {

		require_once get_template_directory() . '/functions/custom_control/class-dummy-import-control.php';
		
		$wp_customize->register_section_type( 'spasalon_dummy_import' );

		$wp_customize->add_section(
			new spasalon_dummy_import(
				$wp_customize,
				'spasalon_import_section',
				array(
					'priority' => 0,
				)
			)
		);

	}
}

$import_customizer = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
spasalon_customize_import_dummy_data::init( apply_filters( 'spasalon_import_customizer', $import_customizer ) );
