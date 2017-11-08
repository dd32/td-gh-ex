<?php
/**
 * Aileron Theme Customizer
 *
 * @package Aileron
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aileron_customize_register ( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	/**
	 * Theme Options Panel
	 */
	$wp_customize->add_panel( 'aileron_theme_options', array(
	    'title'     => esc_html__( 'Theme Options', 'aileron' ),
	    'priority'  => 1,
	) );

	/**
	 * General Options Section
	 */
	$wp_customize->add_section( 'aileron_general_options', array (
		'title'     => esc_html__( 'General Options', 'aileron' ),
		'panel'     => 'aileron_theme_options',
		'priority'  => 10,
		'description' => esc_html__( 'Personalize the settings of your theme.', 'aileron' ),
	) );

	// Theme Layout
	$wp_customize->add_setting ( 'aileron_theme_layout', array(
		'default'           => aileron_default( 'aileron_theme_layout' ),
		'sanitize_callback' => 'aileron_sanitize_select',
	) );

	$wp_customize->add_control ( 'aileron_theme_layout', array(
		'label'    => esc_html__( 'Theme Layout', 'aileron' ),
		'section'  => 'aileron_general_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => array(
			'wide' => esc_html__( 'Wide', 'aileron' ),
			'box'  => esc_html__( 'Box',  'aileron' ),
		),
	) );

	/**
	 * Footer Options Section
	 */
	$wp_customize->add_section( 'aileron_footer_options', array (
		'title'       => esc_html__( 'Footer Options', 'aileron' ),
		'panel'       => 'aileron_theme_options',
		'priority'    => 20,
		'description' => esc_html__( 'Personalize the footer settings of your theme.', 'aileron' ),
	) );

	// Copyright Control
	$wp_customize->add_setting ( 'aileron_copyright', array (
		'default'           => aileron_default( 'aileron_copyright' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control ( 'aileron_copyright', array (
		'label'    => esc_html__( 'Copyright', 'aileron' ),
		'section'  => 'aileron_footer_options',
		'priority' => 1,
		'type'     => 'textarea',
	) );

	// Credit Control
	$wp_customize->add_setting ( 'aileron_credit', array (
		'default'           => aileron_default( 'aileron_credit' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_credit', array (
		'label'    => esc_html__( 'Display Designer Credit', 'aileron' ),
		'section'  => 'aileron_footer_options',
		'priority' => 2,
		'type'     => 'checkbox',
	) );

	/**
	 * Theme Support Section
	 */
	$wp_customize->add_section( 'aileron_support_options', array(
		'title'       => esc_html__( 'Support Options', 'aileron' ),
		'description' => esc_html__( 'Thanks for your interest in Aileron.', 'aileron' ),
		'panel'       => 'aileron_theme_options',
		'priority'    => 30,
	) );

	// Theme Documentation
	$wp_customize->add_setting ( 'aileron_theme_documentation', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_Button_Control(
			$wp_customize,
			'aileron_theme_documentation',
			array(
				'label'         => esc_html__( 'Aileron Documentation', 'aileron' ),
				'section'       => 'aileron_support_options',
				'priority'      => 1,
				'type'          => 'aileron-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://themecot.com/aileron-theme-documentation/',
				'button_target' => '_blank',
			)
		)
	);

	// Theme Support
	$wp_customize->add_setting ( 'aileron_theme_support', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_Button_Control(
			$wp_customize,
			'aileron_theme_support',
			array(
				'label'         => esc_html__( 'Aileron Support', 'aileron' ),
				'section'       => 'aileron_support_options',
				'priority'      => 2,
				'type'          => 'aileron-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://themecot.com/contact/',
				'button_target' => '_blank',
			)
		)
	);

	/**
	 * Theme Review Section
	 */
	$wp_customize->add_section( 'aileron_review_options', array(
		'title'       => esc_html__( 'Enjoying the theme?', 'aileron' ),
		'description' => esc_html__( 'Why not leave us a review on WordPress.org? We\'d really appreciate it!', 'aileron' ),
		'panel'       => 'aileron_theme_options',
		'priority'    => 40,
	) );

	// Theme Review
	$wp_customize->add_setting ( 'aileron_theme_review', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_Button_Control(
			$wp_customize,
			'aileron_theme_review',
			array(
				'label'         => esc_html__( 'Review on WordPress.org', 'aileron' ),
				'section'       => 'aileron_review_options',
				'type'          => 'aileron-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://wordpress.org/support/theme/aileron/reviews',
				'button_target' => '_blank',
			)
		)
	);
}
add_action( 'customize_register', 'aileron_customize_register' );

/**
 * Button Control Class
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Aileron_Button_Control extends WP_Customize_Control {
		/**
		 * @access public
		 * @var string
		 */
		public $type = 'aileron-button';

		/**
		 * HTML tag to render button object.
		 *
		 * @var  string
		 */
		protected $button_tag = 'button';

		/**
		 * Class to render button object.
		 *
		 * @var  string
		 */
		protected $button_class = 'button button-primary';

		/**
		 * Link for <a> based button.
		 *
		 * @var  string
		 */
		protected $button_href = 'javascript:void(0)';

		/**
		 * Target for <a> based button.
		 *
		 * @var  string
		 */
		protected $button_target = '';

		/**
		 * Click event handler.
		 *
		 * @var  string
		 */
		protected $button_onclick = '';

		/**
		 * ID attribute for HTML tab.
		 *
		 * @var  string
		 */
		protected $button_tag_id = '';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
		?>
			<span class="center">
				<?php
				// Print open tag
				echo '<' . esc_html( $this->button_tag );

				// button class
				if ( ! empty( $this->button_class ) ) {
					echo ' class="' . esc_attr( $this->button_class ) . '"';
				}

				// button or href
				if ( 'button' == $this->button_tag ) {
					echo ' type="button"';
				} else {
					echo ' href="' . esc_url( $this->button_href ) . '"' . ( empty( $this->button_tag ) ? '' : ' target="' . esc_attr( $this->button_target ) . '"' );
				}

				// onClick Event
				if ( ! empty( $this->button_onclick ) ) {
					echo ' onclick="' . esc_js( $this->button_onclick ) . '"';
				}

				// ID
				if ( ! empty( $this->button_tag_id ) ) {
					echo ' id="' . esc_attr( $this->button_tag_id ) . '"';
				}

				echo '>';

				// Print text inside tag
				echo esc_html( $this->label );

				// Print close tag
				echo '</' . esc_html( $this->button_tag ) . '>';
				?>
			</span>
		<?php
		}
	}

}

/**
 * Sanitize Select.
 *
 * @param string $input Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function aileron_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize the checkbox.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function aileron_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aileron_customize_preview_js() {
	wp_enqueue_script( 'aileron_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140120', true );
}
add_action( 'customize_preview_init', 'aileron_customize_preview_js' );
