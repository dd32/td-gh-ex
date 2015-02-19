<div class="block ui-tabs-panel deactive" id="option-ui-id-2" >	
	<?php $current_options = wp_parse_args(  get_option( 'appointment_lite_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_2']))
	{	
		if($_POST['webriti_settings_save_2'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  printf (__('Sorry, your nonce did not verify.','appointment'));	exit; }
			else  
			{	
			    
				$current_options['slider_title_one']= sanitize_text_field($_POST['slider_title_one']);
				$current_options['slider_description']= sanitize_text_field($_POST['slider_description']);
				$current_options['slider_btn_text'] = sanitize_text_field($_POST['slider_btn_text']);	
				$current_options['slider_btn_link']=  esc_url_raw($_POST['slider_btn_link']);
				
				if(isset($_POST['slider_btn_link_target']))
				{ echo $current_options['slider_btn_link_target']="on"; } 
				else
				{ echo $current_options['slider_btn_link_target']="off"; } 
				$current_options['slider_image']= esc_url($_POST['slider_image']);
				// slider section enabled yes ya on
				if(isset($_POST['home_banner_enabled']))
				{ echo $current_options['home_banner_enabled']= sanitize_text_field($_POST['home_banner_enabled']); } 
				else { echo $current_options['home_banner_enabled']="off"; } 
				
				update_option('appointment_lite_options', $current_options);
			}
		}	
		 if($_POST['webriti_settings_save_2'] == 2) 
		{
			$slider_image = WEBRITI_TEMPLATE_DIR_URI . "/images/slider.jpg";
			$current_options['home_banner_enabled']="on";
			$current_options['slider_title_one']= __('appointment BY WEBRITI THEMES','appointment');
			$current_options['slider_description']=  __('Create Fresh Website fast with us!','appointment');
			$current_options['slider_btn_text']= __('Purchase Now!','appointment');
			$current_options['slider_btn_link']="";	
			$current_options['slider_btn_link_target']= 'on';
			$current_options['slider_image']= $slider_image;
			update_option('appointment_lite_options',$current_options);
		} 
	}  ?>
	<form method="post" id="webriti_theme_options_2">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Home Feature Image Setting','appointment');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_2_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_2_success" ><?php _e('Options data successfully Saved','appointment');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_2_reset" ><?php _e('Options data successfully reset','appointment');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('2');">
					<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('2')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Home Banner','appointment'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['home_banner_enabled']=='on') echo "checked='checked'"; ?> id="home_banner_enabled" name="home_banner_enabled" >
			<span class="explain"><?php _e('Enable Home Banner on front page.','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Slider Title One','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="slider_title_one" id="slider_title_one" value="<?php if($current_options['slider_title_one']!='') { echo esc_attr( $current_options['slider_title_one'] ); } ?>" >
			<span class="explain"><?php _e('Enter the slider title one.','appointment'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Slider Description','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="slider_description" id="slider_description" value="<?php if($current_options['slider_description']!='') { echo esc_attr( $current_options['slider_description'] ); } ?>" >
			<span class="explain"><?php _e('Enter the slider description.','appointment'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Button Text','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="slider_btn_text" id="slider_btn_text" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['slider_btn_text'])) { echo $current_options['slider_btn_text']; } ?>">
			<span class="explain"><?php _e('Enter the Slider button text.','appointment'); ?></span>
		</div>
		
		<div class="section">	
		<h3><?php _e('Slider Button Link','appointment'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="slider_btn_link" id="slider_btn_link" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['slider_btn_link'])) { echo $current_options['slider_btn_link']; } ?>" >
			<span class="explain"><?php _e('Enter the slider button link.','appointment'); ?></span>
			<p><input type="checkbox" id="slider_btn_link_target" name="slider_btn_link_target" <?php if($current_options['slider_btn_link_target']=='on') echo "checked='checked'"; ?> > <?php _e('Open link in a new window/tab','appointment'); ?></p>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image','appointment'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 1600 X 750 px. ','appointment');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['slider_image']!='') { echo esc_attr($current_options['slider_image']); } ?>" id="slider_image" name="slider_image" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Slider Image" class="upload_image_button" />
		</div>

		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_2" name="webriti_settings_save_2" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('2');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('2')" >
		</div>
	</form>
</div>
