<?php

require_once(dirname(__FILE__) . '/type.php');

class Origin_Type_Font extends Origin_Type{
	
	static $_defaults = array(
		'Helvetica Neue',
		'Lucida Grande',
	);

	function __construct($section, $name, $settings) {
		parent::__construct($section, $name, $settings);
		
		$origin = Origin::single();
		
		$fonts = get_transient('origin_webfonts');
		if($fonts === false){
			$request = Origin::single()->services->exp_backoff(
				Origin::ENDPOINT . '/webfonts/',
				array('timeout' => 15),
				'get',
				2
			);
			$fonts = json_decode($request['body'], true);
			set_transient('origin_webfonts', $fonts, 86400);
		}
		
		$this->fonts = $fonts;
	}
	
	static function enqueue(){
		wp_enqueue_script('origin.font', ORIGIN_BASE_URL . '/js/types/font.js', array('jquery'));
	}
	
	/**
	 * @param string $part
	 * @return mixed
	 */
	function value($part = null) {
		if($part == null) return isset($this->value) ? $this->value : @$this->settings['default'];
		else return isset($this->value[$part]) ? $this->value[$part] : @$this->settings['default'][$part];
	}

	/**
	 * @param null $id
	 */
	function render_form($id = null) {
		$value = $this->value();
		$fonts = $this->fonts;
		
		$current_variants = null;
		foreach($fonts['items'] as $i => $v){
			if($v['family'] == $value['family']){
				$current_variants = $v['variants'];
			}
		}
		if(in_array($value['family'], self::$_defaults)) $current_variants = array(100, 200, 300, 400, 500, 600, 700, 800, 900);
		
		?>
			<select
				name="<?php print esc_attr($this->form_name) ?>[family]"
				class="family current preview-field"
				data-name="<?php print esc_attr($this->name) ?>"
				id="<?php print esc_attr($this->form_id) ?>-name"
				value="<?php print esc_attr($this->value('family')) ?>"
				style="width:270px">
				
				<?php foreach(self::$_defaults as $family) : ?>
					<option
						value="<?php print esc_attr($family) ?>"
						data-variants="100,200,300,400,500,600,700,800,900"
						<?php selected($value['family'], $family) ?>>
						<?php print esc_attr($family) ?>
					</option>
				<?php endforeach; ?>
				
				<?php foreach($fonts['items'] as $k => $v) : ?>
					<option
						value="<?php print esc_attr($v['family']) ?>"
						data-variants="<?php print esc_attr(implode(',', $v['variants'])) ?>"
						<?php selected($value['family'], $v['family']) ?>>
							<?php print esc_attr($v['family']) ?>
					</option>
				<?php endforeach; ?>
			</select>
			
			<input type="hidden" name="<?php print esc_attr($this->form_name) ?>[variant]" value="<?php print @ $value['variant'] ?>" class="variant preview-field">
			<div class="variants" data-name="" data-current="<?php print esc_attr( empty($value['variant']) ? 'regular' : $value['variant']) ?>">
				<?php foreach((array) $current_variants as $i => $v) : ?>
					<label for="<?php print $id . '_variant_' . $i ?>">
						<input type="radio" value="<?php print $v ?>" id="<?php print $id.'_variant_'.$i ?>" name="<?php print $id ?>_variant_radio" <?php checked(@ $value['variant'], $v) ?> />
						<?php print $v ?>
					</label>
				<?php endforeach ?>
			</div>
		<?php
	}
	
	/**
	 * @param $input
	 */
	function process_input($input){
		if(!empty($input[$this->form_name])) {
			$ti = $input[$this->form_name];
			
			// TODO process the value so we have everything we need
			if(empty($ti['variant'])) $ti['variant'] = 'regular';
			
			$this->value = $ti; 
		}
	}
	
	/**
	 * @return bool
	 */
	function validate_settings(){
		return true;
	}
}