<?php

/**
 * Handles theme updates.
 * 
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2011, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Update {
	private $endpoint;

	/**
	 * 
	 */
	function activate(){
		add_filter('pre_set_site_transient_update_themes', array($this, 'update_theme'));
		add_action('init', array($this, 'initialize'));
	}
	
	/**
	 * Removes update_themes site transient to force rebuild
	 */
	function force_update_check(){
		set_site_transient('update_themes', null);
	}
	
	/**
	 * 
	 */
	function initialize(){
		// TODO check this
		$current = get_site_transient('update_themes');
		if (is_admin()) $current = get_transient('update_themes');
	}

	/**
	 * Check for theme updates.
	 * @param array $checked_data
	 * @return array
	 */
	function update_theme($checked_data){
		global $wp_version;
		if (empty($checked_data->checked)) return $checked_data;
		
		if(empty($theme_name)) {
			return $checked_data;
		}
		
		$send_for_check = array(
			'method' => 'POST',
			'timeout' => 60,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'body' => array(
				'theme_method' => 'update',
				'current' => $checked_data->checked[THEME_NAME],
				'site' => site_url()
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . site_url()
		);
		
		$raw_response = wp_remote_post(
			Origin::ENDPOINT . '/theme/' . THEME_NAME,
			$send_for_check
		);
		
		if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200)){
			$response = unserialize($raw_response['body']);
			$checked_data->response[THEME_NAME] = $response;
		}
		
		return $checked_data;
	}
}