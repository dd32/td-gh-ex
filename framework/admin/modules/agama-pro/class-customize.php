<?php 

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.3.6
 * @access public
 */
final class Agama_Customize {
    
	/**
	 * Returns the instance.
	 *
	 * @since  1.3.6
	 * @access public
	 * @return object
	 */
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
    
	/**
	 * Constructor method.
	 *
	 * @since  1.3.6
	 * @access private
	 * @return void
	 */
	private function __construct() {}
    
	/**
	 * Sets up initial actions.
	 *
	 * @since  1.3.6
	 * @access private
	 * @return void
	 */
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
    
	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.3.6
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {
		
        // Load custom sections.
        get_template_part( 'framework/admin/modules/agama-pro/section-pro' );
		
        // Register custom section types.
		$manager->register_section_type( 'Agama_Customize_Section_Pro' );
		
        // Register sections.
		$manager->add_section(
			new Agama_Customize_Section_Pro(
				$manager,
				'agama_pro',
				array(
					'title'    => esc_html__( 'Agama Pro', 'agama' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'agama' ),
					'pro_url'  => 'https://theme-vision.com/agama-pro/',
                    'priority' => 1
				)
			)
		);
	}
    
	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.3.6
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 
            'agama-pro-customize-controls', 
            AGAMA_MODULES_URI . 'agama-pro/customize-controls.js', 
            array( 'customize-controls' ) 
        );
		wp_enqueue_style( 'agama-pro-customize-controls', AGAMA_MODULES_URI . 'agama-pro/customize-controls.css' );
	}
}
// Doing this customizer thang!
Agama_Customize::get_instance();
