<?php

require_once(dirname(__FILE__).'/type.php');

/**
 * A color type.
 *
 * @copyright Copyright (c) 2011, Greg Priday
 */
class Origin_Type_Color extends Origin_Type{
	
	/**
	 * Enqueue any JS and CSS that we require
	 * @return void
	 */
	static function enqueue(){
		// The color picker
		wp_enqueue_script('colorpicker.jquery', ORIGIN_BASE_URL.'/externals/colorpicker/js/colorpicker.js', array('jquery'));
		wp_enqueue_style('colorpicker.jquery', ORIGIN_BASE_URL.'/externals/colorpicker/css/colorpicker.css');
		
		wp_enqueue_script('origin.type.color', ORIGIN_BASE_URL.'/js/types/color.js', array('jquery'));
	}

	/**
	 * Render the color input
	 * @param null|string $id
	 * @return void
	 */
	function render_form($id = null) {
		?>
		<div class="container">
			<div class="current" style="background-color:<?php print esc_attr($this->value()) ?>">
				<div class="icon"></div>
			</div>
		</div>
		<input
			type="text"
			class="preview-field"
			data-preview="test"
			data-name="<?php print esc_attr($this->name) ?>"
			name="<?php print esc_attr($this->form_name) ?>"
			id="<?php print esc_attr($this->form_id) ?>"
			data-update-delay="<?php print esc_attr(isset($this->settings['update_delay']) ? $this->settings['update_delay'] : 500) ?>"
			value="<?php print esc_attr($this->value()) ?>" />
		<?php
	}

	/**
	 * Process the color input
	 * @param array $input
	 * @return void
	 */
	function process_input($input){
		if(!empty($input[$this->form_name])){
			try{
				// Error check the color
				$color = new Origin_Color($input[$this->form_name]);
				$this->value = $color->hex;
			}
			catch(Exception $e){
				$this->error = __('Invalid color.', 'origin');
				
				// If there isn't a value, then reset to default
				if(empty($this->value)) $this->value = $this->settings['default'];
			}
		}
	}
	
	function validate_settings(){
		return true;
	}
}