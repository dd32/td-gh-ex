<?php

require_once(dirname(__FILE__).'/type.php');

/**
 * A toggle type.
 *
 * @copyright Copyright (c) 2011, Greg Priday
 */
class Origin_Type_Toggle extends Origin_Type{
	function __construct($section, $name, $settings){
		parent::__construct($section, $name, $settings);
		
		// Defaults
		$this->settings = array_merge(array(
			'on_text' => __('On', 'origin'),
		), $this->settings);
	}
	
	static function enqueue(){
			wp_enqueue_script('origin.toggle', ORIGIN_BASE_URL . '/js/types/toggle.js', array('jquery'));
		}

	function render_form($id = null) {
		?>
		<input type="checkbox" name="<?php print esc_attr($this->form_name) ?>" id="<?php print esc_attr($this->form_id) ?>" value="checked" <?php checked($this->value(), 1) ?> class="preview-field"  data-name="<?php print esc_attr($this->name) ?>" />
		<label for="<?php print esc_attr($this->form_id) ?>"><?php print $this->settings['on_text'] ?></label>
		<?php
	}
	
	function process_input($input){
		// WordPress doesn't seem to like storing booleans, so we use integers.
		$this->value = !empty($input[$this->form_name]) ? 1 : 0;
	}
	
	function validate_settings(){
		return true;
	}
}