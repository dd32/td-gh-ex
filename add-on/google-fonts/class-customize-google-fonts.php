<?php
/**
 * Select Dropdown Custom Control
 *
 * @package Aamla
 * @Since 1.0.1
 */

namespace aamla;

/**
 * Select control class.
 *
 * @since  1.0.1
 * @access public
 */
class Customize_Google_Fonts extends \WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    string
	 */
	public $type = 'font-selection';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 1.0.1
	 */
	public function enqueue() {
		wp_enqueue_style(
			'aamla_gf_customizer_control_style',
			get_template_directory_uri() . '/add-on/google-fonts/admin/customize-control.css',
			[],
			AAMLA_THEME_VERSION,
			'all'
		);
		wp_enqueue_script(
			'aamla_gf_customizer_control_js',
			get_template_directory_uri() . '/add-on/google-fonts/admin/customize-control.js',
			[ 'customize-controls', 'jquery' ],
			AAMLA_THEME_VERSION,
			true
		);
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 */
	public function to_json() {
		parent::to_json();
		$this->json['sans']  = Google_Fonts::get_instance()->get_google_sans_fonts();
		$this->json['serif'] = Google_Fonts::get_instance()->get_google_serif_fonts();
		foreach ( $this->settings as $key => $setting ) {
			$this->json[ $key ] = [
				'link'  => $this->get_link( $key ),
				'value' => $this->value( $key ),
			];
		}
		$this->json['weight']['choices']  = Google_Fonts::get_instance()->get_font_weights();
		$this->json['weight']['label']    = esc_html__( 'Font Weight', 'aamla' );
		$this->json['weight']['desc']     = esc_html__( 'Strike through font weights are not available with currently selected google font.', 'aamla' );
		$this->json['selectors']['label'] = esc_html__( 'Add css selectors', 'aamla' );
		$this->json['selectors']['desc']  = esc_html__( 'Comma separated list of css selectors. Do not wrap selectors with single quotes.', 'aamla' );
	}
	/**
	 * Underscore JS template to handle the control's output.
	 */
	public function content_template() {
		?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

			<p class="google-font-family">
				<select class="aamla-select" {{{ data.family.link }}}>

					<option value="none" <# if ( 'none' === data.family.value ) { #> selected="selected" <# } #>><?php esc_html_e( 'None', 'aamla' ); ?></option>

					<# if ( data.sans ) { #>
						<optgroup label="<?php echo esc_attr_x( 'Sans Serif Fonts', 'Font optgroup label attribute', 'aamla' ); ?>">
						<# _.each( data.sans, function( args, choice ) { #>
							<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ args.family }}</option>
						<# } ) #>
						</optgroup>
					<# } #>

					<# if ( data.serif ) { #>
						<optgroup label="<?php echo esc_attr_x( 'Serif Fonts', 'Font optgroup label attribute', 'aamla' ); ?>">
						<# _.each( data.serif, function( args, choice ) { #>
							<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ args.family }}</option>
						<# } ) #>
						</optgroup>
					<# } #>

				</select>

				<span class="advanced-button">
					<span class="screen-reader-text"><?php esc_html_e( 'Select Font Weights', 'aamla' ); ?></span>
				</span>
			</p>

			<div class="google-font-additional-settings">
				<div class="google-font-selectors">
					<# if ( data.selectors.label ) { #>
						<span class="customize-control-title">{{ data.selectors.label }}</span>
					<# } #>
					<# if ( data.selectors.desc ) { #>
						<span class="customize-control-description">{{ data.selectors.desc }}</span>
					<# } #>
					<input type="text" value="{{ data.selectors.value }}" placeholder="<?php echo esc_attr_x( 'example: .site-title, #main', 'Placeholder text for css selectors', 'aamla' ); ?>" {{{ data.selectors.link }}} />
				</div>
				<div class="google-font-weight">
					<# if ( data.weight.label ) { #>
						<span class="customize-control-title">{{ data.weight.label }}</span>
					<# } #>
					<# if ( data.weight.desc ) { #>
						<span class="customize-control-description">{{ data.weight.desc }}</span>
					<# } #>
					<ul>
					<# var newWeight = '', fontVal = data.family.value; #>
					<# if ( _.has( data.sans, fontVal ) ) { newWeight = data.sans[fontVal].variants; } #>
					<# if ( _.has( data.serif, fontVal ) ) { newWeight = data.serif[fontVal].variants } #>
					<# _.each( data.weight.choices, function( label, choice ) { #>
						<li>
							<label>
								<input type="checkbox" value="{{ choice }}" <# if ( _.contains( data.weight.value, choice ) ) { #> checked<# } #> />
								<# if ( _.contains( newWeight, choice ) ) { #>
									<span>{{ label }}</span>
								<# } else { #>
									<span class="strikethrough">{{ label }}</span>
								<# } #>
							</label>
						</li>
					<# } ) #>
					</ul>
				</div>
			</div>

	<?php
	}
}
