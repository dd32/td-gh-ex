<?php

require_once(dirname(__FILE__).'/select.php');

/**
 * A select object that uses images
 */
class Origin_Type_Imageselect extends Origin_Type_Select{
	
	function __construct($section, $name, $settings){
		parent::__construct($section, $name, $settings);
	}
	
	/**
	 * Enqueue any JS and CSS that we require
	 */
	static function enqueue(){
		wp_enqueue_script('origin.imageselect.color', ORIGIN_BASE_URL.'/js/types/imageselect.js', array('jquery'));
	}

	function render_form($id = null) {
		?>
			<div class="image_select">
				<select class="current preview-field" data-name="<?php print esc_attr($this->name) ?>" name="<?php print esc_attr($this->form_name) ?>" id="<?php print esc_attr($this->form_id) ?>">
					<?php foreach($this->settings['options'] as $option_id => $option) : ?>
						<option <?php selected($option_id, $this->value()) ?>><?php print $option_id ?></option>
					<?php endforeach ?>
				</select>
				
				<?php foreach($this->settings['options'] as $option_id => $option) : ?>
  					<div class="option" value="<?php print $option_id ?>">
						<?php if(isset($option['label'])) : ?><label><?php print $option['label'] ?></label><?php endif ?>
						<img src="<?php print get_template_directory_uri().$option['image'] ?>" />
					</div>
				<?php endforeach ?>
			</div>
			<div class="clear"></div>
		<?php
	}
}