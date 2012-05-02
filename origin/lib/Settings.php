<?php

/**
 * Handles Origin values and settings.
 * 
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2011, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Settings {
	
	private $_objects;
	
	private $_settings;
	
	private $_values;
	
	public $separators;
	
	private $_loaded;
	
	function __construct(){
		// Load the current design values
		$this->_values = array();
		$this->_separators = array();
	}
	
	function __destruct(){
		
	}

	/**
	 * Load all the design files.
	 */
	function load_files(){
		// Load Design files from the parent and child templates
		$files = glob(get_template_directory().'/conf/settings/*.php');
		
		// Sort the files by the number that appears before the dash
		usort($files,
			create_function(
				'$a, $b',
				'list($na, $da) = explode("-", basename($a), 2); list($nb, $db) = explode("-", basename($b), 2); return version_compare($na, $nb);'
			)
		);
		
		foreach($files as $file) include($file);
		$this->load_defaults();
		
		$this->_loaded = true;
	}

	/**
	 * Get a value
	 *
	 * @param string $section The section name.
	 * @param string $name The setting name.
	 * @return mixed
	 */
	function get_value($section, $name){
		$value = & $this->_values[$section][$name];
		return $value;
	}
	
	/**
	 * @return array A copy of the values array.
	 */
	function get_values(){
		return $this->_values;
	}
	
	/**
	 * Set the current values.
	 * 
	 * @param $values
	 */
	function set_values($values){
		$this->_values = $values;
	}
	
	/**
	 * Get a theme's settings.
	 * 
	 * This is not related to the depreciated get_settings WordPress function.
	 * 
	 * @return array A copy of the settings array.
	 */
	function get_theme_settings(){
		if(empty($this->_loaded)){
			$this->load_files();
		}
		if(empty($this->_settings)) return array();
		return $this->_settings;
	}
	
	/**
	 * Gets an object for a setting
	 * 
	 * @param string $section Section name.
	 * @param string $setting Setting name.
	 * 
	 * @return Origin_Type The class setting.
	 */
	function get_object($section, $setting){
		if(empty($this->_objects[$section][$setting])){
			// Instantiate the settings class
			$type = $this->_settings[$section]['settings'][$setting]['type'];
			$class = 'Origin_Type_'.ucfirst(strtolower($type));
			if(!class_exists($class)) require_once(dirname(__FILE__).'/types/'.$type.'.php');
			
			$this->_objects[$section][$setting] = new $class($section, $setting, $this->_settings[$section]['settings'][$setting]);
			
			// Initialize the object
			if(isset($this->_values[$section][$setting]))
				$this->_objects[$section][$setting]->set_value($this->_values[$section][$setting]);
		}
		
		return $this->_objects[$section][$setting];
	}
	
	/**
	 * Set a value.
	 *
	 * @param string $section The section name.
	 * @param string $name The setting name.
	 * @param mixed $value The new value.
	 */
	function set($section, $name, $value){
		$this->_values[$section][$name] = $value;
	}

	/**
	 * Load default values for any empty values
	 */
	function load_defaults(){
		if(empty($this->_settings)) return;
		foreach($this->_settings as $section_id => $section){
			foreach($section['settings'] as $field_id => $field){
				if(!isset($this->_values[$section_id][$field_id]) && isset($field['default']))
					$this->_values[$section_id][$field_id] = $field['default'];
			}
		}
	}
	
	////////////////////////////////////////////////////////////////////////////
	// Registration Functions
	////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Adds a setting section.
	 *
	 * @param string $id A unique ID for this section
	 * @param array $arg The section settings
	 */
	function register_section($id, $arg){
		if(!empty($this->_settings[$id])) trigger_error('Trying to reregister section '.$id);
		
		$arg = array_merge(array(
			'name' => __('Untitled', 'origin'),
			'settings' => array()
		), $arg);
		
		$this->_settings[$id] = $arg;
	}

	/**
	 * Register a new setting.
	 *
	 * @param string $section The section ID.
	 * @param string $id The ID of this value. Unique within the section.
	 * @param $arg
	 * 
	 * @throws Exception
	 */
	function register_setting($section, $id, $arg){
		$arg = array_merge(array(
			'label' => __('Untitled', 'origin'),
		), $arg);
		
		if (empty($arg['type'])) throw new Exception('New settings must have a valid type.');
		if (empty($this->_settings[$section])) throw new Exception('Register a section before adding settings to it.');
		
		$this->_settings[$section]['settings'][$id] = $arg;
	}
	
	/**
	 * @param $section
	 */
	function register_separator($section){
		if(empty($this->_separators[$section])) $this->_separators[$section] = array();
		$this->_separators[$section][] = count($this->_settings[$section]);
	}
	
	////////////////////////////////////////////////////////////////////////////
	// Support Functions
	////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Get the score for this design from the Origin server.
	 * @return bool
	 * @todo finish and test this.
	 */
	function get_score(){
		$design = $this->get_sense_values();
		$user = wp_get_current_user();
		
		$wp_version = get_bloginfo('version');
		$args = array(
			'method' => 'POST',
			'timeout' => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'body' => array(
				'style_method' => 'score', 
				'design' => serialize($design),
				
				// Obfuscated user data. Kept private on our servers. Only used to maintain QOS.
				// We love you too much to spam ya!
				'api-key' => md5(get_site_url()),
				'user' => md5($user->user_email),
				'user-name' => $user->display_name,
				'url' => get_site_url(),
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_site_url()
		);
		
		$raw_response = wp_remote_post(Origin::ENDPOINT.'/'.THEME_NAME, $args);
		
		if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
			$response = unserialize($raw_response['body']);
		
		$this->score = !empty($response['score']) ? floatval($response['score']) : false;
		return $this->score;
	}
}

class Origin_Settings_Exception extends Exception{
	
}

/**
 * Register a settings section
 * 
 * @see Origin_Settings::register_section
 * @param string $id The ID of the section
 * @param array $arg Section args
 */
function origin_register_section($id, $arg){
	Origin::single()->settings->register_section($id, $arg);
}

/**
 * @see Origin_Settings::register_setting
 * @param string $section The ID of the section
 * @param string $id The ID of the settings
 * @param array $arg Setting args
 */
function origin_register_setting($section, $id, $arg){
	Origin::single()->settings->register_setting($section, $id, $arg);
}