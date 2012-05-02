<?php

class Origin_Firstrun extends Origin_Controller {
	function __construct(){
		add_action('admin_menu', array($this, 'action_admin_menu'));
		add_action('after_switch_theme', array($this, 'action_after_switch_theme'));
	}
	
	/**
	 * @return Origin Firstrun
	 */
	static function single(){
		return parent::single(__CLASS__);
	}
	
	/**
	 * @return null
	 */
	function action_admin_menu(){
		if(!is_admin()) return;
		
		global $pagenow;
		
		if($pagenow == 'themes.php' && @ $_GET['page'] == 'firstrun'){
			// Add the theme page so we can display it, but remove it from the menu
			add_theme_page(
				__('Thanks For Installing','origin'),
				null,
				'switch_themes',
				'firstrun',
				array('Origin_Firstrun', 'render')
			);
		}
	}
	
	/**
	 * @action after_switch_theme
	 * @return void
	 */
	function action_after_switch_theme(){
		global $pagenow;
		if($pagenow == 'themes.php' && @ $_GET['page'] == 'firstrun') return;
		
		header('location:'.add_query_arg('page','firstrun',admin_url('themes.php')));
		exit();
	}
	
	/**
	 * Render the page
	 * @return void
	 */
	function render(){
		$iframe = 'http://siteorigin.com/experiment/firstrun/?somv_theme='.ucfirst(THEME_NAME);
		include(dirname(__FILE__).'/page.phtml');
	}
}

Origin_Firstrun::single();