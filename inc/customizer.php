<?php
/**
 * The Customizer.
 *
 * @package WordPress
 * @subpackage Abacus
 * @since Abacus 1.0
 */
function abacus_default_theme_options() {
	//delete_option( 'theme_mods_abacus' );
	return array(
		'read_more_text' => __( 'Continue reading', 'abacus' ),
		'featured_title_description' => __( 'Featured product description text', 'abacus' ),
		'popular_title_description' => __( 'Popular product description text', 'abacus' ),
	);
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class Abacus_Reset_Control extends WP_Customize_Control {
		public function render_content() {
			echo '<p class="customizer-section-intro">' . $this->description . '</p>';

			echo '<button type="button" class="button" id="abc-reset-theme-options">' . __( 'Reset', 'abacus' ) . '</button>';
		}
	}
}

class Abacus_Customizer {
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'customize_register', array( $this, 'customize_register' ), 99 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ) );
	}

	static public function init() {
    	if ( current_user_can( 'edit_theme_options' ) ) {
	        if ( isset( $_REQUEST['abc-reset'] ) ) {
		    	if ( ! wp_verify_nonce( $_REQUEST['abc-reset'], 'abc-customizer' ) ) {
		        	return;
		        }

				remove_theme_mods();
				wp_redirect( esc_url( admin_url( 'customize.php' ) ) );
            }
    	}
    }

	public function customize_register( $wp_customize ) {
		$abacus_default_theme_options = abacus_default_theme_options();

		$wp_customize->get_setting( 'site_icon' )->transport = 'refresh';
		$wp_customize->remove_section( 'background_image' );

		## Layout section
		$wp_customize->add_section( 'abc_layout', array(
			'title' => __( 'Layout', 'abacus' ),
			'priority' => 22,
		) );
		// setting
		$wp_customize->add_setting( 'read_more_text', array(
			'default' => $abacus_default_theme_options['read_more_text'],
			'sanitize_callback' => 'abacus_sanitize_text',
		) );
		// control
		$wp_customize->add_control( 'read_more_text', array(
			'label'    => __( 'Read More text', 'abacus' ),
			'section'  => 'abc_layout',
			'priority' => 2,
			'type'     => 'text'
		) );
		// setting
		$wp_customize->add_setting( 'featured_title_description', array(
			'default' => $abacus_default_theme_options['featured_title_description'],
			'sanitize_callback' => 'abacus_sanitize_text',
		) );
		// control
		$wp_customize->add_control( 'featured_title_description', array(
			'label'    => __( 'Featured product description', 'abacus' ),
			'description'    => __( 'Only on shop grid template', 'abacus' ),
			'section'  => 'abc_layout',
			'priority' => 3,
			'type'     => 'text'
		) );
		// setting
		$wp_customize->add_setting( 'popular_title_description', array(
			'default' => $abacus_default_theme_options['popular_title_description'],
			'sanitize_callback' => 'abacus_sanitize_text',
		) );
		// control
		$wp_customize->add_control( 'popular_title_description', array(
			'label'    => __( 'Popular product description', 'abacus' ),
			'description'    => __( 'Only on shop grid template', 'abacus' ),
			'section'  => 'abc_layout',
			'priority' => 4,
			'type'     => 'text'
		) );

		## Reset section
		$wp_customize->add_section( 'abc_reset', array(
			'title' => __( 'Reset', 'abacus' ),
			'priority' => 999,
		) );
		// setting
		$wp_customize->add_setting( 'reset_theme_options', array(
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( new Abacus_Reset_Control(
			$wp_customize, 'reset_theme_options', array(
				'section' => 'abc_reset',
				'priority' => 1,
				'description' => __( 'Click on the button below to reset all theme options back to default.', 'abacus' ),
			)
		) );
	}

	public function customize_controls_enqueue_scripts() {
		wp_enqueue_script( 'abacus-customizer', ABACUS_THEME_URL . '/js/admin/customizer.js', array( 'jquery' ), '', true );
        wp_localize_script( 'abacus-customizer', 'Abacus_Customizer', array(
            'customizerURL' => admin_url( 'customize.php' ),
            'exportNonce' => wp_create_nonce( 'abc-customizer' ),
            'upgradeAd' => __( 'Unlock Premium Theme Options', 'abacus' ),
            'confirmText' => __( 'Are you sure?', 'abacus' ),
        ));

		// Don't display upgrade message if ABC Premium Features plugin is activated
		if ( ! function_exists( 'abc_premium_features' ) ) {
	   		wp_enqueue_script( 'abacus-upgrade', ABACUS_THEME_URL . '/js/admin/upgrade.js', array( 'jquery' ), '', true );
   		}

		wp_enqueue_style( 'abacus-customizer-styles', ABACUS_THEME_URL . '/css/admin/customizer.css' );
	}
}
$abacus_customizer = new Abacus_Customizer;

function abacus_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function abacus_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}