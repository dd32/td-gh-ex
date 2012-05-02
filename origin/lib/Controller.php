<?php

if(class_exists('Origin_Controller')) return;

/**
 * Origin controller class.
 *
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2011, SiteOrigin
 * @license GPL <siteorigin.com/gpl> 
 */
class Origin_Controller {
	/**
	 * Config loaded from the config file
	 */
	public $config;
	
	/**
	 * Request argument that'll trigger methods
	 */
	public $method_arg;
	
	/**
	 * @var Singleton instance
	 */
	public static $instances;
	
	/**
	 * @var Special methods
	 */
	protected $methods = array();
	
	function __construct($config = false, $method_arg = null, $reg_query_vars = true){
		if($config === true) $config = dirname(__FILE__).'/config.php';
		
		if(!empty($config)){
			$config_array = include($config);
			$this->config = (object) $config_array;
		}
		
		$this->method_arg = $method_arg;
		
		/*
		$methods = get_class_methods($this);
		foreach($methods as $method){
			switch(substr($method,0,6)) {
				case 'action' : add_action(substr($method,7), array($this, $method), 10, 2); break;
				case 'filter' : add_filter(substr($method,7), array($this, $method), 10, 2); break;
			}
		}
		*/
		
		add_action('template_redirect', array($this, 'method_handler'));
		if(!empty($this->method_arg) && $reg_query_vars){
			add_filter('query_vars', array($this, 'register_method_query_vars'));
		}
	}

	/**
	 * Get the singleton of this controller
	 * @param $class
	 * @return
	 */
	public static function single($class)
    {
		if(empty($class)) $class = __CLASS__;
		if(!isset(self::$instances)) self::$instances = array();
		
        if (!isset(self::$instances[$class])) {
			// Create and initialize the singleton
            self::$instances[$class] = new $class();
			self::$instances[$class]->init();
        }
		
        return self::$instances[$class];
    }
	
	/**
	 * Initialize the Method
	 */
	function method_handler(){
		if(empty($this->method_arg)) return;
		global $wp_query;
		
		// Get the method from either wp_query or the request array
		$method = $wp_query->get($this->method_arg);
		if(empty($method)) $method = @$_REQUEST[$this->method_arg];
		
		if(!empty($method)){
			$exit = false;
			if(!empty($this->methods[$method])){
				header("HTTP/1.0 200 OK", true);
				//$wp_query->is_home = false;
				$exit = call_user_func($this->methods[$method]);
			}
			
			$method_handler = 'method_'.$method;
			if(method_exists($this, $method_handler)){
				header("HTTP/1.0 200 OK", true);
				//$wp_query->is_home = false;
				$exit = $this->{$method_handler}();
			}
			elseif(!empty($this->methods[$method])){
				header("HTTP/1.0 200 OK", true);
				//$wp_query->is_home = false;
				$method_function = $this->methods[$method];
				if(is_string($method_function)) $exit = $this->{$this->methods[$method]}();
				else $exit = call_user_func($method_function);
			}
			
			if($exit === true){
				do_action('wp_shutdown');
				exit();
			}
		}
	}

	/**
	 * Adds a custom URL method handler
	 * @param $method
	 * @param $handler
	 */
	function register_method($method, $handler){
		$this->methods[$method] = $handler;
	}
	
	/**
	 * Register the method query args
	 * @param $vars
	 * @return array
	 */
	function register_method_query_vars($vars){
		$vars[] = $this->method_arg;
		return $vars;
	}
	
	public function get_config(){
		return $this->config;
	}
	
	function init(){
		
	}
}