<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Pro Customizer Section
 *
 * @since  1.3.6
 * @access public
 */
class Agama_Customize_Section_Pro extends WP_Customize_Section {
	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.3.6
	 * @access public
	 * @var    string
	 */
	public $type = 'agama-pro';
	/**
	 * Custom button text to output.
	 *
	 * @since  1.3.6
	 * @access public
	 * @var    string
	 */
	public $pro_text = 'Agama Pro';
	/**
	 * Custom pro button URL.
	 *
	 * @since  1.3.6
	 * @access public
	 * @var    string
	 */
	public $pro_url = 'https://theme-vision.com/agama-pro/';
	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.3.6
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.3.6
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}
