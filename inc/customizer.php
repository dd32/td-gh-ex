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
		'priority'  => 1,
		'description' => esc_html__( 'Personalize the settings of your theme.', 'aileron' ),
	) );

	// Theme Layout
	$wp_customize->add_setting ( 'aileron_theme_layout', array(
		'default'           => 'box',
		'sanitize_callback' => 'aileron_sanitize_theme_layout',
	) );

	$wp_customize->add_control ( 'aileron_theme_layout', array(
		'label'    => esc_html__( 'Theme Layout', 'aileron' ),
		'section'  => 'aileron_general_options',
		'priority' => 2,
		'type'     => 'select',
		'choices'  => array(
			'wide' => esc_html__( 'Wide', 'aileron' ),
			'box'  => esc_html__( 'Box', 'aileron' ),
		),
	) );

	/**
	 * Theme Support Section
	 */
	$wp_customize->add_section( 'aileron_support', array(
		'title'       => esc_html__( 'Support Options', 'aileron' ),
		'description' => esc_html__( 'Thanks for your interest in Aileron.', 'aileron' ),
		'panel'       => 'aileron_theme_options',
		'priority'    => 2,
	) );

	// Documentation
	$wp_customize->add_setting ( 'aileron_theme_doc', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_WP_Customize_Button_Control(
			$wp_customize,
			'aileron_theme_doc',
			array(
				'label'         => esc_html__( 'Aileron Documentation', 'aileron' ),
				'section'       => 'aileron_support',
				'priority'      => 2,
				'type'          => 'button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'http://themecot.com/aileron-theme-documentation/',
				'button_target' => '_blank',
			)
		)
	);

	// Support
	$wp_customize->add_setting ( 'aileron_theme_support', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_WP_Customize_Button_Control(
			$wp_customize,
			'aileron_theme_support',
			array(
				'label'         => esc_html__( 'General Support', 'aileron' ),
				'section'       => 'aileron_support',
				'priority'      => 3,
				'type'          => 'button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'http://themecot.com/contact/',
				'button_target' => '_blank',
			)
		)
	);

}
add_action( 'customize_register', 'aileron_customize_register' );

/**
 * Sanitize the Theme layout value.
 *
 * @param string $theme_layout - Layout type.
 * @return string Filtered theme layout type (wide|box).
 */
function aileron_sanitize_theme_layout( $theme_layout ) {
	if ( ! in_array( $theme_layout, array( 'wide', 'box' ) ) ) {
		$theme_layout = 'box';
	}

	return $theme_layout;
}

/**
 * Button Control Class
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Aileron_WP_Customize_Button_Control extends WP_Customize_Control {
		/**
		 * @access public
		 * @var string
		 */
		public $type = 'button';

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
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aileron_customize_preview_js() {
	wp_enqueue_script( 'aileron_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140120', true );
}
add_action( 'customize_preview_init', 'aileron_customize_preview_js' );
