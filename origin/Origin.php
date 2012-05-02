<?php

if(!class_exists('Origin_Controller')) require_once(dirname(__FILE__).'/lib/Controller.php');
if(!class_exists('Origin_Color')) require_once(dirname(__FILE__).'/lib/Color.php');
if(class_exists('Origin')) return;

/**
 * This is Origin
 *
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2011, Greg Priday
 * @license GPL <siteorigin.com/gpl>
 */
class Origin extends Origin_Controller{
	// $_REQUEST arg used as a method
	const METHOD_ARG = 'om';
	const ENDPOINT = "http://siteorigin.com";
	const ENDPOINT_CDN = "http://cdn.siteorigin.com";
	
	/**
	 * @var array An array of helper classes, found in the lib folder
	 */
	private $_helpers = array();
	
	public $style;

	/**
	 * Create an instance of the controller. This shouldn't be called directly, rather through the Origin::single() method.
	 * @throws Exception
	 */
	function __construct(){
		require_once(dirname(__FILE__).'/functions.php');
		
		// Do the initial checks
		if(!defined('THEME_NAME')) throw new Exception('Please define a theme name');
		if(!defined('THEME_VERSION')) throw new Exception('Please define a theme version');
		
		$this->design_mode = false;

		if(is_admin() && @$_REQUEST['page'] == 'origin'){
			add_action('admin_init', array($this, 'render_page'));
		}
		
		// Enqueue Google web fonts
		add_action('wp_print_styles', array($this, 'action_wp_print_styles'));
		
		// Add the admin actions
		add_action('admin_enqueue_scripts', array($this, 'action_admin_enqueue_scripts'));
		add_action('admin_menu', array($this, 'action_admin_menu'));
		
		add_action('wp_enqueue_scripts', array($this, 'action_wp_enqueue_scripts'));
		
		return parent::__construct(null, self::METHOD_ARG, false);
	}

    /**
     * Gets a helper class.
     *
     * @param $name
     * @return mixed
     */
	public function __get($name){
		if(!empty($this->_helpers[$name])){
			return $this->_helpers[$name];
		}

		if(file_exists(dirname(__FILE__).'/lib/'.ucfirst($name).'.php')){
			include(dirname(__FILE__).'/lib/'.ucfirst($name).'.php');
			$class_name = 'Origin_'.ucfirst($name);
			
			$this->_helpers[$name] = new $class_name;
			return $this->_helpers[$name];
		}
	}
	
	/**
	 * Initialize the Origin controller.
	 */
	function init(){
		// These are some definitions we need
		if(!defined('ORIGIN_BASE_URL')) define('ORIGIN_BASE_URL', get_template_directory_uri().'/origin');
	}
	
	/**
	 * Get the singleton of the controller
     *
     * @return Origin The main origin instance.
	 */
	public static function single() {
		return parent::single(__CLASS__);
    }
	
    /**
     * Used as a usort function to see which origin file should be loaded first.
     *
     * @param string $filename1 The first filename
     * @param string $filename2 The second filename
     * @return int
     */
	static function load_order_compare($filename1, $filename2){
		list($v1, $n1) = explode('-', basename($filename1));
		list($v2, $n2) = explode('-', basename($filename2));
		
		if(empty($n1) || empty($n2)) return strcasecmp($v1, $v2);
		else return version_compare($v1, $v2);
	}
	
	/**
	 * Render the theme admin page
	 */
	function render_page(){
		// Load the settings
		$this->settings->load_files();
		
		// Now, give all the settings fields a chance to enqueue stuff
		$this->types = array();
		foreach($this->settings->get_theme_settings() as $section){
			foreach($section['settings'] as $setting){
				$this->types[] = $setting['type'];
			}
		}
		$this->types = array_map('strtolower', array_unique($this->types));
		foreach($this->types as $type){
			$class = 'Origin_Type_'.ucfirst($type);
			if(!class_exists($class)) require_once(dirname(__FILE__).'/lib/types/'.$type.'.php');
		}
		
		// Empty $wp_scripts and $wp_styles
		global $wp_scripts, $wp_styles;
		$wp_scripts->queue = array();
		$wp_styles->queue = array();

		// Now we're going to be all self serving and queue the scripts and styles we need
		$this->action_admin_enqueue_scripts('appearance_page_origin');
		
		$evolve = false;
		if(!empty($_GET['evolve'])){
			$request = Origin::single()->services->exp_backoff(
				Origin::ENDPOINT . '/style/' . urlencode($_GET['evolve']) . '?style_method=style_json'
			);
			$evolve = json_decode($request['body'], true);
			
			foreach($evolve['settings'] as $section_id => $section){
				foreach($section as $field_id => $field){
					$o = $this->settings->get_object($section_id, $field_id);
					$o->set_value($field);
				}
			}
		}
		
		// Get CSS stuff
		$settings = $this->settings->get_theme_settings();
		$all_selectors = $this->css->get_selectors();
		$selectors = $this->css->get_setting_selectors();
		$css_js_function = $this->css->get_js_function();
		
		// Count the total number of settings
		
		// Add files to selectors
		$possibilities = 0; // 10^x
		foreach($settings as $section_id => $section){
			foreach($section['settings'] as $setting_id => $setting){
				if($setting['type'] == 'file' && isset($setting['image_id'])){
					@$selectors[$section_id][$setting_id][] = '#'.$setting['image_id'];
				}
			}
		}
		
		include(dirname(__FILE__).'/tpl/admin.phtml');
		
		do_action('wp_shutdown');
		exit();
	}
	
	function render_auth_page(){
		$url = wp_nonce_url('themes.php?page='.$_GET['page']);
		request_filesystem_credentials($url, '', false, false, array());
	}
	
	/**
	 * Render the page that shows the user some styles
	 */
	function render_styles_page(){
		if(function_exists('wp_get_theme')){
			$theme_data = wp_get_theme();
			$theme_name = $theme_data->get('Name');
		}
		else {
			$theme_data = get_theme_data(get_template_directory().'/style.css');
			$theme_name = $theme_data['Name'];
		}
		
		include(dirname(__FILE__).'/tpl/styles.phtml');
	}

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Storage Functions
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Get the origin storage folder
	 *
	 * @param string $sub The sub folder.
	 * @param bool $create Should we create the folder too?
     * @return string The full directory path
     */
	function get_storage_folder($sub = '', $create = false){
		$upload_dir = wp_upload_dir();
		$base_folder = $upload_dir['basedir'].'/origin';
		
		$folder = path_join($base_folder, $sub);
		if(!is_dir($folder) && $create) mkdir($folder, 0777, true);
		
		return $folder;
	}
	
	/**
	 * Get the URL of the storage.
	 *
	 * @param string $sub The sub folder.
     * @return string The full URL of the storage folder
     */
	function get_storage_url($sub = ''){
		$upload_dir = wp_upload_dir();
		return $upload_dir['baseurl'].'/origin'.(!empty($sub) ? '/'.$sub : '');
	}
	
	////////////////////////////////////////////////////////////////////////////
	// Action functions (add_action)
	////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Add any Google web fonts to the styles output
	 */
	function action_wp_print_styles(){
		$families = array();
		$families = apply_filters('google_font_families', $families);
		
		?><link id="google-web-fonts" href='http://fonts.googleapis.com/css?family=<?php print implode('|', $families) ?>' rel='stylesheet' type='text/css'><?php
	}
	
	/**
	 * Enqueue Origin admin stuff
	 *
	 * @param $hook_suffix
	 * @action admin_enqueue_scripts
	 */
	function action_admin_enqueue_scripts($hook_suffix){
		switch($hook_suffix){
			case 'appearance_page_origin' :
				wp_enqueue_script('jquery');
				wp_enqueue_script('jquery-ui-core');
				wp_enqueue_script('jquery-ui-draggable');
				wp_enqueue_script('jquery-ui-slider');
				
				wp_enqueue_style('jquery-ui', ORIGIN_BASE_URL.'/externals/jquery-ui/origin-theme/jquery-ui-1.8-origin.css');
		
				// Load Plupload
				wp_enqueue_script('plupload');
				wp_enqueue_script('plupload-handlers');
				wp_localize_script('plupload', 'pluploadSettings', array(
					'flash_swf_url' => includes_url('js/plupload/plupload.flash.swf'),
					'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),
					'style_url' => add_query_arg('om', 'style_upload', site_url()),
					'file_url' => add_query_arg('om', 'file_upload', site_url()),
				));
		
				// All the CSS
				wp_enqueue_style('origin.admin', ORIGIN_BASE_URL.'/css/designer.css');
				wp_enqueue_style('jquery.chosen', ORIGIN_BASE_URL.'/css/chosen.css');
				wp_enqueue_style('jquery.gritter', ORIGIN_BASE_URL.'/css/jquery.gritter.css');
				
				if(file_exists(get_template_directory().'/origin/js/designer.packed.js')){
					// Include the packaged, minified Javascript
					wp_enqueue_script('origin.designer', ORIGIN_BASE_URL . '/js/designer.packed.js', array('jquery'));
				}
				else {
					// General admin stuff
					wp_enqueue_script('cssParser', ORIGIN_BASE_URL.'/js/designer/cssParser.js', array('jquery'));
					wp_enqueue_script('slimScroll', ORIGIN_BASE_URL.'/js/designer/slimScroll.js', array('jquery'));
					wp_enqueue_script('smoothScroll', ORIGIN_BASE_URL.'/js/designer/jquery.smooth-scroll.js', array('jquery'));
					wp_enqueue_script('origin.highlight', ORIGIN_BASE_URL.'/js/designer/originHighlight.jquery.js', array('jquery'));
		
					// Chosen
					wp_enqueue_script('jquery.chosen', ORIGIN_BASE_URL.'/js/designer/chosen.jquery.js', array('jquery'));
					
					// Gritter (Growl Style Notifications)
					wp_enqueue_script('jquery.gritter', ORIGIN_BASE_URL.'/js/designer/jquery.gritter.js', array('jquery'));
			
					// The preview support javascript
					wp_enqueue_script('origin.color', ORIGIN_BASE_URL . '/js/designer/color.js', array('jquery'));
					wp_enqueue_script('origin.executor', ORIGIN_BASE_URL . '/js/designer/executor.js', array('jquery'));
			
					// Origin designer scripts
					wp_enqueue_script('origin.designer', ORIGIN_BASE_URL . '/js/designer/designer.js', array('jquery'));
					wp_enqueue_script('origin.history', ORIGIN_BASE_URL . '/js/designer/history.js', array('jquery'));
					wp_enqueue_script('origin.preview', ORIGIN_BASE_URL . '/js/designer/preview.js', array('jquery'));
					wp_enqueue_script('origin.share', ORIGIN_BASE_URL . '/js/designer/share.js', array('jquery'));
				}
		
				// Let types enqueue any special scripts
				foreach($this->types as $type){
					$class = 'Origin_Type_'.ucfirst($type);
					if(method_exists($class, 'enqueue')) call_user_func(array($class, 'enqueue'));
				}
				
				wp_localize_script('origin.designer', 'originSettings', array(
					'themeName' => THEME_NAME,
					'templateUrl' => get_template_directory_uri(),
					'siteUrl' => site_url(),
					'originUrl' => ORIGIN_BASE_URL,
					'uploadUrl' => $this->get_storage_url('uploads'),
					'shareUrl' => add_query_arg('style_method', 'style_submit', Origin::ENDPOINT.'/theme/'.THEME_NAME),
					'imageapiUrl' => Origin::ENDPOINT_CDN.'/imageapi/',
					'text' => array(
						'filenamePrompt' => __('Enter a brief, descriptive filename', 'origin'),
					)
				));
				break;
			
			case 'appearance_page_origin-styles' :
				wp_enqueue_style('origin-styles', ORIGIN_BASE_URL.'/css/styles.css');
				wp_enqueue_script('origin-styles', ORIGIN_BASE_URL.'/js/styles.js', array('jquery'));

				wp_localize_script('origin-styles', 'originStyles', array(
					'endpoint' => Origin::ENDPOINT.'/theme/'.THEME_NAME.'/styles/?format=callback',
					'previewBase' => site_url('/'),
				));
				break;
		}
	}
	
	/**
	 * Initialize the Origin design page.
	 * 
	 * @return void
	 */
	function action_admin_menu(){
		add_theme_page(__('Child Themes', 'origin'), __('Child Themes', 'origin'), 'edit_theme_options', 'origin-styles', array($this, 'render_styles_page'));
		add_theme_page(__('Child Designer', 'origin'), __('Child Designer', 'origin'), 'edit_theme_options', 'origin', array($this, 'render_page'));
	}
	
	////////////////////////////////////////////////////////////////////////////
	// Methods
	////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Handle the upload of a style file
	 * 
	 * @return bool
	 */
	function method_style_upload(){
		if(!current_user_can('edit_themes')) return false;
		
		$_POST = array_map('stripslashes', $_POST);
		$name = pathinfo($_POST['name']);

		$all_settings = (array) get_transient('origin_style_upload');
		
		if(!class_exists('ZipArchive')){
			$all_settings[$name['filename']] = new WP_Error('', __('You do not have ZipArchive installed.', 'origin'));
			set_transient('origin_style_upload', $all_settings);
			return true;
		}
		
		// Open the uploaded settings file
		$zip = new ZipArchive();
		$zip->open($_FILES['file']['tmp_name']);
		
		$comment = $zip->getArchiveComment();
		preg_match('/\[([\w-]+)\]/', $comment, $matches);
		$folder = $matches[1];
		$contents = $zip->getFromName($folder.'/style.json');
		
		// Decoding acts as security insulation
		$settings = json_decode($contents, true);
		
		if($settings['theme'] != THEME_NAME){
			$all_settings[$name['filename']] = new WP_Error(
				'',
				sprintf(__('The theme you uploaded is not a child of %s', 'origin'), THEME_NAME)
			);
		}
		elseif(!empty($settings) && !empty($settings['theme']) && !empty($name['filename'])){
			// Check that this is for the current theme
			if($settings['theme'] == THEME_NAME){
				// Cache the settings for when Origin fetches it again
				$all_settings[$name['filename']] = $settings;
			}
		}
		else{
			$all_settings[$name['filename']] = new WP_Error(
				'',
				__('The file you uploaded is not a valid child theme.', 'origin')
			);
		}
		
		set_transient('origin_style_upload', $all_settings);
		return true;
	}
	
	/**
	 * Handler for the style_upload_fetch method. This fetches data about a previously uploaded style.
     *
     * @return bool
     */
	function method_style_upload_fetch(){
		header('content-type:application/json', true);
		
		$name = pathinfo($_GET['name']);
		$all_settings = (array) get_transient('origin_style_upload');
		@ $settings = $all_settings[$name['filename']];
		
		if(empty($settings)){
			print json_encode(array(
				'message' => array(
					'title' => __('Error processing uploaded file', 'origin'),
					'text' => __('The file you uploaded is not a valid child theme.', 'origin'),
				),
				'success' => false
			));
			return true;
		}
		elseif(is_object($settings) && get_class($settings) == 'WP_Error'){
			/**
			 * @var WP_Error $settings
			 */
			print json_encode(array(
				'message' => array(
					'title' => __('Error Uploading Settings', 'origin'),
					'text' => $settings->get_error_message(),
				),
				'success' => false
			));
			
			// Remove the error from the transient
			unset($all_settings[$name['filename']]);
			if(empty($all_settings)) delete_transient('origin_style_upload');
			else set_transient('origin_style_upload', $all_settings, 600);
			
			return true;
		}
		else{
			// Load the stored settings
			$settings = $all_settings[$name['filename']];
			unset($all_settings[$name['filename']]);
			if(empty($all_settings)) delete_transient('origin_style_upload');
			else set_transient('origin_style_upload', $all_settings, 600);
		}

		print json_encode(array(
			'message' => array(
				'title' => __('Settings Uploaded', 'origin'),
				'text' => __('Your settings file was successfully processed.', 'origin'),
			),
			'style' => $settings,
			'success' => true
		));
		return true;
	}

	/**
	 * Sets Origin up to designer a style stored on 
	 * @return bool
	 */
	function method_preview_style(){
		include(ABSPATH.'/wp-admin/includes/plugin.php');
		if(!current_user_can('edit_themes') && !is_plugin_active('siteorigin_demo')) return false;
		$this->settings->load_files();
		
		// Don't use the theme, or child theme's CSS
		wp_deregister_style('origin');
		wp_register_style('origin', Origin::ENDPOINT_CDN.'/style/'.$_GET['theme_style'].'/css/', array(), THEME_VERSION);
		
		ob_start(array($this, 'preview_style_filter'));
	}
	
	// Filter all the links to include preview info
	function preview_style_filter($html){
		$dom = new DOMDocument('1.0', get_bloginfo('charset'));
		@$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
		
		foreach($xpath->query('//a') as $link){
			$url = $link->getAttribute('href');
			if(empty($url)) continue;
			
			if(strpos($url, site_url()) === 0){
				$url = add_query_arg(array(
					'om' => 'preview_style',
					'theme_style' => $_GET['theme_style'],
					'demo_bar' => !empty($_GET['demo_bar']) ? 'true' : null
				), $url);
				
				$link->setAttribute('href', $url);
				$link->setAttribute('rel', 'nofollow');
			}
		}
		
		return $dom->saveHTML();
	}
	
	
	/**
	 * @return bool Is this a mobile browser?
	 */
	static function is_mobile(){
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		return preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// 
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Enqueue scripts
	 * 
	 * @action wp_enqueue_scripts
	 */
	function action_wp_enqueue_scripts(){
		if(file_exists(get_stylesheet_directory().'/origin.css')){
			$src = get_stylesheet_directory_uri().'/origin.css';
		}
		elseif(file_exists(get_template_directory().'/origin.css')){
			$src = get_template_directory_uri().'/origin.css';
		}
		
		if(!empty($src)) {
			wp_enqueue_style('origin', $src, null, THEME_VERSION);
		}
	}
	
	/**
	 * @param string $name The name of the plugin
	 * @return void
	 */
	function load_plugin($name){
		require_once(dirname(__FILE__).'/plugins/'.$name.'/'.$name.'.php');
	}
}

// Initialize the singleton
Origin::single();