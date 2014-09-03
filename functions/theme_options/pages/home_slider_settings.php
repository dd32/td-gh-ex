<div class="block ui-tabs-panel deactive" id="option-ui-id-2" >	
	<?php $current_options = get_option('corpbiz_options');
	if(isset($_POST['webriti_settings_save_2']))
	{	
		if($_POST['webriti_settings_save_2'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{	$current_options['slider_image']=sanitize_text_field($_POST['slider_image']);
				$current_options['slider_title']=sanitize_text_field($_POST['slider_title']);
				$current_options['slider_description'] =sanitize_text_field($_POST['slider_description']);
				
				update_option('corpbiz_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_2'] == 2) 
		{	
			$imag_url= WEBRITI_TEMPLATE_DIR_URI . "/images/1140x420.png";
			$current_options['slider_title'] = 'Clean Elegant';					
			$current_options['slider_description']='Multi-Purpose Theme';
			$current_options['slider_image']= $imag_url;	
			update_option('corpbiz_options',$current_options);
		}
	} 

	?>
	<form method="post" id="webriti_theme_options_2">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Slider Settings','corpbiz');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_2_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_2_success" ><?php _e('Options data successfully Saved','corpbiz');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_2_reset" ><?php _e('Options data successfully reset','corpbiz');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('2');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('2')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Home Feature Image Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="slider_title" id="slider_title" value="<?php echo $current_options['slider_title']; ?>" >
			<span class="explain"><?php _e('Enter the Home Feature Image title.','corpbiz'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Home Feature Image Description','corpbiz'); ?></h3>
			<input  class="webriti_inpute" type="text" name="slider_description" id="slider_description"  value="<?php echo $current_options['slider_description']; ?>" >
			<span class="explain"><?php _e('Enter the Home Feature Image Description.','corpbiz'); ?></span>
		</div>		
		<div class="section">
			<h3><?php _e('Home Feature Image Image','corpbiz'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 1020 X 450 px. ','corpbiz');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['slider_image']!='') { echo esc_attr($current_options['slider_image']); } ?>" id="slider_image" name="slider_image" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Slider Image" class="upload_image_button" />
		</div>				
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_2" name="webriti_settings_save_2" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('2');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('2')" >
		</div>
	</form>
</div>