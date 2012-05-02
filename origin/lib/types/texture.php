<?php

require_once(dirname(__FILE__).'/select.php');

class Origin_Type_Texture extends Origin_Type_Select{
	public $texture_cdn;
	public $texture_path;
	
	static $blends = array(
		'Over',
		'Multiply',
		
		'Screen',
		'Lighten',
		'Darken',
		
		'Plus',
		'Minus',
		
		'Difference',
		'Exclusion',
		
		'Overlay',
		'Hard Light',
		'Soft Light',
		'Linear Dodge',
		'Linear Burn',
		'Color Dodge',
		'Color Burn',
		
		// Custom
		'Saturation',
		'Brightness',
		'Luminosity'
	);
	
	function __construct($section, $name, $settings){
		parent::__construct($section, $name, $settings);
		
		// Load the texture options
		$this->settings['options'] = array();
		
		// TODO check if none is enabled
		$this->settings['options']['::none'] = false;
		
		$texture_info = get_transient('origin_textures');
		if($texture_info === false){
			// Fetch the new textures
			$request = Origin::single()->services->exp_backoff(
				Origin::ENDPOINT . '/imageapi/textures/',
				array('timeout' => 15),
				'get',
				2
			);
			
			$texture_info = json_decode($request['body']);
			set_transient('origin_textures', $texture_info, 86400);
		}
		
		$this->texture_cdn = $texture_info->cdn;
		$this->texture_path = $texture_info->path;
		
		foreach($texture_info->textures as $texture){
			$texture = trim($texture);
			$this->settings['options'][$texture] = array(
				'name' => ucwords(str_replace('_', ' ', $texture)),
				'filename' => $texture.'.png',
			);
		}
		
		asort($this->settings['options']);
	}
	
	/**
	 * Enqueue any JS and CSS that we require
	 */
	static function enqueue(){
		wp_enqueue_script('origin.texture', ORIGIN_BASE_URL.'/js/types/texture.js', array('jquery'));
	}
	
	function render_form($id = null) {
		$value = $this->value;
		
		?>
		<div class="container">
			<div class="current"></div>
		</div>
		<div class="clear"></div>
		
		<select
			name="<?php print esc_attr($this->form_name) ?>[texture]"
			class="current preview-field texture"
			data-name="<?php print esc_attr($this->name) ?>"
			id="<?php print esc_attr($this->form_id) ?>"
			value="<?php print esc_attr($this->value()) ?>"
			style="width:271px">
			
			<?php if($this->settings['none']) : ?>
				<option value="::none" <?php selected($value['texture'], '::none') ?>>None</option>
			<?php endif ?>
			
			<?php foreach($this->settings['options'] as $option_id => $option) : if($option_id != '::none') : ?>
				<option value="<?php print $option_id ?>" data-image="<?php print $this->texture_cdn.'/'. $this->texture_path.$option['filename'] ?>" <?php selected($value['texture'], $option_id) ?> ><?php print $option['name']; ?></option>
			<?php endif; endforeach; ?>
		</select>
		
		<div class="blend-container">
			<select
				placeholder="<?php print esc_attr('Select Blend', 'siteorigin') ?>"
				name="<?php print esc_attr($this->form_name) ?>[blend]"
				class="preview-field blend">
				<optgroup label="<?php print esc_attr('Blend Mode', 'siteorigin') ?>"></optgroup>
				<?php foreach (self::$blends as $blend) : ?>
					<option value="<?php print esc_attr($blend) ?>" <?php selected($value['blend'], $blend) ?>><?php print $blend ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<?php
	}

	/**
	 * @param $input
	 */
	function process_input($input){
		if(!empty($input[$this->form_name])) {
			$ti = $input[$this->form_name];
			
			if(empty($ti['texture']) || !is_array($ti)) $ti['texture'] = $ti;
				
			// TODO process the value so we have everything we need
			if(empty($ti['blend'])) $ti['blend'] = 'Multiply';

			$this->value = $ti;
		}
	}
}