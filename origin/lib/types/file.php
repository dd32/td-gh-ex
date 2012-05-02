<?php

require_once(dirname(__FILE__).'/type.php');

class Origin_Type_File extends Origin_Type {
	function render_form($id = null){
		?>
		<a href="#" class="od-side-button upload"><i></i><?php _e('Upload', 'origin') ?></a>
		<input
			type="hidden"
			class="target-name"
			name="<?php print esc_attr($this->form_name) ?>[target]"
			id="<?php print esc_attr($this->form_id) ?>"
			<?php if(!empty($this->settings['image_id'])) : ?>data-image-id="<?php print $this->settings['image_id'] ?>"<?php endif ?>
			/>
		<input type="hidden" class="filename" name="<?php print esc_attr($this->form_name) ?>[filename]" />
		<?php
	}
	
	function process_input($input){
		// Check if there's a file to upload
		if(empty($input[$this->form_name]['target'])) return;
		
		$upload_folder = Origin::single()->get_storage_folder('uploads');
		if(!file_exists($upload_folder.'/'.$input[$this->form_name]['target'])){
			$this->error = __('Target file not found', 'origin');
		}
		else{
			// Check that the filename is unique
			$current_filename = @$this->value['filename'];
			$new_filename = pathinfo($input[$this->form_name]['filename']);
			$i = 2;
			while(file_exists($upload_folder.'/'.$input[$this->form_name]['filename']) && $input[$this->form_name]['filename'] != $current_filename){
				// Create a unique filename
				$input[$this->form_name]['filename'] = $new_filename['filename'].'_'.$i.'.'.$new_filename['extension'];
				$i++;
			}
			
			// Delete the old file
			if(!empty($current_filename) && file_exists($upload_folder.'/'.$current_filename))
				unlink($upload_folder.'/'.$current_filename);
			
			rename(
				$upload_folder.'/'.$input[$this->form_name]['target'],
				$upload_folder.'/'.$input[$this->form_name]['filename']
			);
			
			$this->value = array(
				'filename' => $input[$this->form_name]['filename']
			);
		}
	}
	
	/**
	 * Enqueue any JS and CSS that we require
	 */
	static function enqueue(){
		wp_enqueue_script('origin.file', ORIGIN_BASE_URL.'/js/types/file.js', array('jquery'));
	}
	
	function validate_settings(){
		return true;
	}
}