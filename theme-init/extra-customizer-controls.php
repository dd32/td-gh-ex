<?php

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/**
 * Customizer section that shows what is new in each version.
 *
 * @since 1.0.0
 */
class Atlast_Business_Customize_Section_Changelog extends WP_Customize_Section {

	public $type = 'changelog';
	public $changelog_text = '';
	public $changelog_url = '';
	public $changelog_btntext = '';
	public function json() {

		$json = parent::json();
		$json['changelog_text'] = $this->changelog_text;

		return $json;
	}
	protected function render_template() {
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
                <div class="customizer-changelog-section">
                    <p>
                        {{data.changelog_text}}
                    </p>
                </div>
			</h3>
		</li>

		<?php
	}
}
