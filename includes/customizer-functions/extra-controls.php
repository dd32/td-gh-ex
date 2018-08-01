<?php

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/**
 * Customizer section that shows what is new in each version.
 *
 * @since 1.0.0
 */
class Atlast_Agency_Customize_Section_Getting_Started extends WP_Customize_Section {

	public $type = 'getting_started';
	public $button_txt = '';
	public $button_url = '';
	public function json() {

		$json = parent::json();
		$json['button_txt'] = $this->button_txt;
		$json['button_url'] = $this->button_url;
		return $json;
	}
	protected function render_template() {
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				<div class="getting-started-section">
					<a id="getting-started-btn" href="{{data.button_url}}" class="button doc-btn">
						{{data.button_txt}}
					</a>
				</div>
			</h3>
		</li>

		<?php
	}
}
