<?php


/**
 * Handles options pages
 * 
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2012, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Options{
	const SLUG = 'origin-options';
	
	/**
	 * @var array The current options
	 */
	public $options;

	function __construct(){
		$this->options = array();
		
		add_action('admin_menu', array($this, 'add_theme_page'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

		add_action('load-appearance_page_'.self::SLUG, array($this, 'add_help_tab'));
	}
	
	/**
	 * Add an options page. Which is really a tab...
	 * 
	 * @param $page_name
	 * @param $options
	 * @throws Exception
	 */
	function add_page($page_name, $options){
		if(preg_match('/[^a-z0-9_\-]/', $page_name))
			throw new Exception('Invalid page name ['.$page_name.']. Please use lowercase and underscore only.');
		
		$this->options[$page_name] = array_merge(array(
			'title' => 'Untitled',
		), $options);
	}
	
	/**
	 * Enqueue all the admin scripts
	 * 
	 * @param $hook_suffix
	 * @return mixed
	 */
	function enqueue_scripts($hook_suffix){
		if($hook_suffix != 'appearance_page_origin-options') return;
		
		if(file_exists(get_template_directory().'/origin/js/options.packed.js')){
			wp_enqueue_script('origin-options', get_template_directory_uri() . '/origin/js/options-packed.js', array('jquery'));
		}
		else{
			wp_enqueue_script('origin-options', get_template_directory_uri() . '/origin/js/options/options.js', array('jquery'));
			wp_enqueue_script('origin-options-media', get_template_directory_uri() . '/origin/js/options/media.js', array('jquery'));
		}
		
		wp_enqueue_style('origin-options', get_template_directory_uri() . '/origin/css/options.css');
		
		wp_enqueue_script('jquery-ui-sortable');
		
		// A lot of the options use chosen
		wp_enqueue_script('chosen', get_template_directory_uri() . '/origin/js/designer/chosen.jquery.js', array('jquery'));
		wp_enqueue_style('chosen', get_template_directory_uri() . '/origin/css/chosen.css');
	}
	
	function add_theme_page(){
		if(!current_user_can('edit_theme_options')) return;
		
		$_POST = array_map('stripslashes_deep', $_POST);
		
		if(@$_GET['page'] == self::SLUG && wp_verify_nonce(@$_POST['_options_nonce'], 'save')){
			$this->values = get_option(THEME_NAME.'_origin_theme_options');
			try{
				foreach($this->options as $page_name => $page){
					foreach($page['sections'] as $section_name => $section) {
						foreach($section['fields'] as $field_name => $field) {
							if($section_name == 'default'){
								$value = @ $this->values[$page_name][$field_name];
							}
							else $value = @ $this->values[$page_name][$section_name][$field_name];
							
							if($field['type'] == 'media'){
								$p = $value;
								
								if(!empty($_POST['options'][$page_name][$section_name][$field_name]['delete']) && !empty($value)){
									$post = get_post($value);
									if(!empty($post) && $post->post_type == 'attachment' && empty($post->post_parent)){
										wp_delete_attachment($post->ID);
									}
									$_POST['options'][$page_name][$section_name][$field_name] = $p = null;
								}

								$file_field = 'options_'.$page_name.'_'.$section_name . '_' . $field_name.'_upload';
								if(!empty($_FILES[$file_field]['tmp_name'])){
									$attachment_id = media_handle_upload(
										$file_field,
										null,
										array('post_title' => $field['title'])
									);
									
									if(!is_wp_error($attachment_id)){
										// Delete the old attachment, possibly
										if(!empty($value) ){
											$post = get_post($value);
											if(!empty($post) && $post->post_type == 'attachment' && empty($post->post_parent)){
												wp_delete_attachment($post->ID);
											}
										}

										$_POST['options'][$page_name][$section_name][$field_name] = $p = $attachment_id;
									}
									else{
										throw new Origin_Options_Field_Exception($section_name, $field_name, 'Upload problem: '.$attachment_id->get_error_message());
									}
								}
							}
							else if(method_exists('Origin_Options_Field_Validator', $field['type'])) {
								try {
									$p = call_user_func(
										array('Origin_Options_Field_Validator', $field['type']),
										@ $_POST['options'][$page_name][$section_name][$field_name],
										$field
									);
								}
								catch(Exception $e) {
									throw new Origin_Options_Field_Exception($section_name, $field_name, $e->getMessage());
								}
							}
							else{
								$p = $_POST['options'][$page_name][$section_name][$field_name];
							}
							
							// Store the value
							if($section_name == 'default') $values[$page_name][$field_name] = $p;
							else $values[$page_name][$section_name][$field_name] = $p;
						}
					}
				}
				
				// We've made it this far, save the results to the database
				$this->updated = true;
				update_option(THEME_NAME.'_origin_theme_options', $values);
				wp_cache_delete('options', 'origin');
			}
			catch(Origin_Options_Field_Exception $error){
				$this->error = $error;
			}
		}

		add_theme_page(
			__('Theme Options', 'origin'),
			__('Theme Options', 'origin'),
			'edit_theme_options',
			self::SLUG,
			array($this, 'render')
		);
	}
	
	function add_help_tab(){
		ob_start();
		include(dirname(__FILE__).'/../tpl/help/options-help.phtml');
		$content = wpautop(ob_get_clean());

		ob_start();
		include(dirname(__FILE__).'/../tpl/help/options-sidebar.phtml');
		$sidebar = wpautop(ob_get_clean());

		$screen = get_current_screen();
		$screen->add_help_tab(array(
			'id' => 'theme-settings-help',
			'title' => __('Theme Options', 'origin'),
			'content' => $content,
		));
		$screen->set_help_sidebar($sidebar);
	}
	
	/**
	 * Render the form
	 */
	function render(){
		
		$values = get_option(THEME_NAME.'_origin_theme_options');
		require_once(dirname(__FILE__).'/../tpl/options.phtml');
	}

	/**
	 * Get a page's values
	 * 
	 * @param string $get_page_name
	 * @return mixed
	 */
	function get_values($get_page_name){
		$options = wp_cache_get('options','origin');
		if(empty($options)){
			$options = get_option(THEME_NAME.'_origin_theme_options');
			
			if(empty($options)){
				$options = array();
				
				foreach((array) @ $this->options as $page_name => $page){
					foreach((array) @ $page['sections'] as $section_name => $section){
						if($section_name == 'default') @ $options[$page_name] = array();
						else @ $options[$page_name][$section_name] = array();
							
						foreach((array) @ $section['fields'] as $field_name => $field){
							if(isset($field['default'])){
								$value = $field['default'];
								if($section_name == 'default') {
									@ $options[$page_name][$field_name] = $value;
								}
								else {
									@ $options[$page_name][$section_name][$field_name] = $value;
								}
							}
						}
					}
				}
			}
			wp_cache_add('options', $options, 'origin');
		}
		
		return @$options[$get_page_name];
	}
	
	function handle_upload($field){
		
	}
	
	/**
	 * Get the value of an option
	 * 
	 * @param $page
	 * @param $section
	 * @param null $field
	 * @return mixed
	 */
	function get($page, $section, $field = null){
		$values = $this->get_values($page);
		if(empty($field)){
			if(!isset($values[$section])) return $this->get_default($page, $section, $field);
			return @ $values[$section];
		}
		else{
			if(!isset($page[$section])) return $this->get_default($page, $section, $field);
			return @ $values[$section][$field];
		}
	}
	
	/**
	 * Get the default value of an option.
	 * 
	 * @param $page
	 * @param $section
	 * @param null $field
	 * 
	 * @return mixed
	 */
	function get_default($page, $section, $field = null){
		if(empty($field)) {
			$field = $section;
			$section = 'default';
		}
		
		if(isset($this->options[$page]['sections'][$section]['fields'][$field]['default'])){
			return $this->options[$page]['sections'][$section]['fields'][$field]['default'];
		}
		else return null;
	}
}

/**
 * Renders Origin option fields.
 * 
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2012, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Options_Field_Renderer {
	
	static public $fieldDone = array();
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// The Basic Settings types
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public static function text($name, $id, $value, $field){
		?><input type="text" name="<?php print $name ?>" id="<?php print $id ?>" <?php if(!empty($value)) : ?>value="<?php print esc_attr($value) ?>"<?php endif ?> /><?php
	}
	
	public static function textarea($name, $id, $value, $field){
		?><textarea name="<?php print $name ?>" id="<?php print $id ?>" class="widefat" rows="<?php print !empty($field['rows']) ? $field['rows'] : 3 ?>"><?php print esc_textarea($value) ?></textarea><?php
	}

	public static function number($name, $id, $value, $field) {
		self::text($name, $id, $value, $field);
	}
	
	public static function checkbox($name, $id, $value, $field){
		?><input type="checkbox" name="<?php print $name ?>" id="<?php print $id ?>" <?php checked($value) ?> /><?php
		
		if(!empty($field['placeholder'])){
			?> <label for="<?php print $id ?>"><?php print $field['placeholder'] ?></label><?php
		}
	}
	
	public static function select($name, $id, $value, $field){
		$value = (array) $value;
		
		?>
		<select
			<?php if(!empty($field['multiple'])) print 'multiple="true"' ?>
			<?php if(!empty($field['placeholder'])) print 'data-placeholder="' . $field['placeholder'] . '"' ?>
			name="<?php print $name.(!empty($field['multiple']) ? '[]' : '') ?>"
			id="<?php print $id ?>">

			<?php if(empty($field['default'])) : ?><option></option><?php endif ?>
			<?php foreach($field['options'] as $k => $v) : ?>
			<option
				value="<?php print $k ?>" <?php selected(@ in_array($k, $value) || $value == $k); ?>><?php print $v ?></option>
			<?php endforeach; ?>
		</select>
		<?php
	}
	
	public static function media($name, $id, $value, $field){
		if(is_array($value)){
			$value = $value['attachment_id'];
		}
		
		$attachment = get_post($value);
		if(!empty($attachment)){
			$img = wp_get_attachment_image_src($attachment->ID, 'thumbnail');
			?>
			<div class="current">
				<a href="<?php print add_query_arg(array('attachment_id' => $attachment->ID, 'action' => 'edit'), admin_url('media.php')) ?>" target="_blank">
					<img src="<?php print $img[0] ?>" width="<?php print round($img[1]/2) ?>" height="<?php print round($img[2]/2) ?>" />
				</a>
			</div>
			<div class="delete">
				<label><input type="checkbox" name="<?php print $name ?>[delete]"> <?php _e('Delete', 'origin') ?></label>
			</div>
			<?php
		}
		
		if(is_wp_error($value)) $value = null;
		
		?>
		<input type="hidden" class="media-upload-input" name="<?php print $name ?>[attachment_id]" value="<?php print esc_attr($value) ?>" />
		<input type="file" name="<?php print preg_replace('/[\[\]]+/', '_', $name) ?>upload" />
		<?php
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Advanced Field Types
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public static function taxonomy_select($name, $id, $value, $field) {
		$terms = get_terms($field['taxonomy'], array(
			'count' => -1
		));
		
		if(is_array($value) && isset($value['order'])) $value = array_map('trim',explode(',', $value['order']));
		
		?>
		<select
			<?php if(!empty($field['multiple'])) print 'multiple="true"' ?>
			<?php if(!empty($field['placeholder'])) print 'data-placeholder="'.$field['placeholder'].'"' ?>
			<?php if(!empty($field['order'])) print 'data-order="true"' ?>
			name="<?php print $name . (!empty($field['multiple']) ? '[]' : '') ?>"
			id="<?php print $id ?>">

			<?php if(empty($field['default'])) : ?><option></option><?php endif ?>
			<?php foreach($terms as $term) : ?>
				<option value="<?php print $term->term_id ?>" <?php selected(@ in_array($term->term_id, $value) || $term->term_id == $value); ?>><?php print $term->name ?></option>	
			<?php endforeach; ?>
		</select>
		
		<?php if(!empty($field['order'])) : ?>
			<input type="hidden" name="<?php print $name ?>[order]" value="<?php if(!empty($value) && is_array($value)) print implode(',', $value) ?>" />
		<?php endif; ?>
		
		<?php
	}
	
	/**
	 * @static
	 * @param $name
	 * @param $id
	 * @param $value
	 * @param $field
	 */
	public static function post_select($name, $id, $value, $field) {
		
		if(empty($field['query'])){
			$query = array(
				'numberposts' => -1,
			);
		}
		else $query = $field['query'];
		$posts = get_posts($query);

		if(is_array($value) && !empty($value['order'])) {
			$value = array_map('trim', explode(',', $value['order']));
		}
		else $value = (array) $value;
		
		?>
		<select
			<?php if(!empty($field['multiple'])) print 'multiple="true"' ?>
			<?php if(!empty($field['placeholder'])) print 'data-placeholder="' . $field['placeholder'] . '"' ?>
			<?php if(!empty($field['order'])) print 'data-order="true"' ?>
			name="<?php print $name . (!empty($field['multiple']) ? '[]' : '') ?>"
			id="<?php print $id ?>">

			<?php if(empty($field['default'])) : ?><option></option><?php endif ?>
			<?php foreach($posts as $post) : ?>
				<option
					value="<?php print $post->ID ?>" <?php selected(@ in_array($post->ID, $value) || $post->ID == $value); ?>><?php print $post->post_title ?></option>
			<?php endforeach; ?>
		</select>
	
		<?php if(!empty($field['order'])) : ?>
			<input type="hidden" name="<?php print $name ?>[order]"
				   value="<?php if(!empty($value) && is_array($value)) print implode(',', $value) ?>" />
			<?php endif; ?>
	
		<?php
	}

	/**
	 * A field for specifying social profiles
	 * @static
	 * @param $name
	 * @param $id
	 * @param $value
	 * @param $field
	 */
	public static function multi_fields($name, $id, $value, $field) {
		foreach($field['fields'] as $k => $title) :
			?><input type="text" name="<?php print $name.'['. $k .']' ?>" class="field_<?php print $k ?>" value="<?php print esc_attr($value[$k]) ?>" placeholder="<?php print $title ?>" /><?php
		endforeach;
	}
}

/**
 * A class for validating Origin options fields. Uses exceptions.
 * 
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2012, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Options_Field_Validator {
	public static function text($value, $field){
		return $value;
	}

	public static function textarea($value, $field){
		return $value;
	}

	public static function number($value, $field) {
		if(!is_numeric($value)) throw new Exception('This needs to be a number');
		return $value;
	}
	
	public static function checkbox($value, $field) {
		return !empty($value);
	}
	
	public static function select($value, $field){
		if(is_array($value) && !empty($value['order'])) {
			$value = explode(',', $value['order']);
			$value = array_unique($value);
		}
		if(is_array($value) && isset($value['order'])) unset($value['order']);
		
		// TODO check if the value is in the options
		if(!empty($field['options']) && is_array($field['options']) && $value != '') {
			$possible = array_keys($field['options']);
			if(is_array($value)){
				foreach($value as $v){
					if(!in_array($v, $possible)){
						throw new Exception("Invalid Selection [{$v}]");
					}
				}
			}
			else{
				if(!in_array($value, $possible)) {
					throw new Exception("Invalid Selection [{$value}]");
				}
			}
		}
		
		return $value;
	}
	
	public static function taxonomy_select($value, $field){
		// TODO populate the options value in $field
		return self::select($value, $field);
	}

	public static function post_select($value, $field) {
		// TODO populate the options value in $field
		return self::select($value, $field);
	}
	
	public static function multi_fields($value, $field){
		// TODO validate this
		return $value;
	}
}

/**
 * A Origin options field exception. 
 */
class Origin_Options_Field_Exception extends Exception{
	public $section;
	public $field;
	
	function __construct($section, $field, $message){
		parent::__construct($message);
		$this->section = $section;
		$this->field = $field;
		$this->message = $message;
	}
	
	function getSection(){
		return $this->section;
	}
	
	function getField(){
		return $this->field;
	}
}