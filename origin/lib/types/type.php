<?php

/**
 * An Origin field type
 */
abstract class Origin_Type{
	/**
	 * @var string The section this field came from
	 */
	protected $section;
	
	/**
	 * @var string The name of this field
	 */
	protected $name;
	
	/**
	 * @var string The name of this type as it should appear in a form.
	 */
	protected $form_name;
	
	/**
	 * @var string The ID of this type as it should appear in a form.
	 */
	protected $form_id;
	
	/**
	 * @var mixed The current value
	 */
	protected $value;
	
	/**
	 * @var string An error message
	 */
	public $error;
	
	/**
	 * @var array The settings for this type
	 */
	public $settings;
	
	function __construct($section, $name, $settings){
		$this->section = $section;
		$this->name = $name;
		$this->form_name = 'settings['.$section.']['.$name.']';
		$this->form_id = 'field-'.$section.'-'.$name;
		
		// Set the default value for now
		if(isset($settings['default'])) $this->value = $settings['default'];
		
		$this->settings = $settings;
		$this->validate_settings();
	}

	/**
	 * Gets a setting if it's available, or returns a default.
	 * @param $name
	 * @param mixed $default
	 * @return bool
	 */
	function get_setting($name, $default = false){
		return isset($this->settings[$name]) ? $this->settings[$name] : $default;
	}
	
	function value(){
		return isset($this->value) ? $this->value : @$this->settings['default'];
	}
	
	function set_value($value){
		$this->value = $value;
	}
	
	function has_separator(){
		return !empty($this->settings['separator']);
	}
	
	/**
	 * Validate the settings
	 */
	abstract function validate_settings();

	/**
	 * Renders the form element for this type.
	 * @param string $id The element ID
	 */
	abstract function render_form($id = null);
	
	/**
	 * Process the input.
	 *
	 * @param array $input Input from either a form or file.
	 */
	abstract function process_input($input);
}