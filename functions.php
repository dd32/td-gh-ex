<?php
/**
 * Function describe for AyaGreen 
 * 
 * @package ayagreen
 */



if ( ! function_exists( 'ayagreen_load_css_and_scripts' ) ) :

	function ayagreen_load_css_and_scripts() {

		wp_enqueue_style( 'allingrid-stylesheet', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'ayagreen-child-style', get_stylesheet_uri(), array( 'ayagreen-stylesheet' ) );

		// Load Utilities JS Script
		wp_enqueue_script( 'ayagreen-js', get_stylesheet_directory_uri() . '/assets/js/ayagreen.js',
			array( 'jquery' ) );
	}

endif; // ayagreen_load_css_and_scripts

add_action( 'wp_enqueue_scripts', 'ayagreen_load_css_and_scripts' );

if ( ! class_exists( 'ayagreen_Customize' ) ) :
	/**
	 * Singleton class for handling the theme's customizer integration.
	 */
	final class ayagreen_Customize {

		// Returns the instance.
		public static function get_instance() {

			static $instance = null;

			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance->setup_actions();
			}

			return $instance;
		}

		// Constructor method.
		private function __construct() {}

		// Sets up initial actions.
		private function setup_actions() {

			// Register panels, sections, settings, controls, and partials.
			add_action( 'customize_register', array( $this, 'sections' ) );

			// Register scripts and styles for the controls.
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
		}

		// Sets up the customizer sections.
		public function sections( $manager ) {

			// Load custom sections.

			// Register custom section types.
			$manager->register_section_type( 'ayawild_Customize_Section_Pro' );

			// Register sections.
			$manager->add_section(
				new ayawild_Customize_Section_Pro(
					$manager,
					'ayagreen',
					array(
						'title'    => esc_html__( 'AyaGreenPro', 'ayagreen' ),
						'pro_text' => esc_html__( 'Upgrade', 'ayagreen' ),
						'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayagreenpro' )
					)
				)
			);
		}

		// Loads theme customizer CSS.
		public function enqueue_control_scripts() {

			wp_enqueue_script( 'ayawild-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

			wp_enqueue_style( 'ayawild-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
		}
	}
endif; // ayagreen_Customize

// Doing this customizer thang!
ayagreen_Customize::get_instance();

/**
 * Remove Parent theme Customize Up-Selling Section
 */
if ( ! function_exists( 'ayagreen_remove_parent_theme_upsell_section' ) ) :

	function ayagreen_remove_parent_theme_upsell_section( $wp_customize ) {

		// Remove Parent-Theme Upsell section
		$wp_customize->remove_section('ayawild');
	}

endif; // ayagreen_remove_parent_theme_upsell_section

add_action( 'customize_register', 'ayagreen_remove_parent_theme_upsell_section', 100 );

if ( ! function_exists( 'ayagreen_show_header_phone' ) ) :

	/**
	 *	Displays the header phone.
	 */
	function ayagreen_show_header_phone() {

		$phone = get_theme_mod('ayagreen_header_phone');

		if ( !empty( $phone ) ) {

			echo '<span id="header-phone">' . esc_html($phone) . '</span>';
		}
	}

endif; // ayagreen_show_header_phone

if ( ! function_exists( 'ayagreen_show_header_email' ) ) :

	/**
	 *	Displays the header email.
	 */
	function ayagreen_show_header_email() {

		$email = get_theme_mod('ayagreen_header_email');

		if ( !empty( $email ) ) {

			echo '<span id="header-email"><a href="mailto:' . antispambot($email, 1) . '" title="' . esc_attr($email) . '">'
					. esc_html($email) . '</a></span>';
		}
	}

endif; // ayagreen_show_header_email

if ( ! function_exists( 'ayagreen_customize_register' ) ) :

	/**
	 * Register theme settings in the customizer
	 */
	function ayagreen_customize_register( $wp_customize ) {

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'ayagreen_header_section',
			array(
				'title'       => __( 'Header', 'ayagreen' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add header phone
		$wp_customize->add_setting(
			'ayagreen_header_phone',
			array(
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayagreen_header_phone',
	        array(
	            'label'          => __( 'Your phone to appear in the website header', 'ayagreen' ),
	            'section'        => 'ayagreen_header_section',
	            'settings'       => 'ayagreen_header_phone',
	            'type'           => 'text',
	            )
	        )
		);

		// Add header email
		$wp_customize->add_setting(
			'ayagreen_header_email',
			array(
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayagreen_header_email',
	        array(
	            'label'          => __( 'Your e-mail to appear in the website header', 'ayagreen' ),
	            'section'        => 'ayagreen_header_section',
	            'settings'       => 'ayagreen_header_email',
	            'type'           => 'text',
	            )
	        )
		);
	}

endif; // ayagreen_customize_register

add_action('customize_register', 'ayagreen_customize_register');