<?php

require_once(dirname(__FILE__).'/type.php');

/**
 * A toggle type.
 *
 * @copyright Copyright (c) 2011, Greg Priday
 */
class Origin_Type_Slider extends Origin_Type{
	function __construct($section, $name, $settings){
		if(empty($settings['segments'])){
			$settings['segments'] = $settings['max'] - $settings['min'];
		}
		parent::__construct($section, $name, $settings);
	}
	
	/**
	 * Enqueue any JS and CSS that we require
	 * @return void
	 */
	static function enqueue(){
		wp_enqueue_script('origin.slider.color', ORIGIN_BASE_URL.'/js/types/slider.js', array('jquery'));
	}

	/**
	 * Render the form for the slider
	 * @param null|string $id
	 * @return void
	 */
	function render_form($id = null) {
		/**
		 * @var int $max
		 * @var int $min
		 */
		extract($this->settings);
		
		if(empty($segments)) $segments = round($max) - round($min);
		
		?>
		<input
			type="hidden"
			id="<?php print esc_attr($this->form_id) ?>"
			name="<?php print esc_attr($this->form_name) ?>"
			value="<?php print esc_attr($this->value()) ?>"
			
			data-segments="<?php print intval($segments) ?>"
			<?php if(!empty($units)) : ?>data-units="<?php print esc_attr($units) ?>"<?php endif ?>
			<?php if(!empty($unit_multiplier)) : ?>data-unit-multiplier="<?php print esc_attr($unit_multiplier) ?>"<?php endif ?>
			data-min="<?php print esc_attr($min) ?>"
			data-max="<?php print esc_attr($max) ?>"
			data-update-delay="<?php print esc_attr(isset($this->settings['update_delay']) ? $this->settings['update_delay'] : 500) ?>"
			class="preview-field"
			data-name="<?php print esc_attr($this->name) ?>" />
			
		<div id="<?php print esc_attr($this->form_id.'-slider') ?>" class="jquery-ui-slider" for="<?php print esc_attr($this->form_id) ?>"></div>
		<?php
	}
	
	function process_input($input){
		if(!empty($this->settings['is_int'])) $this->value = intval($input[$this->form_name]);
		else $this->value = floatval($_POST[$this->form_name]);
		
	}
	
	function validate_settings(){
		return true;
	}
}