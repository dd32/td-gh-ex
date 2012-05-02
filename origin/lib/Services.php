<?php

/**
 * A utility class for dealing with web services.
 * 
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2012, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Services {
	/**
	 * Gets a URL using exponential backoff
	 * @static
	 * @param $url
	 * @param array $args
	 * @param string $type
	 * @param int $attempts How many attempts to make
	 * @param int $base The base of the exponential backoff
	 * 
	 * @return array The more-than-likely successful request.
	 * @throws Exception
	 */
	static function exp_backoff($url, $args = array(), $type = 'get', $attempts = 5, $base = 2){
		$attempts = 0;
		$request = null;
		do {
			if($attempts == 5) {
				throw new Origin_Services_Exception(
					sprintf(__('Error fetching %s', 'origin'), $url),
					null,
					$request,
					null
				);
			}
			if($attempts > 0) {
				// Do exponential backoff with 2^n
				sleep(round(pow(2, $attempts)));
			}
			switch($type){
				case 'get':
				case 'GET':
					$request = wp_remote_get($url, $args);
					break;
				case 'post':
				case 'POST':
					$request = wp_remote_post($url, $args);
					break;
			}
			
			$attempts++;
		} while(is_wp_error($request) || $request['response']['code'] != 200);
		
		return $request;
	}
}

class Origin_Services_Exception extends Exception {
	private $request;
	
	function __construct($message = null, $code = null, $request = null, $previous = null){
		parent::__construct($message, $code, $previous);
		$this->request = $request;
	}
	
	/**
	 * The request of the last attempt
	 * @return array
	 */
	function get_request(){
		return $this->request;
	}
}