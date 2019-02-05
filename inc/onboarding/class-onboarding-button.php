<?php
/**
 * The file that describes the onboarding button
 *
 * @package agncy
 */

/**
 * The class that describes the onboarding button
 */
class AgncyOnboardingButton {

	/**
	 * The link target of the button
	 *
	 * @var string
	 */
	private $target = '';

	/**
	 * The button label
	 *
	 * @var string
	 */
	private $label = '';

	/**
	 * The callback that determines visibility of this button
	 *
	 * @var string|array
	 */
	private $visibility_callback = null;

	/**
	 * The array that holds strings of classes for this button
	 *
	 * @var array
	 */
	private $classes = array();

	/**
	 * The button constructor
	 *
	 * @param array $args The button arguments.
	 */
	public function __construct( $args ) {
			$args = wp_parse_args(
				$args,
				array(
					'label'               => '',
					'target'              => '',
					'visibility_callback' => null,
					'classes'             => array(),
				)
			);

			$this->set_label( $args['label'] );
			$this->set_target( $args['target'] );
			$this->set_visibility_callback( $args['visibility_callback'] );
			$this->set_classes( $args['classes'] );
	}

	/**
	 * Set the link target of the button
	 *
	 * @param string $target The link target url.
	 */
	public function set_target( $target ) {
		$this->target = esc_url( $target );
	}

	/**
	 * Set the button label
	 *
	 * @param string $label The button label.
	 */
	public function set_label( $label ) {
		$this->label = esc_attr( $label );
	}

	/**
	 * Set the visibility callback
	 *
	 * @param string|array $visibility_callback The callback function.
	 */
	public function set_visibility_callback( $visibility_callback ) {
		if ( is_callable( $visibility_callback, true ) ) {
			$this->visibility_callback = $visibility_callback;
		} else {
			$this->visibility_callback = null;
		}
	}

	/**
	 * Set the button classes
	 *
	 * @param array $classes The desired button classes.
	 */
	public function set_classes( $classes ) {
		$this->classes = (array) $classes;

		$this->classes[] = 'btn';
	}

	/**
	 * Render the button markup
	 *
	 * @return string The button markup
	 */
	public function render() {

		if ( null != $this->visibility_callback && ! call_user_func( $this->visibility_callback ) ) {
			return null;
		}

		$classes_string = implode( ' ', $this->classes );

		$html = '<a class="' . $classes_string . '" href="' . $this->target . '">' . $this->label . '</a>';

		return $html;
	}

}
